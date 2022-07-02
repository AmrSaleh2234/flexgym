@extends('layouts.master',['finance'=>''])
@section('content')

    <div class="container  text-right" style="direction: rtl">

        <h2 class="text-center mb-3 ">snapshot <span class="text-color">accounting table</span></h2>

        <div class="d-flex mb-4">
            <h3 class="text-color "> المبلغ المحصل : </h3>
            &nbsp;
            <h3 class="r ">{{ $revenue}}</h3>
        </div>
        <div class="d-flex mb-5">
            <h3 class="text-color "> المبلغ المتبقي : </h3>
            &nbsp;
            <h3 class=" ">{{$deserved_amount}}</h3>
        </div>
        @if(isset($revenue2))
            <h2 class="text-center mb-5 ">calculated between<span class="text-color"> {{$start}} - {{$end}}</span></h2>

            <div class="d-flex mb-4">
                <h3 class="text-color "> المبلغ المحصل : </h3>
                &nbsp;
                <h3 class="r ">{{ $revenue2}}</h3>
            </div>
            <div class="d-flex">
                <h3 class="text-color "> المبلغ المتبقي : </h3>
                &nbsp;
                <h3 class=" ">{{$deserved_amount2}}</h3>
            </div>
        @else
            <div class="edit_password mt-4" style="direction: rtl">
                <form action="{{route('finance.date')}}" method="post"
                      class="d-flex  flex-column align-items-center  " style="padding: 0 100px">
                    @csrf
                    <h4 class="m-auto" style="font-size: 30px ; font-weight: bold">calculate <span
                            style="color: #ed563b">By Duration</span></h4>
                    <div class="mb-4"></div>

                    <label class="align-self-start mr-5" style="font-size:18px ; font-weight: 500">ادخل <span
                            style="color: #ed563b;font-weight: 600"> تاريج بدأ الحساب </span> </label>
                    <input type="date" name="start_date" placeholder="dd-mm-yyyy" value="{{ old('start_date') }}"
                           class="form-control @error('start_date') is-invalid @enderror" min="1997-01-01">
                    @error('start_date')
                    <span class="invalid-feedback text-center" role="alert"
                          style="margin-top: -23px ;margin-bottom: 25px">
                <strong>{{ $message }}</strong>
            </span>
                    @enderror
                    <label class="align-self-start mr-5" style="font-size:18px ; font-weight: 500">أدخل <span
                            style="color: #ed563b;font-weight: 600">معاد نهاية الحساب </span> </label>
                    <input type="date" name="end_date" placeholder="dd-mm-yyyy" value="{{ old('end_date') }}"
                           class="form-control @error('end_date') is-invalid @enderror" min="1997-01-01">
                    @error('end_date')
                    <span class="invalid-feedback text-center" role="alert"
                          style="margin-top: -23px ;margin-bottom: 25px">
                <strong>{{ $message }}</strong>
            </span>
                    @enderror

                    <button type="submit" class="main-btn">submit</button>

                </form>
            </div>
        @endif


    </div>
@stop
