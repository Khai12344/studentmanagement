@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Payment Details</h2>

                <table class="table">
                    <tbody>
                        <tr>
                            <th>Enrollment ID:</th>
                            <td>{{ $payments->enroll_id }}</td>
                        </tr>
                        <tr>
                            <th>Paid Date:</th>
                            <td>{{ $payments->paid_date }}</td>
                        </tr>
                      
                        <tr>
                            <th>Amount:</th>
                            <td>{{ $payments->amount }}</td>
                        </tr>
                    </tbody>
                </table>

                <a href="{{ route('payments.index') }}" class="btn btn-primary">Back to Payments</a>
            </div>
        </div>
    </div>
@endsection