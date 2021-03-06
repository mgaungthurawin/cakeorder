<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="images/icons/favicon.png"/>
    <link rel="stylesheet" type="text/css" href="{{url('frontend/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('frontend/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('frontend/fonts/themify/themify-icons.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('frontend/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('frontend/fonts/elegant-font/html-css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('frontend/vendor/animate/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('frontend/vendor/css-hamburgers/hamburgers.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('frontend/vendor/animsition/css/animsition.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('frontend/vendor/select2/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('frontend/vendor/daterangepicker/daterangepicker.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('frontend/vendor/slick/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('frontend/vendor/lightbox2/css/lightbox.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('frontend/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('frontend/css/main.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
    <style type="text/css">
        .main_menu > li > a {
            color: #000000;
        }
    </style>
    @yield('css')
</head>
<body class="animsition">

    @yield('content')

    <script type="text/javascript" src="{{url('frontend/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
    <script type="text/javascript" src="{{url('frontend/vendor/animsition/js/animsition.min.js')}}"></script>
    <script type="text/javascript" src="{{url('frontend/vendor/bootstrap/js/popper.js')}}"></script>
    <script type="text/javascript" src="{{url('frontend/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{url('frontend/vendor/select2/select2.min.js')}}"></script>
    <script type="text/javascript">
        $(".selection-1").select2({
            minimumResultsForSearch: 20,
            dropdownParent: $('#dropDownSelect1')
        });
    </script>
    <script type="text/javascript" src="{{url('frontend/vendor/slick/slick.min.js')}}"></script>
    <script type="text/javascript" src="{{url('frontend/js/slick-custom.js')}}"></script>
    <script type="text/javascript" src="{{url('frontend/vendor/countdowntime/countdowntime.js')}}"></script>
    <script type="text/javascript" src="{{url('frontend/vendor/lightbox2/js/lightbox.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript">
        // $('.block2-btn-addcart').each(function(){
        //     var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
        //     $(this).on('click', function(){
        //         alert('here');
        //         swal(nameProduct, "is added to cart !", "success");
        //     });
        // });

        // $('.block2-btn-addwishlist').each(function(){
        //     var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
        //     $(this).on('click', function(){
        //         swal(nameProduct, "is added to wishlist !", "success");
        //     });
        // });
    </script>

    <script src="{{url('frontend/js/main.js')}}"></script>
    <script type="text/javascript">
        $(document).on('click', '#order', function () {
            window.location.href = '{{ url("/order") }}';
        });

        $(document).on('click', '#addtocart', function () {
            var qty = 1;
            var product_id = $('#spanproduct').text();
            var name = $('#title').val();
            var price = $('#price').val();
            var data = {'_token': $('meta[name=csrf-token]').attr('content'), product_id : product_id}
            $.post('/cart', data, function (result) {
                if (result.status) {
                    swal({
                        title: "Success!",
                        text: result.message,
                        icon: "success",
                    });
                    location.reload();
                } else {
                    swal({
                        title: "Error!",
                        text: result.message,
                        icon: "error",
                    });
                    window.location.href = "{{ url('/') }}";
                }
            })
        })

        $(document).on('click', '#removecart', function () {
            var rowId = $(this).closest('td').find('#rowid').text();
            var product_id = $(this).closest('td').find('#product_id').text();
            var data = {'_token': $('meta[name=csrf-token]').attr('content'), product_id : product_id, rowId: rowId}
            $.post('/removecart', data, function (result) {
                if (result.status) {
                   swal({
                       title: "Success!",
                       text: result.message,
                       icon: "success",
                    });
                   window.location.href = "{{ url('/cart') }}"; 
                }
            })
        })

        // $('#order_address').focusout(function () {
        //     var price = $('#hiddenprice').val();
        //     if ($(this).val() == '') {
        //         $('#order_address').focus();
        //     }
        //     $.get('/getdelivery/' + $(this).val(), function (data) {

        //         var actualprice = parseInt(price) + parseInt(data) + " Ks";
        //         $('#delivery').html(actualprice);
        //     });
        // })

        $(document).on('change', '#location', function () {

            var price = $('#hiddenprice').val();
            var url=$('#url').attr('data-url');
             var qty = $('#quantity').val();
            $.get('/getdelivery/' + $(this).val(), function (data) {
                var totaldelivery = parseInt(data) ;

                var actualprice = parseInt(price) * qty + totaldelivery + " Ks";
                $('#delivery').html(actualprice);
            });
        });

        $(document).on('change', '#cartlocation', function () {
            var url=$('#url').attr('data-url');
            $.get( url + '/' + $(this).val(), function (data) {
                $('#delivery').html(data);
            });
        })

        $(document).on('change', '#product_id', function () {
            var product_id = $(this).val();
            document.getElementById('spanproduct').innerHTML = product_id;
            $.get('/getprice/'+ product_id, function (data) {
                $('#cake_price').html(data.price + " Ks")
                $('#cake_weigh').html('Weigh - ' + data.weigh)
            })
        });

        $('#delivery_date').datetimepicker({
            format: 'YYYY-MM-DD'
        });

        // $(document).on('submit', '#order-form', function (e) {
        //     e.preventDefault();
        //     swal({
        //       title: "Are you sure?",
        //       text: "You want to order!",
        //       icon: "warning",
        //       buttons: true,
        //       dangerMode: true,
        //     })
        //     .then((willDelete) => {
        //       if (willDelete) {
        //         swal("Poof! Your imaginary file has been deleted!", {
        //           icon: "success",
        //         });
        //       } else {
        //         swal("Your imaginary file is safe!");
        //       }
        //     });
        // })

    </script>
    @include('sweet::alert')
</body>
</html>









