@extends('layouts.crmi-dashboard')

@section('content')
<div class="container-fluid">
    <h1>Mining Sites</h1>
    <a href="{{ route('admin.mining_sites.create') }}" class="btn btn-primary mb-3">Add New Site</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Mineral Deposit</th>
                <th>Lease Number</th>
                <th>Local Government</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sites as $site)
            <tr>
                <td>{{ $site->site_name }}</td>
                <td>{{ $site->prominent_mineral_deposit }}</td>
                <td>{{ $site->lease_number }}</td>
                <td>{{ $site->local_government }}</td>
                <td>{{ ucfirst($site->status) }}</td>
                <td>
                    <a href="{{ route('admin.mining_sites.edit', $site->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('admin.mining_sites.destroy', $site->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?');">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
