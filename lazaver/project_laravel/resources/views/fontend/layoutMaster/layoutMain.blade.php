<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','MẬT PET FAMILY')</title>
    @yield('css')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link href="{{url('public/backend')}}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="{{url('public/backend')}}/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<body class="preloading">
    <!-- <div class="load">
        <img src="{{url('public/backend/img')}}/loading-cute.gif" alt="">
    </div> -->
    <div class="containerr">
        <header>
            <div class="logoxx">
                <a href="http://localhost/JSBASIC/Ass/fontEnd/trangchu.html"><img src="{{url('public/backend/img')}}/logo.png" alt=""></a>

            </div>
            <div style=" position: absolute;
 top: 20px;
 right: 400px;">
                <div class="menuAndCart">
                    <nav class="menu">
                        <ul class="">
                            <li><a href="{{route('trangchu')}}">TRANG CHỦ</a></li>
                            <li><a href="{{route('trangchu.sanpham')}}">THÚ CƯNG</a></li>
                            <li><a href="{{route('trangchu.tintuc')}}">TIN TỨC</a></li>
                            <li><a href="{{route('trangchu.lienhe')}}">LIÊN HỆ</a></li>
                            <li><a href=""></a></li>

                        </ul>
                    </nav>
                    <?php

                    use App\Models\Bill;

                    $user = session('user') ? session('user') : [];
                //   echo '<pre/>';
                //     var_dump($user[0])
                //     ;die();
                    if (session('user')) {
                        $countBill = Bill::groupBy('id_user')
                            ->selectRaw('sum(tong_tien) as tong_tien, sum(so_luong) as so_luong')->where('id_user', '=', $user[0]->id)
                            ->get();
                    }
                    ?>
                    <div class="cart">

                        @if( $user == [])
                        <div class="logo_cart">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <div style="transform: translateY(13px);">
                            Sản phẩm <br>
                            <span style="padding-right: 5px;">0 sản phẩm - 0 đ</span>
                        </div>
                        @else
                        @if(!isset($countBill[0]))
                        <div class="logo_cart">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <div style="transform: translateY(13px);">
                            Sản phẩm <br>
                            <span style="padding-right: 5px;">0 sản phẩm - 0 đ</span>
                        </div>
                        @else
                        <div class="logo_cart">
                            <a href="{{route('cart.mycart')}}"> <i class="fas fa-shopping-cart"></i></a>
                        </div>
                        <div style="transform: translateY(13px);">
                            Sản phẩm <br>

                            <span style="padding-right: 5px;">{{$countBill[0]->so_luong}} sản phẩm - {{number_format($countBill[0]->tong_tien)}} đ</span>
                        </div>
                        @endif

                        @endif
                    </div>
                    <div>
                        <ul>
                            <li style="width:80px;list-style:none" class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    @if(session()->has('user'))

                                    <img style="width:50px;height: 50px;" class="img-profile rounded-circle" src="{{url('public/backend')}}/img/{{session()->get('user')[0]->img}}">
                                    @else
                                    <img class="img-profile rounded-circle" src="{{url('public/backend')}}/img/undraw_profile.svg">
                                    @endif


                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Thông Tin
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Chỉnh Sửa
                                    </a>
                                    @if(session()->has('user'))
                                    @if(session('user')[0]->id_role==2)
                                    <a class="dropdown-item" href="{{route('admin.Main')}}">
                                        <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Trang Admin
                                    </a>
                                    @endif
                                    @endif
                                    <div class="dropdown-divider"></div>
                                    @if(session()->has('user'))
                                    <a class="dropdown-item" href="{{route('login.index')}}" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Đăng Xuất
                                    </a>
                                    @else
                                    <a class="dropdown-item" href="{{route('login.index')}}" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Đăng Nhập
                                    </a>
                                    @endif
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                @if( isset($countBill) && !empty($countBill[0]))
                <div style="transform: translateX(50px);" class="banner">
                    <a href=""><img src="{{url('public/backend/img')}}/banenr.png" alt=""></a>
                </div>
                @elseif(empty($countBill[0]))
                <div style="transform: translateX(10px);" class="banner">
                    <a href=""><img src="{{url('public/backend/img')}}/banenr.png" alt=""></a>
                </div>
                @else
                <div class="banner">
                    <a href=""><img src="{{url('public/backend/img')}}/banenr.png" alt=""></a>
                </div>
                @endif
                <div class="fromSreach">
                    <form action="{{route('trangchu.sanpham')}}" method="GET">

                        <input name="search" type="text" size="30" class="search" placeholder="Tìm Kiếm...">
                        <button style="background: black;border: none; padding: 3px;" type="submit"><i style="color: #ffff;" class="fas fa-search"></i></button>
                    </form>

                </div>
            </div>
        </header>
        <div style="border-bottom: 2px solid #de8ebe;  padding-bottom: 30px;">

        </div>
        @yield('layoutMain')

        <footer>
            <div style="border-top:3px solid #de8ebe;margin-bottom: 150px;   position: relative;
            ">

            </div>
            <div class="footer1">

                <div class="intro-item">
                    <div class="titlt-item">
                        <h3>Bull Pháp</h3>
                    </div>
                    <div><img class="img-item" src="{{url('public/backend/img')}}/dog1.png" alt=""></div>
                </div>
                <div class="intro-item">
                    <div class="titlt-item">
                        <h3>Bull Pháp</h3>
                    </div>
                    <div><img class="img-item" src="{{url('public/backend/img')}}/dog2.png" alt=""></div>
                </div>
                <div class="intro-item">
                    <div class="titlt-item">
                        <h3>Bull Pháp</h3>
                    </div>
                    <div><img class="img-item" src="{{url('public/backend/img')}}/dog3.png" alt=""></div>
                </div>
                <div class="intro-item">
                    <div class="titlt-item">
                        <h3>Bull Pháp</h3>
                    </div>
                    <div><img class="img-item" src="{{url('public/backend/img')}}/dog4.png" alt=""></div>
                </div>
                <div class="intro-item">
                    <div class="titlt-item">
                        <h3>Bull Pháp</h3>
                    </div>
                    <div><img class="img-item" src="{{url('public/backend/img')}}/dog5.png" alt=""></div>
                </div>
                <div class="intro-item">
                    <div class="titlt-item">
                        <h3>Bull Pháp</h3>
                    </div>
                    <div><img class="img-item" src="{{url('public/backend/img')}}/dog6.png" alt=""></div>
                </div>
                <div class="intro-item">
                    <div class="titlt-item">
                        <h3>Bull Pháp</h3>
                    </div>
                    <div><img class="img-item" src="{{url('public/backend/img')}}/dog7.png" alt=""></div>
                </div>
            </div>
            <div style="border-top:3px solid #de8ebe;  transform: translateY(-38px);   position: relative;
            z-index: -1; ">

            </div>
            <div class="footer2">
                <div class="contact">
                    <h3>LIÊN LẠC</h3>
                    <ul>
                        <li><i class="fas fa-home"></i> &nbsp <span>Địa chỉ: Số 168 Thượng Đình - Thanh Xuân - Hà
                                Nội</span></li>
                        <li><i class="far fa-map"></i>&nbsp <span>Địa chỉ: 294 -296 Đồng Đen - Quận Tân Bình - Hồ Chí
                                Minh</span> </li>
                        <li><i class="fas fa-phone"></i> &nbsp <span> Điện thoại: 0939.86.36.96</span></li>
                        <li><i class="far fa-envelope"></i> &nbsp <span>binhndph15107@fpt.edu.vb</span></li>
                    </ul>
                </div>
                <div class="lienket">
                    <h3>LIÊN KẾT</h3>
                    <ul>
                        <li>QUY ĐỊNH ĐỔI & TRẢ HÀNG</li>
                        <li>CÁCH MUA HÀNG VÀ GIÁ SHIP </li>

                        <li>THẺ THÀNH VIÊN SKINNY SHOP</li>
                    </ul>
                </div>
                <div class="timeout">
                    <h3>Mở của</h3>
                    <p>THỨ 2 - THỨ 7</p>
                    <p> Sáng 10:00 - Chiều 5:00</p>
                    <img src="{{url('public/backend/img')}}/clock.png" alt="">
                </div>

            </div>
        </footer>
    </div>
    @if(session('user'))
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">Bạn có muốn đăng xuất không?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{route('login.index')}}">Logout</a>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">Đăng Nhập ngay bây giờ?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{route('login.index')}}">Logout</a>
                </div>
            </div>
        </div>
    </div>
    @endif
    <!-- JavaScript Bundle with Popper -->
  

    <script src="{{url('public/backend')}}/vendor/jquery/jquery.min.js"></script>
    <script src="{{url('public/backend')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
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