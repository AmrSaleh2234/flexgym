<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class TrainerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create()//admin add doctor
    {

        return view('trainer.create')->with(['user'=>auth()->user()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)//admin store doctor
    {
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|string|min:8|max:20',

        ]);
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'role'=>1

        ]);
        return  view('trainer.create')->with('msg',"trainer created successfully");
    }
}
