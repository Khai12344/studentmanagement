@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Edit Payment</h2>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('payments.update', $payment->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Enrollment ID:</label>
                        <input type="text" name="enroll_id" class="form-control" value="{{ old('enroll_id', $payment->enroll_id) }}"> 
                       
                    </div>

                    <div class="form-group">
                        <label for="address">Paid Date:</label>
                        <input type="text" name="paid_date" class="form-control" value="{{ old('paid_date', $payment->paid_date) }}">
                    </div>

                    <div class="form-group">
                        <label for="mobile">Amount:</label>
                        <input type="text" name="amount" class="form-control" value="{{ old('amount', $payment->amount) }}">
                    </div>

                    <button type="submit" class="btn btn-primary">Update Payment</button>
                </form>

                <a href="{{ route('payments.index', $payment->id) }}" class="btn btn-secondary">Cancel</a>
            </div>
        </div>
    </div>
@endsection
