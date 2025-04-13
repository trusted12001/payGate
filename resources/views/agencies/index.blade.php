@extends('layouts.crmi-dashboard')

@section('content')
<div class="container-fluid">
    <div class="row mb-3">
        <div class="col">
            <h1>Agencies</h1>
        </div>
        <div class="col text-end">
            <a href="{{ route('agencies.create') }}" class="btn btn-primary">Add New Agency</a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Agents</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($agencies as $agency)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $agency->name }}</td>
                            <td>{{ $agency->email ?? '—' }}</td>
                            <td>{{ $agency->phone ?? '—' }}</td>
                            <td>{{ $agency->agentAssignments->count() }}</td>
                            <td>
                                <a href="{{ route('agencies.edit', $agency->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <a href="{{ route('agent-assignment.create', $agency->id) }}" class="btn btn-sm btn-primary">Assign Agent</a>
                                <a href="{{ route('agencies.agents', $agency->id) }}" class="btn btn-sm btn-secondary">View Agents</a>

                                <form action="{{ route('agencies.destroy', $agency->id) }}" method="POST" class="d-inline"
                                    onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center">No agencies found.</td></tr>
                    @endforelse
                </tbody>
            </table>
            {{ $agencies->links() }}
        </div>
    </div>
</div>
@endsection
