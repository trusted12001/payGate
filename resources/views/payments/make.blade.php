@extends('layouts.crmi-dashboard')

@section('content')
<div class="container-fluid">
    <h1>Final Payment Page</h1>

    <!-- Display error message -->
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <!-- Payment Form -->
            {{-- <form action="{{ route('payments.proceed') }}" method="POST"> --}}
                @csrf

                <div class="form-group">
                    <label for="mineralDeposit">Select Mineral Deposit</label>
                    <select id="mineralDeposit" name="mineralDeposit" class="form-control">
                        @foreach($mineralDeposits as $deposit)
                            <option value="{{ $deposit->id }}">{{ $deposit->mineral_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="miningSite">Select Mining Site</label>
                    <select id="miningSite" name="miningSite" class="form-control">
                        @foreach($miningSites as $site)
                            <option value="{{ $site->id }}">{{ $site->site_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="taxCategory">Select Tax Category</label>
                    <select id="taxCategory" name="taxCategory" class="form-control">
                        @foreach($taxCategories as $tax)
                            <option value="{{ $tax }}">{{ $tax }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="number" id="quantity" name="quantity" class="form-control" value="1" min="1" step="1">
                </div>

                <div class="form-group">
                    <label>Unit</label><br>
                    <div class="form-check form-check-inline">
                        <input type="radio" name="unit" value="gram" class="form-check-input" id="gram">
                        <label class="form-check-label" for="gram">Per Gram</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" name="unit" value="kg" class="form-check-input" id="kg">
                        <label class="form-check-label" for="kg">Per Kg</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" name="unit" value="bag" class="form-check-input" id="bag">
                        <label class="form-check-label" for="bag">Per Bag</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" name="unit" value="ton" class="form-check-input" id="ton">
                        <label class="form-check-label" for="ton">Per Ton</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" name="unit" value="truck" class="form-check-input" id="truck">
                        <label class="form-check-label" for="truck">Per Truck</label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="totalAmount">Total Amount</label>
                    <input type="text" id="totalAmount" class="form-control" value="N1,000.00" readonly>
                </div>

                <button type="submit" class="btn btn-success">Proceed to Payment</button>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Example of quantity and total amount calculation
    const quantityInput = document.getElementById('quantity');
    const totalAmountInput = document.getElementById('totalAmount');
    const unitRadioButtons = document.querySelectorAll('input[name="unit"]');
    const basePrice = 1000;  // N1,000 per gram as an example

    quantityInput.addEventListener('input', function() {
        const quantity = parseInt(quantityInput.value) || 1;
        totalAmountInput.value = `N${(basePrice * quantity).toFixed(2)}`;
    });

    unitRadioButtons.forEach(radio => {
        radio.addEventListener('change', function() {
            const unitPrice = basePrice;  // Example: Base price for grams
            totalAmountInput.value = `N${(unitPrice * quantityInput.value).toFixed(2)}`;
        });
    });
</script>
@endpush
