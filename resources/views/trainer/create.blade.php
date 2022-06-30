@extends('layouts.master')
@section('content')
    <div class="container ">
        @if($errors->any())
            <div class=" alert alert-danger w-75 m-auto">{{$errors->first()}}</div>
            <div class="mb-5"></div>
        @endif

        @if(isset($msg))
            <div class=" alert alert-success  w-75 m-auto">{{$msg}}</div>
            <div class="mb-5"></div>
        @endif
        <div class="edit_password">
            <form action="{{route('trainer.store')}}" method="post"
                  class="d-flex  flex-column align-items-center p-5 add_doctor">
                @csrf
                <h4 class="m-auto">Add <span style="color: #ed563b">trainer</span></h4>
                <div class="mb-4"></div>
                <input type="text" name="name" placeholder="  Enter Name" value="{{ old('name') }}"
                       class="form-control @error('name') is-invalid @enderror">
                @error('name')
                <span class="invalid-feedback text-center" role="alert" style="margin-top: -23px ;margin-bottom: 25px">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
                <input type="email" name="email" placeholder="  Enter Email" value="{{ old('email') }}"
                       class="form-control @error('email') is-invalid @enderror">
                @error('email')
                <span class="invalid-feedback text-center" role="alert" style="margin-top: -23px ;margin-bottom: 25px">
                <strong>{{ $message }}</strong>
            </span>
                @enderror

                <input type="password" name="password" placeholder="  Enter Password" value="{{ old('password') }}"
                       class="form-control @error('password') is-invalid @enderror">
                @error('password')
                <span class="invalid-feedback text-center" role="alert" style="margin-top: -23px ;margin-bottom: 25px">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
                <button class="main-btn">submit</button>

            </form>
        </div>

    </div>


@stop
