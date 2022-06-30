@extends('layouts.master')
@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Operation</th>


        </tr>
        </thead>
        <?php $i=1?>
        <tbody>
        @foreach($data as $item)


            <tr>
                <th scope="row">{{$i}}</th>
                <td>{{$item->name}}</td>
                <td>{{$item->email}}</td>
                <td><a class="btn btn-danger " style="color: #FFFFFF;  cursor: pointer" href="{{route('trainer.delete',$item)}}">delete </a> </td>

            </tr>




            <?php $i++;?>
        @endforeach
        </tbody>
    </table>
@stop
