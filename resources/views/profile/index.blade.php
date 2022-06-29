@extends('layouts.master')
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
                      class="d-flex flex-column justify-content-center ">
                    @csrf
                    <h3>Edit password</h3>
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
