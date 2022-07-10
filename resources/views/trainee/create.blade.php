@extends('layouts.master',['createTrainees'=>''])
@section('content')
    <div class="container ">
        @if($errors->any())
            <div class=" alert alert-danger w-75 m-auto">{{$errors->first()}}</div>
            <div class="mb-5"></div>
        @endif

        @if(\Session::has('msg'))
            <div class=" alert alert-success  w-75 m-auto">{!! \Session::get('msg') !!}</div>
            <div class="mb-5"></div>
        @endif
        <div class="edit_password" style="direction: rtl">
            <form action="{{route('trainee.store')}}" method="post"
                  class="d-flex  flex-column align-items-center  " style="padding: 0 100px">
                @csrf
                <h4 class="m-auto" style="font-size: 30px ; font-weight: bold">Add <span style="color: #ed563b">trainee</span></h4>
                <div class="mb-4"></div>
                <input type="text" name="name" placeholder="ادخل اسم المستخدم" value="{{ old('name') }}"
                       class="form-control @error('name') is-invalid @enderror">
                @error('name')
                <span class="invalid-feedback text-center" role="alert" style="margin-top: -23px ;margin-bottom: 25px">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
                <label class="align-self-start mr-5" style="font-size:18px ; font-weight: 500" >ادخل <span style="color: #ed563b;font-weight: 600">معاد بدأ الاشتراك </span> </label>
                <input type="date" name="start_date" value="{{ old('start_date') }}"
                       class="form-control @error('start_date') is-invalid @enderror">
                @error('start_date')
                <span class="invalid-feedback text-center" role="alert" style="margin-top: -23px ;margin-bottom: 25px">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
                <label class="align-self-start mr-5" style="font-size:18px ; font-weight: 500" >أدخل <span style="color: #ed563b;font-weight: 600">معاد نهاية الاشتراك</span> </label>
                <input type="date" name="end_date" value="{{ old('end_date') }}"
                       class="form-control @error('end_date') is-invalid @enderror">
                @error('end_date')
                <span class="invalid-feedback text-center" role="alert" style="margin-top: -23px ;margin-bottom: 25px">
                <strong>{{ $message }}</strong>
            </span>
                @enderror

                <input type="number" name="payed" placeholder=" أدخل المبلغ المدفوع " value="{{ old('payed') }}"
                       class="form-control @error('payed') is-invalid @enderror">
                @error('payed')
                <span class="invalid-feedback text-center" role="alert" style="margin-top: -23px ;margin-bottom: 25px">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
                <input type="number" name="not_payed" placeholder="  أدخل المبلغ المتبقي " value="{{ old('not_payed') }}"
                       class="form-control @error('not_payed') is-invalid @enderror">
                @error('not_payed')
                    <span class="invalid-feedback text-center" role="alert" style="margin-top: -23px ;margin-bottom: 25px">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <select class="form-select" aria-label="Default select example" name="program" style="width: 90%;margin-bottom: 30px; padding: 7px 14px;">
                    <option value="0" selected>جيم</option>
                    <option value="1">تخسيس</option>
                    <option value="2">جيم و تخسيس</option>
                    <option value="3">سيدات</option>
                </select>

                <button type="submit" class="main-btn">submit</button>

            </form>
        </div>

    </div>


@stop
