@extends('base') 
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Update a doctor</h1>

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
        <form method="post" action="{{ route('doctor.update', $doctor->id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group">

                <label for="name">Full Name:</label>
                <input type="text" class="form-control" name="name" value={{ $doctor->name }} />
            </div>

            <div class="form-group">
                <label for="occupation">Occupation:</label>
                <input type="text" class="form-control" name="occupation" value={{ $doctor->occupation }} />
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection