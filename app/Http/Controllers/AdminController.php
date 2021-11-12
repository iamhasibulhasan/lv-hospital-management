<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;
use PhpParser\Comment\Doc;

class AdminController extends Controller
{
    //Show add doctor page
    public function addDoctors(){
        if (request()->ajax()){
            return datatables()->of(Doctor::latest()->get())->addColumn('action', function ($data){
                $output = '<a class="btn btn-warning btn-sm doctor-edit" edit-doctor-id="'.$data['id'].'" href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>';
                $output .= ' <a class="btn btn-danger btn-sm doctor-del" del-doctor-id="'.$data['id'].'" href="#"><i class="fa fa-trash-o" aria-hidden="true"></i></a>';
                return $output;
            })->rawColumns(['action'])->make(true);
        }
        return view('admin.add-doctor');
    }

//    Create doctor
    public function store(Request $request){

        $image = $this->imageUpload($request, 'photo', 'media/doctors/');


        Doctor::create([
            'name'          => $request->f_name." ".$request->l_name,
            'phone'         => $request->phone,
            'email'         => $request->email,
            'gender'        => $request->gender,
            'photo'         => $image,
            'speciality'    => $request->speciality,
            'room'          => $request->room,
            'address'       => $request->address,
        ]);

        return back();
    }
//    Destroy doctor data
    public function destroy($id)
    {

        $delete_data = Doctor::find($id);
//        echo $delete_data->photo;

            if (file_exists('media/doctors/'. $delete_data->photo)) {
                unlink('media/doctors/'. $delete_data->photo);
            }

        $delete_data -> delete();
        return back();
    }

//    Doctor Edit
    public function edit($id){
        $edit_data = Doctor::find($id);
        return [
            'id'      =>  $edit_data->id,
            'name'      =>  $edit_data->name,
            'room'      =>  $edit_data->room,
            'phone'      =>  $edit_data->phone,
            'email'      =>  $edit_data->email,
            'photo'      =>  $edit_data->photo,
        ];
    }
//    Update Doctor
    public function update(Request $request){
        $id = $request->edit_id;
        $edit_data = Doctor::find($id);

        $image = $edit_data->photo;
        if($request->hasFile('edit_photo')){
            $image = $this->imageUpload($request, 'edit_photo', 'media/doctors/');
        }



        $edit_data->name = $request->edit_name;
        $edit_data->room = $request->edit_room;
        $edit_data->phone = $request->edit_phone;
        $edit_data->email = $request->edit_email;
        $edit_data->photo = $image;
        $edit_data->update();
        return back();

    }

//    Doctor Appointments
    public function doctorAppointment(){
        if (request()->ajax()){
            return datatables()->of(Appointment::where('status', '=', 'In progress...')->orWhere('status', '=', 'Accepted')->latest()->get())->addColumn('action', function ($data){
                $output = '<a class="btn btn-success app-accept" acc-patient-id="'.$data['id'].'" href="#"><i class="far fa-check-square"></i></a>';
                $output .= ' <a class="btn btn-danger app-reject" rej-patient-id="'.$data['id'].'" href="#"><i class="fas fa-user-times"></i></a>';
                return $output;
            })->rawColumns(['action'])->make(true);
        }
        return view('admin.doctor-appointment');
    }

//    Appointment accept
public function appointmentAccept($id){
        $data = Appointment::find($id);

        $data->status = 'Accepted';
        $data->update();
}
//    Appointment rejected
public function appointmentReject($id){
        $data = Appointment::find($id);

        $data->status = 'Rejected';
        $data->update();
}

    //============================================
}
