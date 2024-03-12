@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {{-- Display existing teachers with their ID, name, address, mobile number, and actions --}}
                <h2>Batches List</h2>

                {{-- Button connected to create.blade.php --}}
                <a href="{{ route('batches.create') }}" class="btn btn-primary mb-3">Add New Batch</a>

                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Batch Name</th>
                            <th>Course Name</th>
                            <th>Start Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Loop through your teachers data and display each row --}}
                        @foreach ($batches as $batch)
                            <tr>
                                <td>{{ $batch->id }}</td>
                                <td>{{ $batch->name }}</td>
                                <td>{{ $batch->course->name }}</td>
                                <td>{{ $batch->start_date }}</td>
                                <td>
                                    {{-- Add actions like edit and delete --}}
                                    <a href="{{ route('batches.show', $batch->id) }}" class="btn btn-sm btn-primary">View</a>
                                    <a href="{{ route('batches.edit', $batch->id) }}" class="btn btn-sm btn-warning">Edit</a>                                    
                                    <form action="{{ route('batches.destroy', $batch->id) }}" method="POST" style="display: inline;">
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
