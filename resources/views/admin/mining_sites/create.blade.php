@extends('layouts.crmi-dashboard')

@section('content')
<div class="container-fluid">
    <div class="row mb-3">
        <div class="col">
            <h1>Add New Mining Site</h1>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.mining_sites.store') }}" method="POST">
                @csrf

                <!-- Site Name -->
                <div class="form-group mb-3">
                    <label for="site_name" class="form-label">Site Name</label>
                    <input type="text" name="site_name" id="site_name" class="form-control" required>
                </div>

                <!-- Site Description -->
                <div class="form-group mb-3">
                    <label for="site_description" class="form-label">Site Description</label>
                    <textarea name="site_description" id="site_description" class="form-control" rows="3"></textarea>
                </div>

                <!-- Prominent Mineral Deposit -->
                <div class="form-group">
                    <label for="prominent_mineral_deposit">Prominent Mineral Deposit</label>
                    <select name="prominent_mineral_deposit" class="form-control" required>
                        <option value="">Select Mineral Deposit</option>
                        @foreach($minerals as $id => $mineral)
                            <option value="{{ $id }}">{{ $mineral }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Lease Number -->
                <div class="form-group mb-3">
                    <label for="lease_number" class="form-label">Lease Number</label>
                    <input type="text" name="lease_number" id="lease_number" class="form-control">
                </div>

                <!-- Local Government Area -->
                <div class="form-group mb-3">
                    <label for="local_government" class="form-label">Local Government Area</label>
                    <select name="local_government" id="local_government" class="form-control" required>
                        <option value="">Select Local Government Area</option>
                        @foreach($localGovernments as $lga)
                            <option value="{{ $lga }}">{{ $lga }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-success">Create Site</button>
                    <a href="{{ route('admin.mining_sites.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
