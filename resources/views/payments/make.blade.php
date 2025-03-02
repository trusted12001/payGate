@extends('layouts.crmi-dashboard')

@section('content')
<div class="container-fluid">
    <h1>Make Payment</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('payments.process') }}" method="POST">
                @csrf
                <input type="hidden" name="profile_id" value="{{ $profile->id }}">

                <div class="form-group">
                    <label for="tax_category">Tax Category</label>
                    <input type="text" class="form-control" value="{{ $profile->tax_category }}" disabled>
                </div>

                <div class="form-group">
                    <label for="payment_amount">Amount</label>
                    <input type="text" id="payment_amount" name="payment_amount" class="form-control" value="{{ $revenueSettings->per_ton }}" readonly>
                </div>

                <div class="form-group">
                    <label for="payment_method">Payment Method</label>
                    <select name="payment_method" class="form-control">
                        <option value="POS">POS</option>
                        <option value="Bank Transfer">Bank Transfer</option>
                        <option value="Online Payment">Online Payment</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Proceed to Payment</button>
            </form>
        </div>
    </div>
</div>
@endsection
