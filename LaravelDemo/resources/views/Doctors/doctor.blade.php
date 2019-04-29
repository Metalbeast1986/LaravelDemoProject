@extends('base')

@section('main')
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Doctors</h1> 
    <div class="col-sm-12">

  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
</div>
 <div>
    <a style="margin: 19px;" href="{{ route('doctor.create')}}" class="btn btn-primary">New doctor</a>
    </div>    
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Full Name</td>
          <td>Occupation</td>       
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($doctorlist as $doctor)
        <tr>
            <td>{{$doctor->id}}</td>
            <td>{{$doctor->name}}</td>
            <td>{{$doctor->occupation}}</td>
           
            <td>
                <a href="{{ route('doctor.edit',$doctor->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('doctor.destroy', $doctor->id)}}" method="post">
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