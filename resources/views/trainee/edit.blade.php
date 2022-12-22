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
                <h4 class="m-auto" style="font-size: 30px ; font-weight: bold">Edit <span
                        style="color: #ed563b">trainee</span></h4>
                <div class="mb-4"></div>
                <input type="text" name="name" placeholder="  Enter Name" value="{{ $trainee->name }}"
                       class="form-control @error('name') is-invalid @enderror">
                @error('name')
                <span class="invalid-feedback text-center" role="alert" style="margin-top: -23px ;margin-bottom: 25px">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
                <label class="align-self-start ml-5" style="font-size:18px ; font-weight: 500">Enter <span
                        style="color: #ed563b">start date</span> </label>
                <input type="date" name="start_date" placeholder="dd-mm-yyyy" value="{{ $trainee->start_date }}"
                       class="form-control @error('start_date') is-invalid @enderror" min="1997-01-01">
                @error('start_date')
                <span class="invalid-feedback text-center" role="alert" style="margin-top: -23px ;margin-bottom: 25px">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
                <label class="align-self-start ml-5" style="font-size:18px ; font-weight: 500">Enter <span
                        style="color: #ed563b">end date</span> </label>
                <input type="date" name="end_date" placeholder="dd-mm-yyyy" value="{{ $trainee->end_date }}"
                       class="form-control @error('end_date') is-invalid @enderror" min="1997-01-01">
                @error('end_date')
                <span class="invalid-feedback text-center" role="alert" style="margin-top: -23px ;margin-bottom: 25px">
                <strong>{{ $message }}</strong>
            </span>
                @enderror

                @if ($trainee->end_date <= \Illuminate\Support\Carbon::now())
                    <label class="align-self-start ml-5" style="font-size:18px ; font-weight: 500">Enter <span
                            style="color: #ed563b">Payed</span> </label>
                    <input type="number" name="payed" placeholder="  Enter payed money " value="{{ $trainee->payed }}"
                           class="form-control @error('payed') is-invalid @enderror">
                    @error('payed')
                    <span class="invalid-feedback text-center" role="alert"
                          style="margin-top: -23px ;margin-bottom: 25px">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                @else
                    <label class="align-self-start ml-5" style="font-size:18px ; font-weight: 500; display: none">Enter <span
                            style="color: #ed563b ; display: none">Payed</span> </label>
                    <input type="number"  name="payed" placeholder="  Enter payed money " value="{{ $trainee->payed }}"
                           class="form-control @error('payed') is-invalid @enderror" style="display: none">

                @endif
                <label class="align-self-start ml-5" style="font-size:18px ; font-weight: 500">Enter <span
                        style="color: #ed563b">Not Payed</span> </label>
                <input type="number" name="not_payed" placeholder="  Enter not payed money "
                       value="{{ $trainee->not_payed }}"
                       class="form-control @error('not_payed') is-invalid @enderror">
                @error('not_payed')
                <span class="invalid-feedback text-center" role="alert"
                      style="margin-top: -23px ;margin-bottom: 25px">
                <strong>{{ $message }}</strong>
            </span>
                @enderror

                <select class="form-select" aria-label="Default select example" name="program"
                        style="width: 90%;margin-bottom: 30px; padding: 7px 14px;">
                    <option value="0" @if($trainee->program ==0)selected @endif>جيم</option>
                    <option value="1" @if($trainee->program ==1)selected @endif>تخسيس</option>
                    <option value="2" @if($trainee->program ==2)selected @endif>جيم و تخسيس</option>
                    <option value="3" @if($trainee->program ==3)selected @endif>سيدات</option>
                </select>

                <button type="submit" class="main-btn">submit</button>

            </form>
        </div>

    </div>

@stop
