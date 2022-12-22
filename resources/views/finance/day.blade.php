@extends('layouts.master',['allTrainees'=>''])
@section('content')
    <div class="container ">


        @if(\Session::has('error'))
            <div class=" alert alert-danger  w-75 m-auto">{!! \Session::get('error') !!}</div>
            <div class="mb-5"></div>
        @endif
        @if(\Session::has('msg'))
            <div class=" alert alert-danger  w-75 m-auto">{!! \Session::get('msg') !!}</div>
            <div class="mb-5"></div>
        @endif
    </div>

    <div class="container">

    </div>
    <div class="container table-responsive">
        <table class="table" style="direction: rtl">
            <thead>
            <td>#</td>
            <td>القيمه</td>
            <td>المدرب</td>
            <td>المتدرب</td>
            <td>التوقيت</td>
            </thead>

            <tbody>
            @php
                $i=1;
                $sum =0 ;
            @endphp
            @foreach($revenues as $item)
                @php
                $sum+=$item->amount;
                @endphp
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$item->amount}}</td>
                    @if($item->trainer)
                        <td>{{$item->trainer->name}}</td>
                    @else
                        <td>ممسوح</td>
                    @endif

                    @if($item->trainee)
                        <td>{{$item->trainee->name}}</td>
                    @else
                        <td>ممسوح</td>
                    @endif
                    <td>{{$item->created_at->format('H:i:s')}}</td>


                </tr>

            @endforeach

            </tbody>
        </table>
 <div class="d-flex justify-content-center">
     <span style="font-size: 25px">
         المجموع : {{$sum }} جم
     </span>
 </div>
    </div>

@stop
@section('script')

@endsection

