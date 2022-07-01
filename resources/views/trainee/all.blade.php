@extends('layouts.master',['allTrainees'=>''])
@section('content')
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
