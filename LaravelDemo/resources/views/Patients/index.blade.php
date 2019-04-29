@extends('base')

@section('main')
<div class="col-sm-12">

  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
</div>
<div>
    <a style="margin: 19px;" href="{{ route('patient.create')}}" class="btn btn-primary">New patient</a>
</div> 
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Patients</h1>    
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Full name</td>
          <td>Date of birth</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($patientlist as $patient)
        <tr>
            <td>{{$patient->id}}</td>
            <td>{{$patient->name}}</td>
            <td>{{$patient->dateofbirth}}</td>
           
            <td>
                <a href="{{ route('patient.edit',$patient->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('patient.destroy', $patient->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
@endsection