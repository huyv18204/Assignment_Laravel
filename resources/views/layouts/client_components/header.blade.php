<header>
    <!-- Header Start -->
    <div class="header-area">
        <div class="main-header ">
            <div class="header-top black-bg d-none d-sm-block">
                <div class="container">
                    <div class="col-xl-12">
                        <div class="row d-flex justify-content-between align-items-center">
                            <div class="header-info-left">
                                <ul>
                                    <li class="title"><span class="flaticon-energy"></span> BẦU CỬ TỔNG THỐNG MỸ 2024
                                    </li>
                                    <li>Hà Nội: {{now()}}</li>
                                </ul>
                            </div>
                            <div class="header-info-right">
                                <div class="">

                                    @if(\Illuminate\Support\Facades\Auth::user())
                                        <ul class="header-date">
                                            <li>{{\Illuminate\Support\Facades\Auth::user()->name}}
                                            </li>
                                            <li style="margin-left: 30px">
                                                    <a href="{{route("logout")}}">Đăng xuất</a>
                                            </li>

                                        </ul>
                                    @else
                                        <ul class="header-date">
                                            <li><a href="#" type="button" data-bs-toggle="modal"
                                                   data-bs-target="#registerModal">Đăng Ký</a></li>
                                            <li style="margin-left: 20px"><a href="#" type="button"
                                                                             data-bs-toggle="modal"
                                                                             data-bs-target="#loginModal">Đăng Nhập</a>
                                            </li>

                                        </ul>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-mid gray-bg">
                <div class="container">
                    <div class="row d-flex align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-3 col-lg-3 col-md-3 d-none d-md-block">
                            <div class="logo">
                                <a href="index.html"><img src={{asset("news-master/assets/img/logo/logo.png")}}></a>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-9">
                            <div class="header-banner f-right ">
                                <img src={{asset("news-master/assets/img/gallery/header_card.png")}} alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-8 col-lg-8 col-md-12 header-flex">
                            <!-- sticky -->
                            <div class="sticky-logo">
                                <a href="index.html"><img src={{asset("news-master/assets/img/logo/logo.png")}}></a>
                            </div>
                            <!-- Main-menu -->
                            <div class="main-menu d-none d-md-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="{{route('home.page')}}">Trang chủ</a></li>

                                        <li><a href="{{route('category.page', 1)}}">Danh mục</a>
                                            <ul class="submenu">
                                                @foreach($allCate as $menu)
                                                    <li>
                                                        <a href="{{route('category.page', $menu->id)}}">{{$menu->name}}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li><a href="#">Blog</a></li>
                                        <li><a href="{{route('contact')}}">Liên Hệ</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4">
                            <form action="{{route('search')}}" method="POST">
                                @csrf
                                <div class="row align-items-center justify-content-center">
                                    <div class="col-8">
                                        <input style="width: 250px" type="text" name="search" placeholder="Tìm kiếm"
                                               onfocus="this.placeholder = ''" onblur="this.placeholder = 'First Name'"
                                               required
                                               class="single-input">
                                    </div>
                                    <div class="col-2">
                                        <button class="genric-btn primary-border"><i class="fa fa-search"></i></button>
                                    </div>

                                </div>
                            </form>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-md-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>


<form action="{{route('login')}}" method="POST">
    @csrf
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Đăng Nhập</h1>
                </div>
                <div class="modal-body">
                    <div class="mt-10">
                        <input type="email" name="email" placeholder="Email"
                               onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'" required
                               class="single-input">
                    </div>
                    <div class="mt-10">
                        <input type="password" name="password" placeholder="Mật khẩu"
                               onfocus="this.placeholder = ''" onblur="this.placeholder = 'Mật khẩu'" required
                               class="single-input">
                    </div>
                    <div class="mt-30 d-flex align-items-center justify-content-center"><div><a style="color: black; font-size: 14px" href="{{route('password.request')}}">Quên mật khẩu?</a></div></div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Huỷ</button>
                    <button type="submit" class="btn btn-primary">Đăng Nhập</button>
                </div>
            </div>
        </div>
    </div>
</form>


<form action="{{route('register')}}" method="POST">
    @csrf
    <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Đăng Ký</h1>
                </div>
                <div class="modal-body">
                    <div class="mt-10">
                        <input type="email" name="email" placeholder="Email"
                               onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'" required
                               class="single-input">
                    </div>

                    <div class="mt-10">
                        <input type="text" name="name" placeholder="Họ và tên"
                               onfocus="this.placeholder = ''" onblur="this.placeholder = 'Họ và tên'" required
                               class="single-input">
                    </div>
                    <div class="mt-10">
                        <input type="password" name="password" placeholder="Mật khẩu"
                               onfocus="this.placeholder = ''" onblur="this.placeholder = 'Mật khẩu'" required
                               class="single-input">
                    </div>

                    <div class="mt-10">
                        <input type="password" name="password_confirmation" placeholder="Nhập lại mật khẩu"
                               onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nhập lại mật khẩu'" required
                               class="single-input">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Huỷ</button>
                    <button type="submit" class="btn btn-primary">Đăng Ký</button>
                </div>
            </div>
        </div>
    </div>
</form>
