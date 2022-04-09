<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Appointment;

class HomeController extends Controller
{
    //
    public function redirect(){
        if(Auth::id())
        {
            
            if(Auth::user()->usertype=='1')
            {
                return view('admin.home');
            }

            else{
                return view('dashboard');
            }
        }

        else
        {
            return redirect()->back();
        }
    }

    public function index()
    {
        return view('user.home');
    }

   public function appointment(Request $request)
   {
       $data = new appointment;

       $data->name=$request->name;
       $data->email=$request->email;
       $data->date=$request->date;
       $data->phone=$request->phone;
       $data->message=$request->message;
       $data->doctor=$request->doctor;
    //    $data->status='Scheduled';

    //    if(Auth::id())
    //    {
    //        $data->user_id=Auth::user()->id;
    //    }

       $data->save();

       return redirect()->back()->with('message','Appointment Scheduled !!');
   }

   

   
}
