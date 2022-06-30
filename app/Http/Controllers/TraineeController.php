<?php

namespace App\Http\Controllers;

use App\Models\Trainee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class TraineeController extends Controller
{
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
    public function store(Request $request)//admin store doctor
    {
        $id = 0;
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'payed' => 'required|integer|min:1|max:2000',
            'not_payed' => 'required|integer|min:1|max:2000',

        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $trainee = Trainee::orderBy('id','ASC')->get();
        $trainneCount = count($trainee);

        if ($trainneCount == 0) {
            $id=1;
        } elseif ($trainneCount == 1) {
         $id=2;
        }
        elseif ($trainee[0]['id']!=1)
        {
         $id=1;
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
        ]);

        return view('trainee.create')->with('msg', "trainee created successfully");
    }
    public function allTrainees()//show all doctors for admin
    {
        $data =Trainee::all();

        return view('trainee.all',compact('data'));
    }
    public function expiredTrainees()//show all doctors for admin
    {
        $data =Trainee::all();

        return view('trainee.expired',compact('data'));
    }
    public function destroy(Trainee $trainee)//delete doctor by admin
    {

        $trainee->delete();
        return redirect()->back();
    }
}
