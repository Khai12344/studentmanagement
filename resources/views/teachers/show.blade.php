@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Teacher Details</h2>

                <table class="table">
                    <tbody>
                        <tr>
                            <th>Name:</th>
                            <td>{{ $teachers->name }}</td>
                        </tr>
                        <tr>
                            <th>Address:</th>
                            <td>{{ $teachers->address }}</td>
                        </tr>
                        <tr>
                            <th>Mobile Number:</th>
                            <td>{{ $teachers->mobile }}</td>
                        </tr>
                    </tbody>
                </table>

                <a href="{{ route('teachers.index') }}" class="btn btn-primary">Back to Teachers</a>
            </div>
        </div>
    </div>
@endsection