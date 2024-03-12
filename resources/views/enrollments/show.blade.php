@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Enrollment Details</h2>

                <table class="table">
                    <tbody>
                        <tr>
                            <th>Enrollment Number:</th>
                            <td>{{ $enrollments->enroll_no }}</td>
                        </tr>
                        <tr>
                            <th>Batch ID:</th>
                            <td>{{ $enrollments->batch_id }}</td>
                        </tr>
                        <tr>
                            <th>Student ID:</th>
                            <td>{{ $enrollments->student_id }}</td>
                        </tr>
                        <tr>
                            <th>Join Date:</th>
                            <td>{{ $enrollments->join_date }}</td>
                        </tr>
                        <tr>
                            <th>Fee :</th>
                            <td>{{ $enrollments->fee }}</td>
                        </tr>
                    </tbody>
                </table>

                <a href="{{ route('enrollments.index') }}" class="btn btn-primary">Back to Enrollment</a>
            </div>
        </div>
    </div>
@endsection