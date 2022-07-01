<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap"
        rel="stylesheet">

    <title>Flex Gym</title>
    <!--

    TemplateMo 548 Training Studio

    https://templatemo.com/tm-548-training-studio

    -->
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('css/fontawesome.min.css')}}">

    <link rel="stylesheet" href="{{asset('css/templatemo-training-studio.css')}}">
    <style>
        .nav li a {
            color: black !important;
        }
    </style>

</head>

<body>
<header class="header-area header-sticky " style="background-color: rgba(250,250,250,0.99)">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="index.html" class="logo" style="color: black">FLEX<em> GYM</em></a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li class="scroll-to-section"><a href="{{route('trainee.create')}}"
                                                         class="@if(isset($createTrainees))active @endif">create
                                Trainee</a></li>
                        <li class="scroll-to-section"><a href="{{route('trainee.all')}}"
                                                         class="@if(isset($allTrainees))active @endif">Trainees</a></li>
                        <li class="scroll-to-section"><a href="{{route('trainee.expired')}}"
                                                         class="@if(isset($expiredTrainees))active @endif">Expired
                                Trainee</a></li>

                        @if(auth()->user()->role==0)
                            <li class="scroll-to-section"><a href="{{route('trainer.all')}}"
                                                             class="@if(isset($allTrainers))active @endif">All
                                    Trainers</a></li>
                            <li class="scroll-to-section"><a href="{{route('trainer.create')}}"
                                                             class="@if(isset($createTrainers))active @endif">Create
                                    Trainers</a></li>
                            <li class="scroll-to-section"><a href="{{route('trainee.create')}}"
                                                             class="@if(isset($Finance))active @endif">Finance</a></li>
                        @endif
                        <li class="scroll-to-section"><a href="{{route('profile.index')}}"
                                                         class="@if(isset($profile))active @endif">Profile</a></li>

                        <li class="main-button"><a href="{{route('logout')}}" style="color: #FFFFFF !important;"  onclick="event.preventDefault();document.getElementById('logout-form').submit()">Log
                                Out</a>
                            <form method="post" action="{{route('logout')}}" style="display: none" id="logout-form">@csrf</form>
                        </li>

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

<div style="margin-top: 140px">
    @yield('content')
</div>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright &copy; {{date("Y")}} Flex Gym

                    - Developed by <a rel="nofollow" href="https://www.facebook.com/profile.php?id=100004507838110"
                                      class="tm-text-link " target="_parent" style="font-weight: 600">Amr Saleh</a></p>

                <!-- You shall support us a little via PayPal to info@templatemo.com -->

            </div>
        </div>
    </div>
</footer>

<!-- jQuery -->
<script src="{{asset('js/jquery-2.1.0.min.js')}}"></script>

<!-- Bootstrap -->
<script src="{{asset('js/popper.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>

<!-- Plugins -->
<script src="{{asset('js/scrollreveal.min.js')}}"></script>
<script src="{{asset('js/waypoints.min.js')}}"></script>
<script src="{{asset('js/jquery.counterup.min.js')}}"></script>
<script src="{{asset('js/imgfix.min.js')}}"></script>
<script src="{{asset('js/mixitup.js')}}"></script>
<script src="{{asset('js/accordions.js')}}"></script>
<script src="{{asset('js/all.min.js')}}"></script>

<!-- Global Init -->
<script src="{{asset('js/custom.js')}}"></script>
<script>
    function submitSearchTraineeForm() {
        formSearchTrainee.submit();
    }
</script>

</body>
</html>
