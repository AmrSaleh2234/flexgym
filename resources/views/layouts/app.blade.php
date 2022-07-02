<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('css/templatemo-training-studio.css')}}">
    <!-- Styles -->
    <style>
        .nav li a {
            color: black !important;
        }
    </style>
</head>
<body>
    <div id="app">

        <header class="header-area header-sticky" style="background-color: rgba(250,250,250,0.99)">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <nav class="main-nav">
                            <!-- ***** Logo Start ***** -->
                            <a href="{{route('landpage')}}" class="logo" style="color: black">FLEX<em> GYM</em></a>
                            <!-- ***** Logo End ***** -->
                            <!-- ***** Menu Start ***** -->
                            <ul class="nav">
                                <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                                <li class="scroll-to-section"><a href="#features">About</a></li>
                                <li class="scroll-to-section"><a href="#schedule">Schedules</a></li>
                                <li class="scroll-to-section"><a href="#contact-us">Contact</a></li>
                                @if(auth()->check())
                                    <li class="scroll-to-section"><a href="{{route('trainee.all')}}" style="color: #b8f1d4">dashboard</a></li>
                                    <li class="main-button">
                                        <a href="{{route('logout')}}" style="color: #FFFFFF !important;"  onclick="event.preventDefault();document.getElementById('logout-form').submit()">Log Out</a>
                                        <form method="post" action="{{route('logout')}}" style="display: none" id="logout-form">@csrf</form>
                                    </li>
                                @else
                                    <li class="main-button" style="color: #fff"><a href="{{route('login')}}" style="color: #fff !important;">Log In</a></li>
                                @endif

                            </ul>
                            <a class='menu-trigger'>
                                <span>Menu</span>
                            </a>
                            <!-- ***** Menu End ***** -->
                        </nav>
                    </div>
                </div>
            </div>
        </header>
        <main class="py-4 " style="margin-top:99px " >
            @yield('content')
        </main>
    </div>
</body>
</html>
