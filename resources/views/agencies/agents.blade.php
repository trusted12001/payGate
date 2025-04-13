@extends('layouts.crmi-dashboard')

@section('content')
<div class="container-fluid">
    <div class="row mb-3">
        <div class="col">
            <h1>Agents Assigned to {{ $agency->name }}</h1>
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
                        <th>Agent Name</th>
                        <th>Email</th>
                        <th>LGA</th>
                        <th>POS Machine</th>
                        <th>Assigned At</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($assignments as $assignment)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $assignment->user->name }}</td>
                            <td>{{ $assignment->user->email }}</td>
                            <td>{{ $assignment->lga->name ?? '—' }}</td>
                            <td>{{ $assignment->posMachine->device_id ?? 'POS #' . $assignment->posMachine->id }}</td>
                            <td>{{ \Carbon\Carbon::parse($assignment->assigned_at)->format('d M Y') }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center">No agents assigned yet.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
