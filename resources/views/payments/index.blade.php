@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {{-- Display existing teachers with their ID, name, address, mobile number, and actions --}}
                <h2>Payment List</h2>

                {{-- Button connected to create.blade.php --}}
                <a href="{{ route('payments.create') }}" class="btn btn-primary mb-3">Add New Payment</a>

                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Enrollment Number</th>
                            <th>Paid Date</th>
                            <th>Amount</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Loop through your payments data and display each row --}}
                        @foreach ($payments as $payment)
                            <tr>
                                <td>{{ $payment->id }}</td>
                                <td>{{ $payment->enrollment->enroll_no }}</td>
                                <td>{{ $payment->paid_date }}</td>
                                <td>{{ $payment->amount }}</td>
                                <td>
                                    {{-- Add actions like edit and delete --}}
                                    <a href="{{ route('payments.show', $payment->id) }}" class="btn btn-sm btn-primary">View</a>
                                    <a href="{{ route('payments.edit', $payment->id) }}" class="btn btn-sm btn-warning">Edit</a>                                    
                                    <form action="{{ route('payments.destroy', $payment->id) }}" method="POST" style="display: inline;">
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
