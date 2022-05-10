<header class="header_section">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="{{ route('show.admin') }}">
                <span>
                    Timups
                </span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""> </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('show.home') }}">Trang chủ<span
                                class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('show.product') }}"> Sản phẩm </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.html"> Tin tức </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html"> Liên hệ</a>
                    </li>
                </ul>
                <div class="user_option-box row" style="width: 350px">
                    <div class="dropdown col-sm-2">
                        {{-- <button class="btn btn-secondary dropdown-toggle" type="button" >
                          Dropdown button
                        </button> --}}
                        <a href="" id="dropdownMenuButton" style="font-size: 20px" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            @if (Illuminate\Support\Facades\Auth::check())
                                <a class="dropdown-item" href="{{ route('show.register') }}">Giỏ hàng</a>
                                <a class="dropdown-item" href="{{ route('show.login') }}">Thông tin</a>
                                @if (Auth::user()->role == 1)
                                    <a class="dropdown-item" href="{{ route('show.admin') }}">Trang quản lý</a>
                                @endif
                                <a class="dropdown-item" href="{{ route('logout') }}">Thoát</a>
                            @else
                                <a class="dropdown-item" href="{{ route('show.register') }}">Đăng ký</a>
                                <a class="dropdown-item" href="{{ route('show.login') }}">Đăng nhập</a>
                            @endif
                        </div>
                    </div>
                    <a href="{{ route('cart') }}" style="font-size: 25px">
                        <i class="fa fa-cart-plus" aria-hidden="true"></i>
                    </a>
                    {{-- <a href="">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </a> --}}
                </div>
            </div>
        </nav>
    </div>
</header>
