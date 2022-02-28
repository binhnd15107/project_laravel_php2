<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title','SB Admin 2 -Login')</title>

    <!-- Custom fonts for this template-->
    <link href="{{url('public/backend')}}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{url('public/backend')}}/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body style="background-color: palevioletred;">

    @yield('layoutMain')


    <!-- Bootstrap core JavaScript-->
    <script src="{{url('public/backend')}}/vendor/jquery/jquery.min.js"></script>
    <script src="{{url('public/backend')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{url('public/backend')}}/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{url('public/backend')}}/js/sb-admin-2.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
   
    <script>
        $(function() {
            <?php if (session()->has('error')) { ?>


                Swal.fire({

                    icon: 'warning',
                    title: "{{session()->pull('error')}}",
                    showConfirmButton: false,
                    timer: 1500

                });

            <?php

            } elseif (session()->has('success')) { ?>
                setTimeout(function() {
                    location.reload();
                }, 1300)
                Swal.fire({

                    icon: 'success',
                    title: "{{session()->pull('success')}}",
                    showConfirmButton: false,
                    timer: 1500

                });


            <?php

            }
            ?>
        });
    </script>
    @yield('js')
</body>

</html>