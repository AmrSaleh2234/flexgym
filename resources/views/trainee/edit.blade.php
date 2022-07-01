@extends('layouts.master',['editTrainees'=>''])
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
        <div class="edit_password">
            <form action="{{route('trainee.update',$trainee)}}" method="post"
                  class="d-flex  flex-column align-items-center p-5 add_doctor">
                @csrf
                <h4 class="m-auto" style="font-size: 30px ; font-weight: bold">Add <span style="color: #ed563b">trainee</span></h4>
                <div class="mb-4"></div>
                <input type="text" name="name" placeholder="  Enter Name" value="{{ $trainee->name }}"
                       class="form-control @error('name') is-invalid @enderror">
                @error('name')
                <span class="invalid-feedback text-center" role="alert" style="margin-top: -23px ;margin-bottom: 25px">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
                <label class="align-self-start ml-5" style="font-size:18px ; font-weight: 500" >Enter <span style="color: #ed563b">start date</span> </label>
                <input type="date" name="start_date" placeholder="dd-mm-yyyy" value="{{ $trainee->start_date }}"
                       class="form-control @error('start_date') is-invalid @enderror" min="1997-01-01">
                @error('start_date')
                <span class="invalid-feedback text-center" role="alert" style="margin-top: -23px ;margin-bottom: 25px">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
                <label class="align-self-start ml-5" style="font-size:18px ; font-weight: 500" >Enter <span style="color: #ed563b">end date</span> </label>
                <input type="date" name="end_date" placeholder="dd-mm-yyyy" value="{{ $trainee->end_date }}"
                       class="form-control @error('end_date') is-invalid @enderror" min="1997-01-01">
                @error('end_date')
                <span class="invalid-feedback text-center" role="alert" style="margin-top: -23px ;margin-bottom: 25px">
                <strong>{{ $message }}</strong>
            </span>
                @enderror

                <input type="number" name="payed" placeholder="  Enter payed money " value="{{ $trainee->payed }}"
                       class="form-control @error('payed') is-invalid @enderror">
                @error('payed')
                <span class="invalid-feedback text-center" role="alert" style="margin-top: -23px ;margin-bottom: 25px">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
                <input type="number" name="not_payed" placeholder="  Enter not payed money " value="{{ $trainee->not_payed }}"
                       class="form-control @error('not_payed') is-invalid @enderror">
                @error('not_payed')
                <span class="invalid-feedback text-center" role="alert" style="margin-top: -23px ;margin-bottom: 25px">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
                <button type="submit" class="main-btn">submit</button>

            </form>
        </div>

    </div>


@stop
