@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {{-- Display existing teachers with their ID, name, address, mobile number, and actions --}}
                <h2>Enrollment List</h2>

                {{-- Button connected to create.blade.php --}}
                <a href="{{ route('enrollments.create') }}" class="btn btn-primary mb-3">Add New Enrollment</a>

                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Enrollment Number</th>
                            <th>Batch Name</th>
                            <th>Student Name</th>
                            <th>Join Date</th>
                            <th>Fee</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Loop through your teachers data and display each row --}}
                        @foreach ($enrollments as $enrollment)
                            <tr>
                                <td>{{ $enrollment->id }}</td>
                                <td>{{ $enrollment->enroll_no }}</td>
                                <td>{{ $enrollment->batch->name }}</td>
                                <td>{{ $enrollment->student->name }}</td>
                                <td>{{ $enrollment->join_date }}</td>
                                <td>{{ $enrollment->fee }}</td>
                                <td>
                                    {{-- Add actions like edit and delete --}}
                                    <a href="{{ route('enrollments.show', $enrollment->id) }}" class="btn btn-sm btn-primary">View</a>
                                    <a href="{{ route('enrollments.edit', $enrollment->id) }}" class="btn btn-sm btn-warning">Edit</a>                                    
                                    <form action="{{ route('enrollments.destroy', $enrollment->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
