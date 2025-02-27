@extends('layouts.crmi-dashboard')

@section('content')
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Edit Your Tax Profile</h3>
  </div>
  <div class="box-body">
    <form method="POST" action="{{ route('tax-profile.update') }}">
      @csrf
      <div class="form-group">
        <label for="tax_category">Tax Category</label>
        <select id="tax_category" name="tax_category" class="form-control" required>
          <option value="">-- Select Tax Category --</option>
          <option value="Mining" {{ $profile->tax_category == 'Mining' ? 'selected' : '' }}>Mining (Precious stones, sand, gravel)</option>
          <option value="Other" {{ $profile->tax_category == 'Other' ? 'selected' : '' }}>Other</option>
        </select>
      </div>
      <div class="form-group mt-3">
        <label for="lga">Local Government Area</label>
        <select id="lga" name="lga" class="form-control" required>
          <option value="">-- Select LGA --</option>
          @foreach($lgas as $key => $value)
            <option value="{{ $key }}" {{ $profile->lga == $key ? 'selected' : '' }}>{{ $value }}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group mt-3">
        <label for="additional_info">Additional Information</label>
        <textarea id="additional_info" name="additional_info" class="form-control" placeholder="e.g., truck size, capacity, etc.">{{ $profile->additional_info }}</textarea>
      </div>
      <button type="submit" class="btn btn-primary mt-4">Update Tax Profile</button>
    </form>
  </div>
</div>
@endsection
