<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Doctor; 

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $doctorlist = Doctor::all();

        return view('Doctors/doctor', compact('doctorlist'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Doctors/create');
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
            'occupation'=>'required'
        ]);

        $doctor = new Doctor([
            'name' => $request->get('name'),
            'occupation' => $request->get('occupation')
        ]);
        $doctor->save();
        return redirect('doctor')->with('success', 'Doctor saved!');
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
        $doctor = Doctor::find($id);
        return view('Doctors/edit', compact('doctor'));    
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
            'occupation'=>'required'
        ]);

        $doctor = Doctor::find($id);
        $doctor->name =  $request->get('name');
        $doctor->occupation = $request->get('occupation');
        $doctor->save();

        return redirect('doctor')->with('success', 'Contact updated!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doctor = Doctor::find($id);
        $doctor->delete();

        return redirect('doctor')->with('success', 'doctor deleted!');
    }
}
