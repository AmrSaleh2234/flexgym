@extends('layouts.master',['finance'=>''])
@section('content')

<div class="container  text-right" style="direction: rtl">

    <h2 class="text-center">snapshot <span class="text-color">accounting table</span> </h2>

    <div class="d-flex mb-4">
        <h3 class="text-color "> المبلغ المحصل : </h3>
        &nbsp;
        <h3 class="r ">{{ $revenue}}</h3>
    </div>
    <div class="d-flex">
        <h3 class="text-color "> المبلغ المتبقي : </h3>
        &nbsp;
        <h3 class=" ">{{$deserved_amount}}</h3>
    </div>

</div>
@stop
