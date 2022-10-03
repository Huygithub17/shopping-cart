<div class="cart" data-url="{{route('deleteCart')}}">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table update_cart_url" data-url="{{route('updateCart')}}">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product Images</th>
                        <th scope="col">Product Names</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Sub Total</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    @php
                        $total = 0;
                    @endphp
                    <?php if (!empty($carts)) { ?>
                    <tbody>
                    @foreach($carts  as $id => $cart)
                        @php
                            $total += $cart['price'] * $cart['quantity'];
                        @endphp
                        <tr>
                            <th scope="row">{{$id}}</th>
                            <td>
                                <img
                                    style="width: 200px; height: 200px; object-fit: contain;"
                                    src="{{$cart['feature_image_path']}}" alt="">
                            </td>
                            <td>{{$cart['name']}}</td>
                            <td>{{number_format($cart['price'])}} VNĐ</td>
                            <td>
                                <input type="number" value="{{$cart['quantity']}}" min="1" class="quantity">
                            </td>
                            <td>{{number_format($cart['price'] * $cart['quantity'])}} VNĐ</td>
                            <td>
                                <a data-id="{{$id}}" class="btn btn-primary card_update">Update</a>
                                <a data-id="{{$id}}" class="btn btn-danger card_delete">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <?php } else { ?>
                        <tbody>

                        </tbody>
                    <?php } ?>

                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <h2> Total: {{number_format($total)}} VNĐ</h2>
            </div>
            <div class="col-md-6">
                <a data-url="{{route('deleteAllCart')}}" class="btn btn-danger delete_all_cart float-right">Clear All
                    Cart</a>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-12">
                <a class="btn btn-info" href="{{route('shopping')}}">Continue Shopping</a>
            </div>
        </div>

    </div>
</div>
