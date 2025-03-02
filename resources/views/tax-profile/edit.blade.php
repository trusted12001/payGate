@extends('layouts.crmi-dashboard')

@section('content')
<div class="container-fluid">
    <div class="row mb-3">
        <div class="col">
            <h1>Edit Tax Profile</h1>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('tax-profile.update', $taxProfile->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="taxpayer_type">Taxpayer Type</label>
                    <select name="taxpayer_type" class="form-control" required>
                        <option value="Individual" {{ $taxProfile->taxpayer_type == 'Individual' ? 'selected' : '' }}>Individual</option>
                        <option value="Company" {{ $taxProfile->taxpayer_type == 'Company' ? 'selected' : '' }}>Company</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="full_name">Full Name (For Individuals)</label>
                    <input type="text" name="full_name" class="form-control" value="{{ $taxProfile->full_name }}">
                </div>

                <div class="form-group">
                    <label for="business_name">Business Name (For Companies)</label>
                    <input type="text" name="business_name" class="form-control" value="{{ $taxProfile->business_name }}">
                </div>

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" name="email" class="form-control" value="{{ $taxProfile->email }}" required>
                </div>

                <div class="form-group">
                    <label for="phone_number">Phone Number</label>
                    <input type="text" name="phone_number" class="form-control" value="{{ $taxProfile->phone_number }}" required>
                </div>

                <div class="form-group">
                    <label for="local_government">Local Government</label>
                    <select name="local_government" class="form-control" required>
                        <option value="">Select Local Government</option>
                        @foreach($localGovernments as $lg)
                            <option value="{{ $lg }}" {{ $taxProfile->local_government == $lg ? 'selected' : '' }}>{{ $lg }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="tax_category">Tax Category</label>
                    <select name="tax_category" class="form-control" required>
                        <option value="">Select Tax Category</option>
                        @foreach($taxCategories as $category)
                            <option value="{{ $category }}" {{ $taxProfile->tax_category == $category ? 'selected' : '' }}>{{ $category }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="business_reg_number">Business Registration Number</label>
                    <input type="text" name="business_reg_number" class="form-control" value="{{ $taxProfile->business_reg_number }}">
                </div>

                <div class="form-group">
                    <label for="identification_number">Identification Number</label>
                    <input type="text" name="identification_number" class="form-control" value="{{ $taxProfile->identification_number }}">
                </div>

                <div class="form-group">
                    <label for="registered_address">Registered Address</label>
                    <input type="text" name="registered_address" class="form-control" value="{{ $taxProfile->registered_address }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Update Tax Profile</button>
            </form>
        </div>
    </div>
</div>
@endsection
