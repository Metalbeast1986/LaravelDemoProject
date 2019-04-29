<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Visits; 
use App\Patients; 
use App\Doctor; 

class VisitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visitslist = Visits::all();
        return view('Visits.index', compact('visitslist'));   

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $patientlist = Patients::all();
        $doctorlist = Doctor::all();
        return view('Visits.create', compact('patientlist'), compact('doctorlist'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request->validate([
            'visit_date'=>'required',
            'patient_id'=>'required',
            'doctor_id'=>'required'

        ]);

        $patient_id = $_POST['patient_id'];
        $patients = Patients::select('name')->where('id',$patient_id)->first();

        $doctor_id = $_POST['doctor_id'];
        $doctors = Doctor::select('name')->where('id',$doctor_id)->first();

        $visit = new Visits([
            'visit_date' => $request->get('visit_date'),
            'patient_id' => $request->get('patient_id'),
            'patient_fullname' =>$patients->name,
            'doctor_id' => $request->get('doctor_id'),
            'doctor_fullname' => $doctors->name
        ]);


        $visit->save();
        return redirect('visit')->with('success', 'Visit saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $visit = Visits::find($id);
        $patientlist = Patients::all();
        $doctorlist = Doctor::all();

        return view('Visits.edit', compact('visit','doctorlist','patientlist'));   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
          $request->validate([
            'visit_date'=>'required',
            'patient_id'=>'required',
            'doctor_id'=>'required'
        ]);

        $patient_id = $_POST['patient_id'];
        $patients = Patients::select('name')->where('id',$patient_id)->first();

        $doctor_id = $_POST['doctor_id'];
        $doctors = Doctor::select('name')->where('id',$doctor_id)->first();

        $visit = Visits::find($id);
        $visit->visit_date =  $request->get('visit_date');
        $visit->patient_id = $request->get('patient_id');
        $visit->patient_fullname = $patients->name;
        $visit->doctor_id = $request->get('doctor_id');
        $visit->doctor_fullname = $doctors->name;
        $visit->save();

        return redirect('visit')->with('success', 'Visit updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $visit = Visits::find($id);
        $visit->delete();

        return redirect('visit')->with('success', 'Visit deleted!');
    }
}
