<?php

namespace App\Http\Controllers\profile;

use App\Http\Controllers\Controller;

use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use function abort;
use function auth;
use function view;

class ProfileController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile()
   {
       $user=auth()->user();
       return view ('profile.index',compact('user'));
   }

   public function  editPassword(Request $request,user $user)
   {
       if(auth()->user()->id==$user->id)
       {
            if(password_verify($request->old_password, $user->password))
            {

                $user->password=Hash::make($request->new_password);
                $user->update();

                return  view('profile.index',compact('user'))->with(['success'=>'success ']);
            }
            else
            {

                return  view('profile.index',compact('user'))->with(['fail'=>'password is un correct']);
            }

//
      }
       else{
           return abort('404');
       }

   }
}
