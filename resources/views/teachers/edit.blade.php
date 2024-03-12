@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Edit Teacher</h2>

                <form action="{{ route('teachers.update', $teacher->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" class="form-control" value="{{ $teacher->name }}">
                    </div>

                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" name="address" class="form-control" value="{{ $teacher->address }}">
                    </div>

                    <div class="form-group">
                        <label for="mobile">Mobile Number:</label>
                        <input type="text" name="mobile" class="form-control" value="{{ $teacher->mobile }}">
                    </div>

                    <button type="submit" class="btn btn-primary">Update Teacher</button>
                </form>

                <a href="{{ route('teachers.index', $teacher->id) }}" class="btn btn-secondary">Cancel</a>
            </div>
        </div>
    </div>
@endsection