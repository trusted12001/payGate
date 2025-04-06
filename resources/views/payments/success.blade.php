<form method="POST" action="{{ route('payments.preview') }}">
    @csrf
    <!-- All your form fields stay the same -->

    <input type="hidden" name="totalAmount" id="hiddenTotalAmount">

    <button type="submit" class="btn btn-success" id="proceedPayment">Proceed to Payment</button>
</form>
