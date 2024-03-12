@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {{-- Display existing teachers with their ID, name, address, mobile number, and actions --}}
                <h2>Teachers List</h2>

                {{-- Button connected to create.blade.php --}}
                <a href="{{ route('teachers.create') }}" class="btn btn-primary mb-3">Add New Teacher</a>

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
                        {{-- Loop through your teachers data and display each row --}}
                        @foreach ($teachers as $teacher)
                            <tr>
                                <td>{{ $teacher->id }}</td>
                                <td>{{ $teacher->name }}</td>
                                <td>{{ $teacher->address }}</td>
                                <td>{{ $teacher->mobile }}</td>
                                <td>
                                    {{-- Add actions like edit and delete --}}
                                    <a href="{{ route('teachers.show', $teacher->id) }}" class="btn btn-sm btn-primary">View</a>
                                    <a href="{{ route('teachers.edit', $teacher->id) }}" class="btn btn-sm btn-warning">Edit</a>                                    
                                    <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST" style="display: inline;">
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
