<!DOCTYPE html>
<html lang="ar">

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

*{ font-family: DejaVu Sans !important;}


    </style>

</head>
<body>
<div class="container table-responsive">
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
            @if (auth()->user()->role == 0)
                <th scope="col">المدرب</th>
            @endif
            <th scope="col">العمليات</th>
        </tr>
        </thead>

        <tbody>
        @foreach($data as $item)


            <tr>
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->name}}</td>
                <td>{{$item->start_date}}</td>
                <td>{{$item->end_date}}</td>
                @if($item->payed !=0)
                    <td class="text-success ">{{$item->payed}}</td>
                @else
                    <td>{{$item->payed}}</td>
                @endif
                @if($item->not_payed !=0)
                    <td class="text-danger ">{{$item->not_payed}}</td>
                @else
                    <td>{{$item->not_payed}}</td>
                @endif
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

                @if (auth()->user()->role == 0)
                    @if($item->updater == "Amr Saleh")
                        <td style="color: #245f9f">unknown</td>
                    @else

                        <td style="color: #245f9f">{{$item->updater}}</td>
                    @endif
                @endif

                <td>
                    <a class="btn btn-primary " style="  cursor: pointer;margin-bottom: 10px" href="{{route('trainee.edit',$item)}}"><i class="fa-regular fa-pen-to-square"></i> </a>
                    @if(auth()->user()->role ==0)
                        <a class="btn btn-danger " style="  cursor: pointer; margin-right: 10px;margin-bottom: 10px" href="{{route('trainee.delete',$item)}}"><i class="fa-solid fa-trash"></i></a>
                    @endif
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>

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
<script src="{{asset('js/custom.js')}}"></script>
</body>
