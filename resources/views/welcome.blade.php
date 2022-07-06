<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

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
        .text-color
        {
            color: #ed563b !important;
        }
    </style>

</head>

<body>

<!-- ***** Preloader Start ***** -->

<!-- ***** Preloader End ***** -->


<!-- ***** Header Area Start ***** -->
<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="{{route('landpage')}}" class="logo">FLEX<em> GYM</em></a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li class="scroll-to-section mr-4">
                            <form class="input-group rounded search_input  " id="formSearchTrainee"
                                  action="{{route('trainee.searchMembers')}}" type="get" style="margin-right: 10px">

                                <input type="search" class="form-control rounded" name="search" placeholder="Search by id or name " aria-label="Search"
                                       aria-describedby="search-addon" id="search_course" style="background-color: #ffffff !important;margin-right: 10px"/>
                                <label class="input-group-text border-0 pointer-event" id="search-addon" for="search_course"
                                       onclick="document.getElementById('formSearchTrainee').submit()" style="cursor: pointer;background-color: #f4f4f4!important;">
                                    <i class="fas fa-search text-color"></i>
                                </label>
                            </form>
                        </li>
                        <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                        <li class="scroll-to-section"><a href="#features">About</a></li>
                        <li class="scroll-to-section"><a href="#schedule">Schedules</a></li>
                        <li class="scroll-to-section"><a href="#contact-us">Location</a></li>
                        @if(auth()->check())
                            <li class="scroll-to-section"><a href="{{route('trainee.all')}}" style="color: #b8f1d4 !important;">dashboard</a></li>
                            <li class="main-button">
                                <a href="{{route('logout')}}" style="color: #FFFFFF !important;"  onclick="event.preventDefault();document.getElementById('logout-form').submit()">Log Out</a>
                                <form method="post" action="{{route('logout')}}" style="display: none" id="logout-form">@csrf</form>
                            </li>
                        @else
                            <li class="main-button"><a href="{{route('login')}}">Log In</a></li>
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
<!-- ***** Header Area End ***** -->

<!-- ***** Main Banner Area Start ***** -->
<div class="main-banner" id="top">
    <video autoplay muted loop id="bg-video">
        <source src="{{asset('images/gym-video.mp4')}}" type="video/mp4" />
    </video>

    <div class="video-overlay header-text">
        <div class="caption">
            <h6>work harder, get stronger</h6>
            <h2>easy with our <em>gym</em></h2>
            <div class="main-button scroll-to-section">
                <a href="#features">Become a member</a>
            </div>
        </div>
    </div>
</div>
<!-- ***** Main Banner Area End ***** -->

<!-- ***** Features Item Start ***** -->
<section class="section" id="features">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="section-heading">
                    <h2>Choose <em>Program</em></h2>
                    <img src="{{asset('images/line-dec.png')}}" alt="waves">
                    <p>Flex Gym is advanced and th best in el-salam city ever , it have all advanced machine and all machine are imported from abroad .</p>

                </div>
            </div>
            <div class="col-lg-6">
                <ul class="features-items">
                    <li class="feature-item">
                        <div class="left-icon">
                            <img src="{{asset('images/features-first-icon.png')}}" alt="First One">
                        </div>
                        <div class="right-content">
                            <h4>Basic Fitness Program</h4>
                            <p>Fitness program you can train with any machine in gym except cardio machines .</p>
                            <p class="text-color">Price: 200 LE</p>

                        </div>
                    </li>
                    <li class="feature-item">
                        <div class="left-icon">
                            <img src="{{asset('images/features-first-icon.png')}}" alt="second one">
                        </div>
                        <div class="right-content">
                            <h4>Burn Fat Program</h4>
                            <p>you can train with burn fat and cardio machines only .</p>
                            <p class="text-color">Price: 250 LE</p>
                        </div>
                    </li>

                </ul>
            </div>
            <div class="col-lg-6">
                <ul class="features-items">
                    <li class="feature-item">
                        <div class="left-icon">
                            <img src="{{asset('images/features-first-icon.png')}}" alt="fourth muscle">
                        </div>
                        <div class="right-content">
                            <h4>Fitness And Burn Fat Course</h4>
                            <p>You can train with any machine in gym and cardio machines .</p>
                            <p class="text-color">Price: 300 LE</p>
                        </div>
                    </li>
                    <li class="feature-item">
                        <div class="left-icon">
                            <img src="{{asset('images/features-first-icon.png')}}" alt="training fifth">
                        </div>
                        <div class="right-content">
                            <h4>Women Training Program </h4>
                            <p>This program special for woman only and captin train them with fitness gym and cardion gym  .</p>
                            <p class="text-color">Price: 200 LE</p>
                        </div>

                </ul>
            </div>
        </div>
    </div>
