<?php

namespace App\Http\Controllers;

use App\Models\revenue;
use App\Models\subscription;
use App\Models\Trainee;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Meneses\LaravelMpdf\Facades\LaravelMpdf;

class TraineeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('searchForMembers');
    }
    public function create()//admin add doctor
    {

        return view('trainee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)//admin or trainer store trainee
    {
        $id = 0;
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:trainees',
            'start_date' => 'required',
            'end_date' => 'required',
            'payed' => 'required|integer|min:0|max:2000',
            'not_payed' => 'required|integer|min:0|max:2000',

        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $trainee = Trainee::orderBy('id','ASC')->get();
        $trainneCount = count($trainee);
        if ($request->program == 3)
        {
            if ($trainneCount == 0)
            {
                $id =4000;
            }
            elseif($trainee[$trainneCount-1]['id']<4000)
            {
                $id =4000;

            }
        }else{
            if ($trainneCount == 0) {
                $id=1;
            }
            elseif ($trainee[0]['id']!=1)
            {
                $id=1;
            }
            elseif ($trainneCount == 1) {
                $id=2;
            }

            else {

                for ($i = 0; $i < $trainneCount - 1; $i++) {

                    if($trainee[$i+1]['id']-$trainee[$i]['id'] !=1)
                    {
                        $id=$trainee[$i]['id']+1;
                        break;
                    }
                }
            }

        }
        if ($id==0)
        {
            $id = $trainee[$trainneCount-1]['id']+1;
        }
        Trainee::create([
            'id' => $id,
            'name' => $request->name,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'payed' => $request->payed,
            'not_payed' => $request->not_payed,
            'program' => $request->program,
            'updater' => auth()->user()->name ,
        ]);
        subscription::create(['trainee_id'=>$id,'trainer_id'=>auth()->user()->id,
            'start_date'=>$request->start_date,
            'end_date'=>$request->end_date,
            'program'=>$request->program,
        ]);
        revenue::create(['trainee_id'=>$id ,'trainer_id'=>auth()->user()->id , 'amount'=>$request->payed]);


       return redirect()->back()->with('msg', 'trainee created successfully with <span class="text-danger" style="font-size: 20px;font-weight: 600"> id = '.$id.'</span>');

    }
    public function allTrainees()//show all doctors for admin
    {
        $data = Trainee::where('end_date','>=',Carbon::today('EET'))->orderBy('id','ASC')->paginate(50);

        return view('trainee.all',compact('data'));
    }
    public function allTraineesPDF()//show all doctors for admin
    {
        $data = Trainee::where('end_date','>=',Carbon::today('EET'))->orderBy('id','ASC')->get();

        $pdf = LaravelMpdf::loadView('trainee.all-download', compact('data'));
        return $pdf->stream('trainee.pdf');
    }
    public function expiredTraineesPDF()//show all doctors for admin
    {
        $data = Trainee::where('end_date','<',Carbon::today('EET'))->orderBy('id','ASC')->get();

        $pdf = LaravelMpdf::loadView('trainee.expired-download', compact('data'));
        return $pdf->stream('trainee-expired.pdf');
    }

    public function allTraineesFilter()//show all doctors for admin
    {
        $data = Trainee::where('end_date','>=',Carbon::today('EET'))->where('not_payed','>','0')->orderBy('id','ASC')->cursorPaginate(50);

        return view('trainee.all',compact('data'));
    }
    public function allTraineesFilterExpired()//show all doctors for admin
    {
        $data = Trainee::where('end_date','<',Carbon::today('EET'))->where('not_payed','>','0')->orderBy('id','ASC')->cursorPaginate(50);

        return view('trainee.expired',compact('data'));
    }
    public function expiredTrainees()//show all doctors for admin
    {
        $data =Trainee::where('end_date','<',Carbon::today('EET'))->orderBy('id','ASC')->paginate(50);

        return view('trainee.expired',compact('data'));
    }

    public function edit(Trainee $trainee)
    {
        return view('trainee.edit',compact('trainee'));
    }
    public function update( Request $request , Trainee $trainee)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'payed' => 'required|integer|min:0|max:2000',
            'not_payed' => 'required|integer|min:0|max:2000',


        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        if($trainee->end_date < Carbon::today('EET') && $request->end_date > Carbon::today('EET'))
        {
            revenue::create(['trainee_id'=>$trainee->id ,'trainer_id'=>auth()->user()->id , 'amount'=>$request->payed]);
            subscription::create(['trainee_id'=>$trainee->id,'trainer_id'=>auth()->user()->id,
                'start_date'=>$request->start_date,
                'end_date'=>$request->end_date,
                'program'=>$request->program,
            ]);
        }
        if($request->payed > $trainee->payed && $request->end_date == $trainee->end_date && $request->start_date == $trainee->start_date ) // date not change subscrtiption
        {
            revenue::create(['trainee_id'=>$trainee->id ,'trainer_id'=>auth()->user()->id , 'amount'=>$request->payed-$trainee->payed]);
        }

        $trainee->update([
            'name' => $request->name,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'payed' => $request->payed,
            'not_payed' => $request->not_payed,
            'program' => $request->program,
            'updater' => auth()->user()->name ,
        ]);
        return redirect()->back()->with('msg','updated successfully ');
    }

    public function search()
    {
        $search = $_GET['search'];
        $data = Trainee::where(function ($query)use($search)
        {
            $query->where('name', 'LIKE', '%' . $search . '%')->orWhere('id','LIKE',  $search );
        })->paginate(1000);
        return view('trainee.all', compact('data'));
    }
    public function searchForMembers()
    {
        $search = $_GET['search'];
        $data = Trainee::where(function ($query)use($search)
        {
            $query->where('name', 'LIKE', '%' . $search . '%')->orWhere('id','LIKE',$search);
        })->get();
        return view('trainee.search', compact('data'));
    }
    public function searchInExpired()
    {
        $search = $_GET['search'];
        $data = Trainee::where(function ($query)use($search)
        {
            $query->where('name', 'LIKE', '%' . $search . '%')->orWhere('id','LIKE',   $search );
        })->paginate(1000);
        return view('trainee.expired', compact('data'));
    }
    public function destroy(Trainee $trainee)//delete doctor by admin
    {
        foreach ($trainee->subscription as $item)
        {
            $item->update(['deleted'=>'1']);
        }
        foreach ($trainee->payements as $item)
        {
            $item->update(['deleted'=>'1']);
        }
        $trainee->delete();

        return redirect()->back();
    }

    public function pay(Request $request)
    {
        $trainee= Trainee::find($request->id);
        if($trainee->not_payed < $request->payed)
        {
            return redirect()->back()->with('error','المبلغ المدفوع اكبر من المستحق');

        }
        revenue::create(['trainee_id'=>$request->id,'trainer_id'=>auth()->user()->id,'amount'=>$request->payed]);
        $trainee->update(['payed'=>$trainee->payed+$request->payed, 'not_payed'=>$trainee->not_payed-$request->payed]);
        return redirect()->back()->with('msg','تم تحصيل النقديه بنجاح');
    }

    public function info(Trainee $trainee)
    {
       $data=$trainee->subscription()->orderBy('id','desc')->get();
       return view('trainee.info',compact('data'));
    }
}
