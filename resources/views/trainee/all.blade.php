@extends('layouts.master',['allTrainees'=>''])
@section('content')
    <div class="container mb-4 pl-5 pr-5">
        <form class="input-group rounded search_input  " id="formSearchTrainee"
              action="{{route('trainee.search')}}" type="get">

            <input type="search" class="form-control rounded" name="search" placeholder="Search" aria-label="Search"
                   aria-describedby="search-addon" id="search_course"/>
            <label class="input-group-text border-0" id="search-addon" for="search_course"
                   onclick="submitSearchTraineeForm()">
                <i class="fas fa-search"></i>
            </label>
        </form>
    </div>

    <div class="container table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Name</th>
                <th scope="col">start date</th>
                <th scope="col">expired date</th>
                <th scope="col">payed</th>
                <th scope="col">not payed</th>
                <th scope="col">operations</th>
            </tr>
            </thead>

            <tbody>
            @foreach($data as $item)


                <tr>
                    <th scope="row">{{$item->id}}</th>
                    <td>{{$item->name}}</td>
                    <td>{{$item->start_date}}</td>
                    <td>{{$item->end_date}}</td>
                    <td>{{$item->payed}}</td>
                    <td>{{$item->not_payed}}</td>
                    <td>
                       @if(auth()->user()->role ==0)
                            <a class="btn btn-danger " style="  cursor: pointer; margin-right: 10px" href="{{route('trainee.delete',$item)}}"><i class="fa-solid fa-trash"></i></a>
                        @endif
                        <a class="btn btn-primary " style="  cursor: pointer" href="{{route('trainee.edit',$item)}}"><i class="fa-regular fa-pen-to-square"></i> </a>
                    </td>

                </tr>


            @endforeach
            </tbody>
        </table>
    </div>

@stop
