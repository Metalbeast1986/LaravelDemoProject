@extends('base')

@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Add a patient</h1>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('patient.store') }}">
          @csrf
          <div class="form-group">    
              <label for="name">Full name:</label>
              <input type="text" class="form-control" name="name"/>
          </div>

          <div class="form-group">
              <label for="dateofbirth">Date of birth:</label>
              <input type="text" class="form-control" name="dateofbirth"/>
          </div>
             
          <button type="submit" class="btn btn-primary-outline">Add patient</button>
      </form>
  </div>
</div>
</div>
@endsection