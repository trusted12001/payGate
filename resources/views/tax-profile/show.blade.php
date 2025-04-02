@extends('layouts.crmi-dashboard')

@section('content')
<div class="container-fluid">
    <div class="row mb-3">
        <div class="col">
            <h1>Tax Profile Details</h1>
        </div>
        <div class="col text-end">
            <a href="{{ route('tax-profile.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <tr>
                    <th>Taxpayer Type:</th>
                    <td>{{ $profile->taxpayer_type }}</td>
                </tr>
                <tr>
                    <th>Name:</th>
                    <td>{{ $profile->full_name ?? $profile->business_name }}</td>
                </tr>
                <tr>
                    <th>Email:</th>
                    <td>{{ $profile->email }}</td>
                </tr>
                <tr>
                    <th>Phone:</th>
                    <td>{{ $profile->phone_number }}</td>
                </tr>
                <tr>
                    <th>Local Government:</th>
                    <td>{{ $profile->local_government }}</td>
                </tr>
                <tr>
                    <th>Tax Category:</th>
                    <td>{{ $profile->tax_category }}</td>
                </tr>
                @if ($profile->business_reg_number)
                    <tr>
                        <th>Business Reg. Number:</th>
                        <td>{{ $profile->business_reg_number ?? 'N/A' }}</td>
                    </tr>
                @endif

                @if ($profile->identification_number)
                    <tr>
                        <th>Identification Number:</th>
                        <td>{{ $profile->identification_number ?? 'N/A' }}</td>
                    </tr>
                @endif

                @if ($profile->vehicle_registration)
                    <tr>
                        <th>Vehicle Reg. Number:</th>
                        <td>{{ $profile->vehicle_registration ?? 'N/A' }}</td>
                    </tr>
                @endif

                <tr>
                    <th>Registered Address:</th>
                    <td>{{ $profile->registered_address }}</td>
                </tr>

                <tr>
                    <th>Assigned Agent:</th>
                    <td>{{ $profile->assigned_agent_id ? 'Agent ID: ' . $profile->assigned_agent_id : 'Unassigned' }}</td>
                </tr>
                <tr>
                    <th>Status:</th>
                    <td><span class="badge {{ $profile->status == 'Active' ? 'badge-success' : 'badge-danger' }}">{{ $profile->status }}</span></td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection
