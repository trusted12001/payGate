@extends('layouts.crmi-dashboard')

@section('content')
<div class="container-fluid">
    <div class="row mb-3">
        <div class="col">
            <h1>Create Tax Profile</h1>
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
            <form action="{{ route('tax-profile.store') }}" method="POST">
                @csrf

                <!-- Taxpayer Type -->
                <div class="form-group">
                    <label for="taxpayer_type">Taxpayer Type</label>
                    <select name="taxpayer_type" class="form-control" required>
                        <option value="">Select Type</option>
                        <option value="Individual">Individual</option>
                        <option value="Company">Company</option>
                    </select>
                </div>

                <!-- Full Name (for individuals) -->
                <div class="form-group">
                    <label for="full_name">Full Name (For Individual Taxpayers)</label>
                    <input type="text" name="full_name" class="form-control" value="{{ old('full_name') }}" placeholder="Enter full name">
                </div>

                <!-- Business Name (for companies) -->
                <div class="form-group">
                    <label for="business_name">Business Name (For Companies)</label>
                    <input type="text" name="business_name" class="form-control" value="{{ old('business_name') }}" placeholder="Enter business name">
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" required placeholder="Enter email">
                </div>

                <!-- Phone Number -->
                <div class="form-group">
                    <label for="phone_number">Phone Number</label>
                    <input type="text" name="phone_number" class="form-control" value="{{ old('phone_number') }}" required placeholder="Enter phone number">
                </div>

                <!-- Local Government -->
                <div class="form-group">
                    <label for="local_government">Local Government</label>
                    <select name="local_government" class="form-control" required>
                        <option value="">Select Local Government</option>
                        @foreach($localGovernments as $lg)
                            <option value="{{ $lg }}">{{ $lg }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Tax Category -->
                <div class="form-group">
                    <label for="tax_category">Tax Category</label>
                    <select name="tax_category" class="form-control" required>
                        <option value="">Select Tax Category</option>
                        <option value="Royalty">Royalty</option>
                        <option value="Corporate Income Tax">Corporate Income Tax</option>
                        <option value="Indirect Tax">Indirect Tax</option>
                        <option value="Licensing Fees">Licensing Fees</option>
                        <option value="Surface Right Fees">Surface Right Fees</option>
                        <option value="Environmental Fees">Environmental Fees</option>
                        <option value="Production Sharing">Production Sharing</option>
                    </select>
                </div>

                <!-- Business Registration Number -->
                <div class="form-group">
                    <label for="business_reg_number">Business Registration Number (For Companies)</label>
                    <input type="text" name="business_reg_number" class="form-control" value="{{ old('business_reg_number') }}" placeholder="Enter business registration number">
                </div>

                <!-- Identification Number -->
                <div class="form-group">
                    <label for="identification_number">Identification Number (For Individuals)</label>
                    <input type="text" name="identification_number" class="form-control" value="{{ old('identification_number') }}" placeholder="Enter NIN/Driver's License">
                </div>

                <!-- Registered Address -->
                <div class="form-group">
                    <label for="registered_address">Registered Address</label>
                    <input type="text" name="registered_address" class="form-control" value="{{ old('registered_address') }}" required placeholder="Enter registered address">
                </div>

                <!-- Assigned Agent -->
                <div class="form-group">
                    <label for="assigned_agent_id">Assigned Agent</label>
                    <select name="assigned_agent_id" class="form-control">
                        <option value="">Select Agent</option>
                        @foreach($agents as $agent)
                            <option value="{{ $agent->id }}">{{ $agent->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Status (Only Super Admin can change this) -->
                @if(auth()->user()->hasRole('Super Admin'))
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" class="form-control">
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                </div>
                @else
                <input type="hidden" name="status" value="Active">
                @endif

                <button type="submit" class="btn btn-primary">Create Tax Profile</button>
            </form>
        </div>
    </div>
</div>
@endsection
