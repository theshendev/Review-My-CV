<header>
<div class="container">
    <div class="row mt-5">
        <div class="col-md-1 text-right">
            <a style="position: relative;top: -10px" href="{{ url('/') }}">
                    <img style="width: 75%;min-width: 55px" src="{{asset('images/main.png')}}" alt="{{ config('app.name', 'Laravel') }}">
            </a>
        </div>
        <div class="col-md-11 p-0">
            <nav class="navbar navbar-expand-lg navbar-light shadow-sm mx-auto">
                <div class="container">

                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">
                            <li>
                                <a class="nav-link typo-logo" href="/">
                                    REVIEWMYCV
                                </a>
                            </li>
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest(getGuard())
                                @if (Route::has('register'))
                                    <li class="nav-item nav-item_bg">
                                        <a class="nav-link" href="{{ route('register') }}"> <span style="font-size: 1rem;" class="fa fa-user-plus"></span> ثبت نام</a>
                                    </li>
                                @endif
                                    <li class="nav-item nav-item_bg">
                                        <a class="nav-link" href="{{ route('login') }}"><span style="font-size: 1rem;vertical-align: middle" class="fa fa-portal-enter"></span> ورود</a>
                                    </li>
                            @else
                                <li class="nav-item dropdown nav-item_bg">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ auth(getGuard())->user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right text-right"
                                         aria-labelledby="navbarDropdown">
                                        <div class="text-center my-3">
                                        <img class="dropdown-menu_image" src="{{auth(getGuard())->user()->image}}" alt="">
                                        </div>
                                            <a class="dropdown-item" href="{{ route(getGuard()=='web' ? 'user.profile' : 'reviewer.profile') }}"><span class="fa fa-user"></span> پروفایل</a>
                                            <a class="dropdown-item" href="{{route('password.change')}}"><span class="fa fa-slack-hash"></span> تغییر رمز عبور</a>

                                        <a class="dropdown-item" href="{{ route('requests.index') }}"><span class="fa fa-receipt"></span> وضعیت درخواست ها</a>

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <span class="fa fa-portal-exit"></span>
                                    خروج
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>

                    </div>
                    </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('reviewers.index')}}">
                                        لیست ارزیاب ها
                                    </a>
                                </li>
                    @endguest
                            <li class="nav-item">
                                <a class="nav-link" href="/about">درباره ما</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/contact">تماس با ما</a>
                            </li>
                    </ul>
                </div>
        </div>
        </nav>
    </div>
</div>
</div>

</header>