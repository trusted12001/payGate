@extends('layouts.crmi-dashboard')

@section('content')
<div class="container-fluid">
    <h1>Payment History</h1>
    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Reference</th>
                        <th>Amount</th>
                        <th>Payment Method</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($payments as $payment)
                    <tr>
                        <td>#{{ $payment->id }}</td>
                        <td>₦{{ number_format($payment->amount, 2) }}</td>
                        <td>{{ $payment->payment_method }}</td>
                        <td>{{ $payment->status }}</td>
                        <td>
                            <a href="{{ route('payments.receipt', $payment->id) }}" class="btn btn-sm btn-primary">Print Receipt</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
