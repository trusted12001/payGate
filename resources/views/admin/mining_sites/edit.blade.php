@extends('layouts.crmi-dashboard')

@section('content')
<div class="container-fluid">
    <div class="row mb-3">
        <div class="col">
            <h1>Edit Mining Site</h1>
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
            <form action="{{ route('admin.mining_sites.update', $site->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="site_name">Site Name</label>
                    <input type="text" name="site_name" class="form-control" value="{{ $site->site_name }}" required>
                </div>

                <div class="form-group">
                    <label for="site_description">Site Description</label>
                    <input type="text" name="site_description" class="form-control" value="{{ $site->site_description }}" required>
                </div>

                <div class="form-group">
                    <label for="prominent_mineral_deposit">Prominent Mineral Deposit</label>
                    <select name="prominent_mineral_deposit" class="form-control" required>
                        <option value="">Select Mineral Deposit</option>
                        @foreach($minerals as $id => $mineral)
                            <option value="{{ $mineral }}" {{ $site->prominent_mineral_deposit == $id ? 'selected' : '' }}>{{ $mineral }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="lease_number">Lease Number</label>
                    <input type="text" name="lease_number" class="form-control" value="{{ $site->lease_number }}" required>
                </div>

                <div class="form-group">
                    <label for="local_government">Local Government Area</label>
                    <select name="local_government" class="form-control" required>
                        <option value="">Select Local Government</option>
                        @foreach($localGovernments as $lga)
                            <option value="{{ $lga }}" {{ $site->local_government == $lga ? 'selected' : '' }}>{{ $lga }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update Site</button>
            </form>
        </div>
    </div>
</div>
@endsection
