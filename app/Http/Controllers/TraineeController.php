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

        $trainee = Trainee::all();
        Trainee::create([
            'name' => $request->name,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'payed' => $request->payed,
            'not_payed' => $request->not_payed,
        ]);

        return view('trainee.create')->with('msg', "trainee created successfully");
    }
}
