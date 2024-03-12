@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Edit Enrollment</h2>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('enrollments.update', $enrollment->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Enrollment Number:</label>
                        <input type="text" name="enroll_no" class="form-control" value="{{ old('enroll_no', $enrollment->enroll_no) }}">
                    </div>

                    <div class="form-group">
                        <label for="address">Batch ID:</label>
                        <input type="text" name="batch_id" class="form-control" value="{{ old('batch_id', $enrollment->batch_id) }}">
                    </div>

                    <div class="form-group">
                        <label for="mobile">Student ID:</label>
                        <input type="text" name="student_id" class="form-control" value="{{ old('student_id', $enrollment->student_id) }}">
                    </div>

                    <div class="form-group">
                        <label for="mobile">Join Date:</label>
                        <input type="text" name="join_date" class="form-control" value="{{ old('join_date', $enrollment->join_date) }}">
                    </div>

                    <div class="form-group">
                        <label for="mobile">Fee:</label>
                        <input type="text" name="fee" class="form-control" value="{{ old('fee', $enrollment->fee) }}">
                    </div>

                    <button type="submit" class="btn btn-primary">Update Enrollment</button>
                </form>

                <a href="{{ route('enrollments.index', $enrollment->id) }}" class="btn btn-secondary">Cancel</a>
            </div>
        </div>
    </div>
@endsection
