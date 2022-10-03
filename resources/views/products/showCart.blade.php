<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <title>Show Cart</title>
</head>
<body>
<div class="cart_wrapper">
    @include('products.components.cart_component')
</div>
<div class="row mt-3">
    <div class="col-md-12 text-center">
        <a class="btn btn-info" href="{{route('checkOutForm')}}">Check out</a>
    </div>
</div>

</body>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" ></script>

<script type="text/javascript">
    // Update Action
    function updateAction(event) {
        event.preventDefault();
        let urlUpdateCart = $('.update_cart_url').data('url');
        let id = $(this).data('id');
        let quantity = $(this).parents('tr').find('input.quantity').val();

        //alert(quantity);

        $.ajax({
            type: 'GET',
            url: urlUpdateCart,
            data: {id: id, quantity: quantity },
            success: function (data){
                if(data.code === 200){
                    $('.cart_wrapper').html(data.cart_component);
                    alert('Update the product successfully !')
                }
            },
            error: function () {

            }
        })
    }
    // Delete Action:
    function deleteAction(event) {
        event.preventDefault();
        let urlDeleteCart = $('.cart').data('url');
        let id = $(this).data('id');
        $.ajax({
            type: 'GET',
            url: urlDeleteCart,
            data: {id: id},
            success: function (data){
                if(data.code === 200){
                    $('.cart_wrapper').html(data.cart_component);
                    alert('Delete the product successfully !')
                }
            },
            error: function () {

            }
        })
    }
    // Clear All Card Action
    function deleteAllCartAction(event) {
        event.preventDefault();
        let urlDeleteAllCart = $(this).data('url');
        $.ajax({
            type: 'GET',
            url: urlDeleteAllCart,
            success: function (data){
                if(data.code === 200){
                    $('.cart_wrapper').html(data.cart_component);
                    alert('Clear all cart the product successfully !')
                }
            },
            error: function () {

            }
        })
    }

    $(function (){
        $(document).on('click', '.card_update', updateAction);
        $(document).on('click', '.card_delete', deleteAction);
        $(document).on('click', '.delete_all_cart', deleteAllCartAction);
    });
</script>
</html>
