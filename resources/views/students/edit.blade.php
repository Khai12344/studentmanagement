@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Edit Student</h2>

                <form action="{{ route('students.update', $student->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" class="form-control" value="{{ $student->name }}">
                    </div>

                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" name="address" class="form-control" value="{{ $student->address }}">
                    </div>

                    <div class="form-group">
                        <label for="mobile">Mobile Number:</label>
                        <input type="text" name="mobile" class="form-control" value="{{ $student->mobile }}">
                    </div>

                    <button type="submit" class="btn btn-primary">Update Student</button>
                </form>

                <a href="{{ route('students.index', $student->id) }}" class="btn btn-secondary">Cancel</a>
            </div>
        </div>
    </div>
@endsection