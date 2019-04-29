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
    <a style="margin: 19px;" href="{{ route('visit.create')}}" class="btn btn-primary">Create new visit</a>
</div>  
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Visits</h1>    
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Visit date</td>
          <td>Patient id</td>
          <td>Patient full name</td>
          <td>Doctor id</td>
          <td>Doctor full name</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($visitslist as $visit)
        <tr>
            <td>{{$visit->id}}</td>
            <td>{{$visit->visit_date}}</td>
            <td>{{$visit->patient_id}}</td>
            <td>{{$visit->patient_fullname}}</td>
            <td>{{$visit->doctor_id}}</td>
            <td>{{$visit->doctor_fullname}}</td>
            <td>
                <a href="{{ route('visit.edit',$visit->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('visit.destroy', $visit->id)}}" method="post">
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