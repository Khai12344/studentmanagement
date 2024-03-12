@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Course Details</h2>

                <table class="table">
                    <tbody>
                        <tr>
                            <th>Name:</th>
                            <td>{{ $courses->name }}</td>
                        </tr>
                        <tr>
                            <th>Syllabus:</th>
                            <td>{{ $courses->syllabus }}</td>
                        </tr>
                        <tr>
                            <th>Duration:</th>
                            <td>{{ $courses->duration }}</td>
                        </tr>
                    </tbody>
                </table>

                <a href="{{ route('courses.index') }}" class="btn btn-primary">Back to Courses</a>
            </div>
        </div>
    </div>
@endsection