</section>
<!-- ***** Features Item End ***** -->




<section class="section" id="schedule">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="section-heading dark-bg">
                    <h2>Classes <em>Schedule</em></h2>
                    <img src="{{asset('images/line-dec.png')}}" alt="">
                    <p>mens can train 7 days in week and women train 3 days in week.</p>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-lg-6">
                <div class="schedule-table ">
                    <table>
                        <tbody>
                        <tr >
                            <td class=" text-color">Days</td>
                            <td class="monday ts-item show text-color" data-tsmeta="monday">Mens schedule</td>
                            <td class="tuesday ts-item text-color" data-tsmeta="tuesday">Women schedule </td>

                        </tr>
                        <tr>
                            <td class="day-time">Saturday</td>
                            <td class="monday ts-item show" data-tsmeta="monday">Mens from 10:00AM to 6:00BM / 8:00BM to 2:00AM</td>
                            <td class="tuesday ts-item" data-tsmeta="tuesday">womens from 6:00BM to 8:00BM </td>

                        </tr>
                        <tr>
                            <td class="day-time">Sunday</td>
                            <td class="friday ts-item" data-tsmeta="friday">all the day </td>
                            <td class="thursday friday ts-item" data-tsmeta="thursday" data-tsmeta="friday">women free day </td>

                        </tr>
                        <tr>
                            <td class="day-time">Monday</td>
                            <td class="tuesday ts-item" data-tsmeta="tuesday">Mens from 10:00AM to 6:00BM / 8:00BM to 2:00AM</td>
                            <td class="monday ts-item show" data-tsmeta="monday">womens from 6:00BM to 8:00BM </td>

                        </tr>
                        <tr>
                            <td class="day-time">Tuesday</td>
                            <td class="friday ts-item" data-tsmeta="friday">all the day </td>
                            <td class="thursday friday ts-item" data-tsmeta="thursday" data-tsmeta="friday">women free day </td>


                        </tr>
                        <tr>
                            <td class="day-time">Wednesday</td>
                            <td class="tuesday ts-item" data-tsmeta="tuesday">Mens from 10:00AM to 6:00BM / 8:00BM to 2:00AM</td>
                            <td class="monday ts-item show" data-tsmeta="monday">womens from 6:00BM to 8:00BM </td>

                        </tr>
                        <tr>
                            <td class="day-time">Thursday</td>
                            <td class="friday ts-item" data-tsmeta="friday">all the day </td>
                            <td class="thursday friday ts-item" data-tsmeta="thursday" data-tsmeta="friday">women free day </td>

                        </tr>
                        <tr>
                            <td class="day-time">Friday</td>
                            <td class="friday ts-item" data-tsmeta="friday">all the day </td>
                            <td class="thursday friday ts-item" data-tsmeta="thursday" data-tsmeta="friday">women free day </td>

                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-6 ">
                <div class="schedule-table " style="direction: rtl">
                    <table>
                        <tbody>
                        <tr >
                            <td class=" text-color">الايام</td>
                            <td class="monday ts-item show text-color" data-tsmeta="monday">مواعيد الرجال</td>
                            <td class="tuesday ts-item text-color" data-tsmeta="tuesday">مواعيد السيدات  </td>

                        </tr>
                        <tr>
                            <td class="day-time">السبت</td>
                            <td class="monday ts-item show" data-tsmeta="monday">الرجال من 10صباحا حتي 6 مسائا/ من 8 مسائا حتي 2 صباحا </td>
                            <td class="tuesday ts-item" data-tsmeta="tuesday">السيدات من 6 مسائا حتي 8 مسائا  </td>

                        </tr>
                        <tr>
                            <td class="day-time">الاحد</td>
                            <td class="friday ts-item" data-tsmeta="friday">طوال اليوم </td>
                            <td class="thursday friday ts-item" data-tsmeta="thursday" data-tsmeta="friday">يوم راحة  </td>

                        </tr>
                        <tr>
                            <td class="day-time">الاثنين</td>
                            <td class="tuesday ts-item" data-tsmeta="tuesday">الرجال من 10صباحا حتي 6 مسائا/ من 8 مسائا حتي 2 صباحا</td>
                            <td class="monday ts-item show" data-tsmeta="monday">السيدات من 6 مسائا حتي 8 مسائا </td>

                        </tr>
                        <tr>
                            <td class="day-time">الثلاثاء</td>
                            <td class="friday ts-item" data-tsmeta="friday">طوال اليوم </td>
                            <td class="thursday friday ts-item" data-tsmeta="thursday" data-tsmeta="friday">يوم راحة  </td>


                        </tr>
                        <tr>
                            <td class="day-time">الاربعاء</td>
                            <td class="tuesday ts-item" data-tsmeta="tuesday">الرجال من 10صباحا حتي 6 مسائا/ من 8 مسائا حتي 2 صباحا</td>
                            <td class="monday ts-item show" data-tsmeta="monday">السيدات من 6 مسائا حتي 8 مسائا  </td>

                        </tr>
                        <tr>
                            <td class="day-time">الخميس</td>
                            <td class="friday ts-item" data-tsmeta="friday">طوال اليوم </td>
                            <td class="thursday friday ts-item" data-tsmeta="thursday" data-tsmeta="friday">يوم راحة </td>

                        </tr>
                        <tr>
                            <td class="day-time">الجمعة</td>
                            <td class="friday ts-item" data-tsmeta="friday">طوال اليوم</td>
                            <td class="thursday friday ts-item" data-tsmeta="thursday" data-tsmeta="friday">يوم راحة </td>

                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ***** Testimonials Starts ***** -->
