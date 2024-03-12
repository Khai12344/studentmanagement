@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Student Details</h2>

                <table class="table">
                    <tbody>
                        <tr>
                            <th>Name:</th>
                            <td>{{ $students->name }}</td>
                        </tr>
                        <tr>
                            <th>Address:</th>
                            <td>{{ $students->address }}</td>
                        </tr>
                        <tr>
                            <th>Mobile Number:</th>
                            <td>{{ $students->mobile }}</td>
                        </tr>
                    </tbody>
                </table>

                <a href="{{ route('students.index') }}" class="btn btn-primary">Back to Students</a>
            </div>
        </div>
    </div>
@endsection