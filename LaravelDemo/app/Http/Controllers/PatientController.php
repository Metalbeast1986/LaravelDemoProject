<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patients; 

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patientlist = Patients::all();

        return view('Patients.index', compact('patientlist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Patients.create');
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
            'name'=>'required',         
            'dateofbirth'=>'required'
        ]);

        $patient = new Patients([
            'name' => $request->get('name'),
            'dateofbirth' => $request->get('dateofbirth')
        ]);
        $patient->save();
        return redirect('patient')->with('success', 'Patient saved!');
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
        $patient = Patients::find($id);
        return view('Patients.edit', compact('patient'));   
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
            'name'=>'required',
            'dateofbirth'=>'required'
        ]);

        $patient = Patients::find($id);
        $patient->name =  $request->get('name');
        $patient->dateofbirth = $request->get('dateofbirth');
        $patient->save();

        return redirect('patient')->with('success', 'Patient updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patient = Patients::find($id);
        $patient->delete();

        return redirect('patient')->with('success', 'Patient deleted!');
    }
}
