<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();
        return view('products.index', compact('products'));
    }

    public function addToCart($id)
    {
        $product = Product::find($id);
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $cart[$id]['quantity'] + 1;
        } else {
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'feature_image_path' => $product->feature_image_path
            ];
        }
        session()->put('cart', $cart);

        $products = Product::latest()->get();
        $productView = view('products.index', compact('products'))->render();
        return response()->json(['product_view'=>$productView, 'code'=>200], 200);
    }

    public function showCart()
    {
        $carts = session()->get('cart');
        return view('products.showCart', compact('carts'));
    }

    public function updateCart(Request $request)
    {
        if($request->id && $request->quantity){
            $carts = session()->get('cart');
            $carts[$request->id]['quantity'] = $request->quantity;

            session()->put('cart', $carts);
            $carts = session()->get('cart');

            $cartComponent = view('products/components/cart_component', compact('carts'))->render();
            return response()->json(['cart_component'=>$cartComponent, 'code'=>200], 200);
        }
    }

    public function deleteCart(Request $request)
    {
        if($request->id){
            $carts = session()->get('cart');
            unset($carts[$request->id]);

            session()->put('cart', $carts);
            $carts = session()->get('cart');

            $cartComponent = view('products/components/cart_component', compact('carts'))->render();
            return response()->json(['cart_component'=>$cartComponent, 'code'=>200], 200);
        }
    }
    //Clear All Cart
    public function deleteAllCart()
    {
        session()->flush();
        $cartComponent = view('products/components/cart_component')->render();
        return response()->json(['cart_component'=>$cartComponent, 'code'=>200], 200);

    }
    //Check out Form:
    public function checkOutForm()
    {
        $carts = session()->get('cart');
        return view('products.checkOut', compact('carts'));
    }

    //Check out:
    //Todo:: take: customer_id, note, carts(session)
    public function checkOut(Request $request)
    {
        $carts = session()->get('cart');
        $cus_id = 1;
        $status = 0;
        DB::beginTransaction();
        try {
            if($order = Order::create([
                'customer_id' => $cus_id,
                'order_note'=>$request->note,
                'status'=>$status
            ])){
                $order_id = $order->id;
                foreach ($carts as $product_id => $cart){
                    $quantity = $cart['quantity'];
                    $price= $cart['price'];
                    OrderDetail::create([
                        'order_id' => $order_id,
                        'product_id'=> $product_id,
                        'price'=>$price,
                        'quantity'=>$quantity
                    ]);
                }
            }
            DB::commit();
            session()->flush();
            var_dump("Order successfully");

        }catch (\Exception $exception){
            DB::rollback();
            var_dump("Order error");
        }
    }
}
