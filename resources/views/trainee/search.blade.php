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
<header class="header-area header-sticky " style="background-color: rgba(250,250,250,0.99)">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="{{route('landpage')}}" class="logo" style="color: black">FLEX<em> GYM</em></a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li class="scroll-to-section mr-4" >
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
                        <li class="scroll-to-section mr-3"><a href="#top" style="color: black">Home</a></li>
                        <li class="main-button">
                            <a href="{{route('logout')}}" style="color: #FFFFFF !important;"  onclick="event.preventDefault();document.getElementById('logout-form').submit()">Log Out</a>
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

<div class="container table-responsive" style="margin-top: 130px">
    <table class="table" style="direction: rtl">
        <thead>
        <tr>
            <th scope="col">الرقم</th>
            <th scope="col">الاسم</th>
            <th scope="col">بدايه الاشتراك</th>
            <th scope="col">نهاية الاشتراك</th>
            <th scope="col">المدفوع</th>
            <th scope="col">لم يدفع بعد</th>
            <th scope="col">النظام</th>

        </tr>
        </thead>

        <tbody>
        @foreach($data as $item)


            <tr>
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->name}}</td>
                <td>{{$item->start_date}}</td>
                <td>{{$item->end_date}}</td>
                <td>{{$item->payed}}</td>
                <td>{{$item->not_payed}}</td>
                <td>
                    @if($item->program==0)
                        جيم
                    @elseif($item->program==1)
                        تخسيس
                    @elseif($item->program==2)
                        جيم و تخسيس
                    @else
                        سيدات
                    @endif()
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>

</div>
<div class="container d-flex justify-content-center">
    {{ $data->links() }}
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
</body>
