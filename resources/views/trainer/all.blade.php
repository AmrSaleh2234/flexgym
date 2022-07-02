@extends('layouts.master',['allTrainers'=>''])
@section('content')
    <div class="container table-responsive">
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
                    <td class="">
                        <a class="btn btn-danger " style="  cursor: pointer; margin-right: 10px" href="{{route('trainee.delete',$item)}}"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>

                <?php $i++;?>
            @endforeach
            </tbody>
        </table>
    </div>

@stop
