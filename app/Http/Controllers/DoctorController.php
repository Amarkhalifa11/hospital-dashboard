<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function __construct(){
        
        $this->middleware('auth');
    }

    public function index()
    {
        $doctors = Doctor::latest()->paginate(3);
        return view('admin.doctors.alldoctors',compact('doctors'));
    }

    public function create()
    {
        return view('admin.doctors.adddoctor');
    }

    public function store(Request $request)
    {
        // 1 validation
        $validatedData = $request->validate([
            'doctor_name' =>'required|unique:doctors|max:100',
            'age'         =>'required|max:100',
            'mobile'      =>'required|unique:doctors|max:100',
            'image'       =>'required|image',
        ]
        ,
        [
            'doctor_name.required'        => 'type the name',
            'doctor_name.unique'          => 'repeat',
            'doctor_name.max'             => 'too much',
            'mobile.required'             => 'type the name',
            'mobile.unique'               => 'repeat',
            'mobile.max'                  => 'too much',
            'age.required'                => 'type the name',
            'age.max'                     => 'too much',              
            'image.required'              => 'select image    ',
        ]);

        //2 uploade image
        $doctor_image = $request->file('image'); 

        $name_gen = hexdec(uniqid()); 
        $img_ext = strtolower($doctor_image->getClientOriginalExtension()); 
        $img_name = $name_gen . '.' . $img_ext; 
         
        $upload_location = 'images/doctors/'; 
        $image = $upload_location.$img_name; 
        $doctor_image->move($upload_location,$img_name); 

        //3
        $doctor = new Doctor();
        $doctor->doctor_name        = $request->doctor_name; 
        $doctor->age                = $request->age;
        $doctor->mobile             = $request->mobile;
        $doctor->image              = $image;
        $doctor->save();

        //4
        return redirect()->route('doctors')->with('message','the doctor is added');

    }

    public function show(Doctor $doctor)
    {
        //
    }

    public function edit($id)
    {
        $doctors = Doctor::find($id);
        return view('admin.doctors.edit',compact('doctors'));
    }

    public function update(Request $request, $id)
    {

                //2 uploade image
                $doctor_image = $request->file('image'); 

                $name_gen = hexdec(uniqid()); 
                $img_ext = strtolower($doctor_image->getClientOriginalExtension()); 
                $img_name = $name_gen . '.' . $img_ext; 
                 
                $upload_location = 'images/doctors/'; 
                $image = $upload_location.$img_name; 
                $doctor_image->move($upload_location,$img_name); 

        $doctors = Doctor::find($id);
        $doctors->update([
            'doctor_name' => $request->doctor_name , 
            'age'         => $request->age , 
            'mobile'      => $request->mobile , 
            'image'       => $image, 
        ]);

        return redirect()->route('doctors')->with('message','the doctor is updated');

    }

    public function SoftDelete($id)
    {
        $doctors = Doctor::find($id);
        $doctors->delete();

        return redirect()->route('doctors')->with('message','the doctor is deleted');        
    }

    public function thedeleted()
    {
        $trashed = Doctor::onlyTrashed()->paginate(3);
        return view('admin.doctors.trashed',compact('trashed'));
    }

    public function restore($id)
    {
        $doctors = Doctor::withTrashed()->find($id);
        $doctors->restore();
        return redirect()->route('doctors')->with('message','the doctor is restore');
    }

    public function hardelete($id)
    {
        $doctors = Doctor::withTrashed()->find($id);
        $doctors->forceDelete();

        return redirect()->route('doctors')->with('message','the doctor is deleted');

        
    }
}
