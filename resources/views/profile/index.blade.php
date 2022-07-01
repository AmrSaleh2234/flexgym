@extends('layouts.master',['profile'=>''])
@section('content')

    @if(isset($success))
        <div class="alert alert-success w-50 m-auto ">
            password updated successfuly
        </div>
        <div class="mb-5"></div>
    @endif

    @if(isset($fail))
        <div class="alert alert-danger w-50 m-auto">
            password is not correct
        </div>
        <div class="mb-5"></div>
    @endif

    <div class="container profile ">

        <div class="row">


            <div class="col-lg-8 col-sm-12 edit_password  m-auto">

                <form action="{{route('profile.editPassword',$user)}}" method="post"
                      class="d-flex flex-column justify-content-center align-items-center ">
                    @csrf
                    <h4 class="m-auto" style="font-size: 30px ; font-weight: bold;">Edit <span style=" color: #ed563b">password</span></h4>
                    <div class="mb-5"></div>
                    <input type="password" placeholder="  current password" name="old_password">
                    <input type="password" placeholder="  new password" name="new_password">
                    <button class="main-btn">
                        submit
                    </button>
                </form>
            </div>
        </div>
    </div>
@stop
