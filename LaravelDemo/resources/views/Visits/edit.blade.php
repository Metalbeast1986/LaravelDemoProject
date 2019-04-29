@extends('base') 
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Update a visit</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif
        <form method="post" action="{{ route('visit.update', $visit->id) }}">
            @method('PATCH') 
            @csrf
           <div class="form-group">    
              <label for="visit_date">Visit date:</label>
              <input type="text" class="form-control" name="visit_date" value="{{ $visit->visit_date }}"/>
          </div>

            <div class="form-group">
              <label for="patient_id">Patient:</label>
              <select class="form-control" name="patient_id">
                <option value="{{$visit->patient_id}}">{{$visit->patient_fullname}}</option>
                <option value=""><i>...please select a patient...</i></option>
               @foreach($patientlist as $patient)
                <option value="{{$patient->id}}">{{$patient->name}} {{$patient->dateofbirth}}</option>
               @endforeach
              </select>
          </div>

            <div class="form-group">
              <label for="doctor_id">Doctor:</label>
              <select class="form-control" name="doctor_id">
                <option value="{{$visit->doctor_id}}">{{$visit->doctor_fullname}}</option>
                <option value=""><i>...please select a doctor...</i></option>
               @foreach($doctorlist as $doctor)
                <option value="{{$doctor->id}}">{{$doctor->name}} {{$doctor->occupation}}</option>
               @endforeach
              </select>
          </div>      
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection