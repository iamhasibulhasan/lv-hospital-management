<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
//    Dashboard view method
    public function redirect(){
        $all_data = Doctor::all();
        if(Auth::id()){
//            Check usertype
            if (Auth::user()->usertype == 0){
                return view('user.home', [
                    'all_data' =>   $all_data
                ]);
            }else{
                return view('admin.home', [
                    'all_data' =>   $all_data
                ]);
            }
        }
    }

//    Frontend home view

    public function index(){
        $all_data = Doctor::all();
        return view('user.home', [
            'all_data' =>   $all_data
        ]);
    }
//    Doctor Appointment create
    public function appointmentStore(Request $request){
        $doctor_data = Doctor::find($request->doctor);
        $user_id="";
        if(Auth::user()){
            $user_id = Auth::user()->id;
        }else{
            $user_id=NULL;
        }
        Appointment::create([
            'name'          =>  $request->uname,
            'email'         =>  $request->uemail,
            'date'          =>  $request->udate,
            'doctor_id'     =>  $request->doctor,
            'doctor_name'   =>  $doctor_data->name,
            'phone'         =>  $request->uphone,
            'message'       =>  $request->umessage,
            'user_id'       =>  $user_id,
        ]);
        return back();
    }

//    My appointment page show
    public function myAppointment(){
        if (request()->ajax()){
            return datatables()->of(Appointment::where('status', '=', 'In progress...')->orWhere('status', '=', 'Accepted')->orWhere('status', '=', 'Rejected')->get())->addColumn('action', function ($data){
                $output = ' <a title="Delete"  class="btn btn-danger btn-sm app-del" del-app-id="'.$data['id'].'" href="#"><i class="fa fa-trash-o" aria-hidden="true"></i></a>';
                return $output;
            })->rawColumns(['action', 'status'])->make(true);
        }
        return view('user.my-appointment');
    }

//    Appointment Destroy

    public function appointmentDestroy($id){
        $delete_data = Appointment::find($id);
        $delete_data->delete();
        return back();
    }


    //======================================
}
