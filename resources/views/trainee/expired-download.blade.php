
<!DOCTYPE html >
<html lang="ar">
<style>
    table, th, td {
        border:1px solid black;
    }
    *{ font-family: DejaVu Sans !important;}
</style>
<body>

<h2 style="text-align: center "> backup date <?php
    date_default_timezone_set("Africa/Cairo");

    echo (date("Y/m/d h:i:sa"))?></h2>

<table style="width:100%;direction: rtl">
    <tr>
        <<th scope="col">الرقم</th>
        <th scope="col">الاسم</th>
        <th scope="col">بدايه الاشتراك</th>
        <th scope="col">نهاية الاشتراك</th>
        <th scope="col">المدفوع</th>
        <th scope="col">لم يدفع بعد</th>
        <th scope="col">النظام</th>
        @if (auth()->user()->role == 0)
            <th scope="col">المدرب</th>
        @endif


    </tr>

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



        </tr>
    @endforeach
</table>

<p>Copyright &copy; {{date("Y")}} Flex Gym

    - Developed by <a rel="nofollow" href="https://www.facebook.com/profile.php?id=100004507838110"
                      class="tm-text-link " target="_parent" style="font-weight: 600">Amr Saleh</a></p>

</body>
</html>

