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
            <td>المدرب</td>
            <td>بدايه الاشتراك</td>
            <td>نهايه الاشتراك</td>
            </thead>

            <tbody>
            @php
                $i=1;
            @endphp
            @foreach($data as $item)
                <tr>
                    <td>{{$i++}}</td>
                    @if($item->trainer)
                        <td>{{$item->trainer->name}}</td>
                    @else
                        <td>ممسوح</td>
                    @endif


                    <td>{{$item->start_date}}</td>
                    <td>{{$item->end_date}}</td>

                </tr>

            @endforeach

            </tbody>
        </table>

    </div>

@stop
@section('script')

@endsection

