@extends('base')

@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Create new doctor</h1>
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
      <form method="post" action="{{ route('doctor.store') }}">
          @csrf
          <div class="form-group">    
              <label for="name">Full name:</label>
              <input type="text" class="form-control" name="name"/>
          </div>

          <div class="form-group">
              <label for="occupation">Occupation:</label>
              <input type="text" class="form-control" name="occupation"/>
          </div>
                
          <button type="submit" class="btn btn-primary-outline">Add doctor</button>
      </form>
  </div>
</div>
</div>
@endsection