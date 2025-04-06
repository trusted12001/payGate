@extends('layouts.crmi-dashboard')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3>Confirm Payment</h3>
        </div>
        <div class="card-body">
            <ul class="list-group">
                <li class="list-group-item"><strong>Mineral:</strong> {{ $mineral->mineral_name }}</li>
                <li class="list-group-item"><strong>Mining Site:</strong> {{ $site->site_name }}</li>
                <li class="list-group-item"><strong>Tax Category:</strong> {{ $data['taxCategory'] }}</li>
                <li class="list-group-item"><strong>Quantity:</strong> {{ $data['quantity'] }}</li>
                <li class="list-group-item"><strong>Unit:</strong> {{ $data['unit'] }}</li>
                <li class="list-group-item"><strong>Total Amount:</strong> ₦{{ number_format($data['totalAmount'], 2) }}</li>
            </ul>

            <div class="mt-4 text-right">
                <a href="{{ route('payments.success') }}" class="btn btn-primary">Pay Now</a>
            </div>
        </div>
    </div>
</div>
@endsection