<section class="section" id="trainers">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="section-heading">
                    <h2>Expert <em>Trainers</em></h2>
                    <img src="{{asset('images/line-dec.png')}}" alt="">
                    <p>Captins in gym are professional ,they are train since <span class="text-color">2005</span>  .</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="trainer-item">
                    <div class="image-thumb">
                        <img style="height: 310px" src="{{asset('images/Mohamed.jpeg')}}" alt="">
                    </div>
                    <div class="down-content">

                        <span style="font-weight: bold">captain: Mohamed Mostfa </span>
                        <p>Captain Mohamed Mostfa is trainer fitness , cardio and train program women , He is manager of flex gym .</p>

                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="trainer-item">
                    <div class="image-thumb">
                        <img style="height: 310px" src="{{asset('images/Ramy.jpeg')}}" alt="">
                    </div>
                    <div class="down-content">

                        <span style="font-weight: bold">captain: Ramy </span>
                        <p>Captain Ramy is trainer fitness and cardio, He is assistant in flex gym .</p>

                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- ***** Testimonials Ends ***** -->

<!-- ***** Contact Us Area Starts ***** -->
<section class="section" id="contact-us">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-xs-12">
                <div id="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1310.7983317808994!2d31.412857590308445!3d30.173092499366774!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1458115798c7fb0f%3A0x42da54fe51130a7c!2z2YbYp9iv2Ykg2LTYqNin2Kgg2KfZhNiz2YTYp9mF!5e0!3m2!1sar!2seg!4v1656236143668!5m2!1sar!2seg" width="100%" height="600px" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-xs-12">
                <div class="contact-form">
                    <form id="contact" action="" method="post">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <fieldset>
                                    <input name="name" type="text" id="name" placeholder="Your Name*" required="">
                                </fieldset>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <fieldset>
                                    <input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email*" required="">
                                </fieldset>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <fieldset>
                                    <input name="subject" type="text" id="subject" placeholder="Subject">
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <textarea name="message" rows="6" id="message" placeholder="Message" required=""></textarea>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <button type="submit" id="form-submit" class="main-button">Send Message</button>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Contact Us Area Ends ***** -->

<!-- ***** Footer Start ***** -->

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
