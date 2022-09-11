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
    <div class="container mb-4 pl-5 pr-5 d-flex justify-start" style="direction: rtl">
        <form id="filter" action="{{route('trainee.filter')}}" method="post" class="col-lg-6 col-sm-9 d-flex flex-wrap justify-content-right" >
            @csrf
            <div class="form-check ">
                <label class="form-check-label text-color" for="flexCheckDefault" style=" font-weight: bold ;font-size: 25px;margin-left: 15px;cursor: pointer">
                    الأشخاص لم تدفع بعد
                </label>
                <input class="form-check-input border-red-500/50 cursor-pointer" type="checkbox" @if(\Illuminate\Support\Facades\Route::is('trainee.filter')) checked @endif id="flexCheckDefault" style="width: 30px;height: 30px" onclick="submitF()">

            </div>
        </form>
        <div class="col-lg-6  col-sm-3 d-flex flex-wrap justify-content-right align-items-center">
            <h4 class="text-color">Backup </h4>
            <a class="btn btn-primary " href="{{route('trainee.all.download')}}" style="margin-right: 30px;cursor:pointer;"><i class="fa-solid fa-download "></i></a>

        </div>
    </div>    <div class="container table-responsive">
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
                @if (auth()->user()->role == 0)
                    <th scope="col">المدرب</th>
                @endif
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
                    @if($item->payed !=0)
                        <td class="text-success ">{{$item->payed}}</td>
                    @else
                        <td>{{$item->payed}}</td>
                    @endif
                    @if($item->not_payed !=0)
                        <td class="text-danger ">{{$item->not_payed}}</td>
                    @else
                        <td>{{$item->not_payed}}</td>
                    @endif
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

                    @if (auth()->user()->role == 0)
                        @if($item->updater == "Amr Saleh")
                            <td style="color: #245f9f">unknown</td>
                        @else

                            <td style="color: #245f9f">{{$item->updater}}</td>
                        @endif
                    @endif

                    <td>
                        <a class="btn btn-primary " style="  cursor: pointer;margin-bottom: 10px" href="{{route('trainee.edit',$item)}}"><i class="fa-regular fa-pen-to-square"></i> </a>
                        @if(auth()->user()->role ==0)
                            <a class="btn btn-danger " style="  cursor: pointer; margin-right: 10px;margin-bottom: 10px" href="{{route('trainee.delete',$item)}}"><i class="fa-solid fa-trash"></i></a>
                        @endif
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
    <div class="container d-flex justify-content-center">
        {!! $data->links() !!}
    </div>
    <style>
        .w-5{
            display: none;
        }
    </style>

@stop
