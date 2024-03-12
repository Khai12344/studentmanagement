@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Edit Batch</h2>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('batches.update', $batch->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Batch Name:</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $batch->name) }}"> 
                       
                    </div>

                    <div class="form-group">
                        <label for="address">Course ID:</label>
                        <input type="text" name="course_id" class="form-control" value="{{ old('course_id', $batch->course_id) }}">
                    </div>

                    <div class="form-group">
                        <label for="mobile">Start Date:</label>
                        <input type="text" name="start_date" class="form-control" value="{{ old('start_date', $batch->start_date) }}">
                    </div>

                    <button type="submit" class="btn btn-primary">Update Batch</button>
                </form>

                <a href="{{ route('batches.index', $batch->id) }}" class="btn btn-secondary">Cancel</a>
            </div>
        </div>
    </div>
@endsection
