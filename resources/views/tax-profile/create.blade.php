@extends('layouts.crmi-dashboard')

@section('content')
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Complete Your Tax Profile</h3>
  </div>
  <div class="box-body">
    <form method="POST" action="{{ route('tax-profile.store') }}">
      @csrf
      <div class="form-group">
        <label for="tax_category">Tax Category</label>
        <select id="tax_category" name="tax_category" class="form-control" required>
          <option value="">-- Select Tax Category --</option>
          <option value="Mining">Mining (Precious stones, sand, gravel)</option>
          <option value="Other">Other</option>
        </select>
      </div>
      <div class="form-group mt-3">
        <label for="lga">Local Government Area</label>
        <select id="lga" name="lga" class="form-control" required>
          <option value="">-- Select LGA --</option>
          @foreach($lgas as $key => $value)
            <option value="{{ $key }}">{{ $value }}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group mt-3">
        <label for="additional_info">Additional Information</label>
        <textarea id="additional_info" name="additional_info" class="form-control" placeholder="e.g., truck size, capacity, etc."></textarea>
      </div>
      <button type="submit" class="btn btn-primary mt-4">Save Tax Profile</button>
    </form>
  </div>
</div>
@endsection
