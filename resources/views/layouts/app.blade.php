<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!--Font Awesome Icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
        integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
        crossorigin="anonymous" />

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">


     <!-- Scripts -->
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
     @livewireStyles()
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-xl text-dark bg-light shadow-sm fixed-top">
            <div class="container">
                @if(auth()->check() && (auth()->user()->admin == true))
                <a class="navbar-brand" href="{{ route('admin.home_dashboard') }}">
                    <img src="/img/SC_BWgoldBlue.png"  style="height: 35px; margin-right: 10px;" alt="">
                    {{ config('app.name', 'GLS') }}
                </a>
                @else
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="/img/SC_BWgoldBlue.png"  style="height: 35px; margin-right: 10px;" alt="">
                    {{ config('app.name', 'GLS') }}
                </a>
                @endif
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->

                        <li class="nav-item mt-1">
                            <a class="nav-link text-dark" href="{{ url('/home') }}"> &nbsp;Home</a>
                        </li>

                        <li class="nav-item mt-1">
                            <a class="nav-link text-dark" href="{{ url('/contact_information') }}"> &nbsp;Contact Information</a>
                        </li>

                        <li class="nav-item mt-1">
                            <a class="nav-link text-dark" href="{{ url('/about_us') }}"> &nbsp;About Us</a>
                        </li>

                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a d="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <img src="/user_img/user_icon.png" style="height: 30px; width: 30px;"
                                        class="user-image img-circle elevation-2" alt="User Image">
                                </a>

                                <div class="dropdown-menu dropdown-menu-end text-center" aria-labelledby="navbarDropdown">
                                    <span class="text-center">{{ Auth::user()->name }}</span>
                                    <hr>
                                    <a class="dropdown-item" href="{{route('profile')}}"><span class="fas fa-user"></span> Profile</a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                       <span class="fas fa-sign-out-alt"></span> {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

</body>
@livewireScripts()
</html>
