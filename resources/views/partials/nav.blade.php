<div class="container">
    <div class="row mt-5">
        <div class="col-2 align-self-center">
            <a class="navbar-brand" href="{{ url('/') }}">
                <a href="/">
                    <img src="" alt="{{ config('app.name', 'Laravel') }}">
                </a>
            </a>
        </div>
        <div class="col-10">
            <nav class="navbar navbar-expand-md navbar-light shadow-sm mx-auto"
                 style="background-color: #FFD166;border-radius: 50px">
                <div class="container">

                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="/about">درباره ما</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/contact">تماس با ما</a>
                            </li>
                            <!-- Authentication Links -->
                            @guest(getGuard())
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">ورود</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">ثبت نام</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ auth(getGuard())->user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right text-right"
                                         aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route(getGuard()=='web' ? 'profile' : 'reviewer' ) }}">پروفایل</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    خروج
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                    </div>
                    </li>
                    @endguest

                    </ul>
                </div>
        </div>
        </nav>
    </div>
</div>
</div>

