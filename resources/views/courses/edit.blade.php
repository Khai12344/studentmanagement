@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Edit Course</h2>

                <form action="{{ route('courses.update', $course->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" class="form-control" value="{{ $course->name }}">
                    </div>

                    <div class="form-group">
                        <label for="address">Syllabus:</label>
                        <input type="text" name="syllabus" class="form-control" value="{{ $course->syllabus }}">
                    </div>

                    <div class="form-group">
                        <label for="mobile">Duration:</label>
                        <input type="text" name="duration" class="form-control" value="{{ $course->duration }}">
                    </div>

                    <button type="submit" class="btn btn-primary">Update Course</button>
                </form>

                <a href="{{ route('courses.index', $course->id) }}" class="btn btn-secondary">Cancel</a>
            </div>
        </div>
    </div>
@endsection