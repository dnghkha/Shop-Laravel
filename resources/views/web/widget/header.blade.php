<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-7">
                    <div class="header__top__left">
                        <p>Free shipping, 30-day return or refund guarantee.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-5">
                    <div class="header__top__right">
                        <div class="header__top__links">
                            @if (!Auth::check())
                            <a href="{{route('login.index')}}">{{__('signIn')}}</a>
                            @else
                            <a href="{{route('logout')}}">Sign Out</a>
                            @endif
                            <a href="{{route('thankyou')}}">FAQs</a>
                        </div>
                        <div class="header__top__hover">
                            <span>{{__('lang').':'.session('lang')??'EN'}} <i class="arrow_carrot-down"></i></span>
                            <ul>
                                <li><a href="{{route('lang', ['lang' => 'en'])}}">English</a></li>
                                <li><a href="{{route('lang', ['lang' => 'vi'])}}">Vietnamese</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="header__logo">
                    <a href="{{route('home')}}"><img src="{{asset('/')}}uploads/images/logo.png" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <nav class="header__menu mobile-menu">
                    <ul>
                        <li class="{{ Request::routeIs('home*') ? 'active' : '' }}"><a href="{{route('home')}}">{{__('home')}}</a>
                        </li>
                        <li class="{{ Request::routeIs('product*') ? 'active' : '' }}"><a
                                href="{{route('product.index')}}">{{__('shop')}}</a></li>
                        <li class="{{ Request::routeIs('blog*') ? 'active' : '' }}"><a href="{{route('blog')}}">{{__('blog')}}</a>
                        </li>
                        <li class="{{ Request::routeIs('aboutus*') ? 'active' : '' }}"><a
                                href="{{route('aboutus')}}">{{__('aboutUs')}}</a></li>
                        <li class="{{ Request::routeIs('contact*') ? 'active' : '' }}"><a
                                href="{{route('contact')}}">{{__('contact')}}</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3 col-md-3">
                <div class="header__nav__option">
                    <a href="#" class="search-switch"><img src="{{asset('/')}}uploads/images/icon/search.png"
                            alt=""></a>
                    <a href="#"><img src="{{asset('/')}}uploads/images/icon/heart.png" alt=""></a>
                    {{-- <a href="{{route('shopping-cart')}}"><img src="{{asset('/')}}uploads/images/icon/cart.png"
                            alt=""> <span>{{(session('cart')?count(session('cart')):0)}}</span></a> --}}
                    <a href="{{route('cart.index')}}"><img src="{{asset('/')}}uploads/images/icon/cart.png" alt="">
                        <span id="count_cart">{{(session('cart')?session('count_cart'):0)}}</span></a>
                    <div class="price"><span
                            id="total">{{(session('cart')?session('total'):0)}}</span><sup><u>đ</u></sup></div>
                </div>
            </div>
        </div>
        <div class="canvas__open"><i class="fa fa-bars"></i></div>
    </div>
</header>

<!-- Search Begin -->
<div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-switch">+</div>
        <form class="search-model-form">
            <input type="text" id="search-input" placeholder="Search here.....">
        </form>
    </div>
</div>
<!-- Search End -->