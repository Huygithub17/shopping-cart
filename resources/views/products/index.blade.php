<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <title>Trang chủ</title>
</head>
<body>
<div class="products">
    <div class="container">
        <div class="row mt-4 mb-4">
            <div class="col-md-12">
                <a href="{{route('showCart')}}" class="btn btn-primary">Show Cart To Check Out</a>
                <span>( {{ (session()->get('cart')) ? count(session()->get('cart')) : "0" }} )</span>
            </div>
        </div>
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-3 mt-4">
                    <div class="card" style="width: 18rem;">
                        <img src="{{$product->feature_image_path}}"
                             class="card-img-top" alt="{{$product->feature_image_name}}">
                        <div class="card-body">
                            <h5 class="name">{{$product->name}}</h5>
                            <p class="content">{{$product->content}}</p>
                            <p class="price">{{number_format($product->price)}} VNĐ</p>
                            <a href=""
                               data-url ="{{route('addToCart', ['id'=> $product->id])}}"
                               class="btn btn-primary add_to_cart_action">
                                Add to cart
                            </a>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" ></script>

<script type="text/javascript">
    function addAction() {
        // event.preventDefault();
        let urlCart = $(this).data('url');
        $.ajax({
            type: 'GET',
            url: urlCart,
            dataType: 'json',
            success: function (data){
                if(data.code === 200){
                    // must be like this code: if it can display the alert.
                    $().html(data.product_view);
                    alert('Thêm sản phẩm thành công.');
                }
            },
            error: function () {

            }
        })
    }
    $(function (){
        $(document).on('click', '.add_to_cart_action', addAction);
    });
</script>

</html>
