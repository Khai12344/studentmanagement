@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Batch Details</h2>

                <table class="table">
                    <tbody>
                        <tr>
                            <th>Batch Name:</th>
                            <td>{{ $batches->name }}</td>
                        </tr>
                        <tr>
                            <th>Course Name:</th>
                            <td>{{ $batches->course->name }}</td>
                        </tr>
                        <tr>
                            <th>Start Date:</th>
                            <td>{{ $batches->start_date }}</td>
                        </tr>
                    </tbody>
                </table>

                <a href="{{ route('batches.index') }}" class="btn btn-primary">Back to Batches</a>
            </div>
        </div>
    </div>
@endsection