@extends('layouts.crmi-dashboard')

@section('content')
<div class="container-fluid">
    <div class="row mb-3">
        <div class="col">
            <h1>Tax Profiles</h1>
        </div>
        <div class="col text-end">
            <a href="{{ route('tax-profile.create') }}" class="btn btn-primary">Add New Tax Profile</a>
        </div>
    </div>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Taxpayer Type</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Tax Category</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($taxProfiles as $profile)
                    <tr>
                        <td>{{ $profile->taxpayer_type }}</td>
                        <td>{{ $profile->full_name ?? $profile->business_name }}</td>
                        <td>{{ $profile->email }}</td>
                        <td>{{ $profile->phone_number }}</td>
                        <td>{{ $profile->tax_category }}</td>
                        <td>{{ $profile->status }}</td>
                        <td>
                            <a href="{{ route('tax-profile.edit', $profile->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('tax-profile.destroy', $profile->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
