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
        <table class="table" style="direction: rtl">
            <thead>
            <tr>
                <th scope="col">الرقم</th>
                <th scope="col">الاسم</th>
                <th scope="col">بدايه الاشتراك</th>
                <th scope="col">نهاية الاشتراك</th>
                <th scope="col">المدفوع</th>
                <th scope="col">لم يدفع بعد</th>
                <th scope="col">النظام</th>
                <th scope="col">العمليات</th>
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
                        @if($item->program==0)
                            جيم
                        @elseif($item->program==1)
                            تخسيس
                        @elseif($item->program==2)
                            جيم و تخسيس
                        @else
                            سيدات
                        @endif()
                    </td>
                    <td>
                        <a class="btn btn-primary " style="  cursor: pointer" href="{{route('trainee.edit',$item)}}"><i class="fa-regular fa-pen-to-square"></i> </a>
                        @if(auth()->user()->role ==0)
                            <a class="btn btn-danger " style="  cursor: pointer; margin-right: 10px" href="{{route('trainee.delete',$item)}}"><i class="fa-solid fa-trash"></i></a>
                        @endif
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
    <div class="container d-flex justify-content-center">
        {{ $data->links() }}
    </div>

@stop
