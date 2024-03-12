@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {{-- Display existing students with their ID, name, address, mobile number, and actions --}}
                <h2>Students Application</h2>

                {{-- Button connected to create.blade.php --}}
                <a href="{{ route('students.create') }}" class="btn btn-primary mb-3">Add New Student</a>

                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Mobile Number</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Loop through your students data and display each row --}}
                        @foreach ($students as $student)
                            <tr>
                                <td>{{ $student->id }}</td>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->address }}</td>
                                <td>{{ $student->mobile }}</td>
                                <td>
                                    {{-- Add actions like edit and delete --}}
                                    <a href="{{ route('students.show', $student->id) }}" class="btn btn-sm btn-primary">View</a>
                                    <a href="{{ route('students.edit', $student->id) }}" class="btn btn-sm btn-warning">Edit</a>                                    
                                    <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display: inline;">
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
