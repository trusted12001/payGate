@extends('layouts.crmi-dashboard')

@section('content')
<div class="container-fluid">
    <h1>Final Payment Page</h1>

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
            @csrf

            <div class="form-group">
                <label for="mineralDeposit">Mineral Deposit</label>
                <select id="mineralDeposit" name="mineralDeposit" class="form-control">
                    <option value="">Select</option>
                    @foreach($mineralDeposits as $deposit)
                        <option value="{{ $deposit->id }}">{{ $deposit->mineral_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="miningSite">Mining Site</label>
                <select id="miningSite" name="miningSite" class="form-control">
                    <option value="">Select</option>
                    @foreach($miningSites as $site)
                        <option value="{{ $site->id }}">{{ $site->site_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="taxCategory">Tax Category</label>
                <select id="taxCategory" name="taxCategory" class="form-control">
                    <option value="">Select</option>
                    @foreach($taxCategories as $tax)
                        <option value="{{ $tax }}">{{ $tax }}</option>
                    @endforeach
                </select>
            </div>

            <div class="row">
                <div class="form-group col-md-2">
                    <label for="quantity">Quantity</label>
                    <input type="number" id="quantity" name="quantity" class="form-control" value="1" min="1" step="1">
                </div>
                <div class="form-group col-md-10">
                    <label>Unit</label><br>
                    @foreach(['gram','kg','bag','ton','truck'] as $unit)
                        <div class="form-check form-check-inline">
                            <input type="radio" name="unit" value="{{ $unit }}" class="form-check-input" id="{{ $unit }}">
                            <label class="form-check-label" for="{{ $unit }}">{{ ucfirst($unit) }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="totalAmount">Total Amount</label>
                <input type="text" id="totalAmount" class="form-control" readonly>
            </div>

            {{-- Invoice Preview --}}
            <div id="invoicePreview" class="mt-4 alert alert-info d-none">
                <h5>Invoice Preview</h5>
                <ul class="mb-0">
                    <li><strong>Mineral:</strong> <span id="previewMineral"></span></li>
                    <li><strong>Quantity:</strong> <span id="previewQuantity"></span></li>
                    <li><strong>Unit:</strong> <span id="previewUnit"></span></li>
                    <li><strong>Total Amount:</strong> <span id="previewTotal"></span></li>
                </ul>
            </div>

            <button type="button" class="btn btn-success" id="proceedPayment">Proceed to Payment</button>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    const quantityInput = document.getElementById('quantity');
    const depositSelect = document.getElementById('mineralDeposit');
    const totalAmountInput = document.getElementById('totalAmount');
    const unitRadioButtons = document.querySelectorAll('input[name="unit"]');
    const unitPrices = @json($unitPrices);
    const mineralNames = @json($mineralDeposits->pluck('mineral_name', 'id'));

    // Invoice preview elements
    const invoiceDiv = document.getElementById('invoicePreview');
    const previewMineral = document.getElementById('previewMineral');
    const previewQuantity = document.getElementById('previewQuantity');
    const previewUnit = document.getElementById('previewUnit');
    const previewTotal = document.getElementById('previewTotal');

    function resetTotal() {
        totalAmountInput.value = '';
        invoiceDiv.classList.add('d-none');
    }

    function calculateTotal() {
        const mineralId = depositSelect.value;
        const unit = document.querySelector('input[name="unit"]:checked')?.value;
        const quantity = parseFloat(quantityInput.value);

        if (!mineralId || !unit || isNaN(quantity)) {
            resetTotal();
            return;
        }

        const pricePerUnit = unitPrices[mineralId]?.[unit];

        if (!pricePerUnit) {
            resetTotal();
            alert('Selected option is currently not available!');
            return;
        }

        const total = quantity * parseFloat(pricePerUnit);
        const formatted = `₦${total.toLocaleString(undefined, { minimumFractionDigits: 2 })}`;

        totalAmountInput.value = formatted;

        // Show preview
        previewMineral.innerText = mineralNames[mineralId] || 'N/A';
        previewQuantity.innerText = quantity;
        previewUnit.innerText = unit;
        previewTotal.innerText = formatted;
        invoiceDiv.classList.remove('d-none');
    }

    quantityInput.addEventListener('input', resetTotal);
    depositSelect.addEventListener('change', resetTotal);
    unitRadioButtons.forEach(radio => {
        radio.addEventListener('change', calculateTotal);
    });
</script>
@endpush
