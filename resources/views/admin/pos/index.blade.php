@extends('layouts.crmi-dashboard')

@section('content')

<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">POS Machines</h3>
        <div class="box-tools pull-right">
            <a href="{{ route('admin.pos.create') }}" class="btn btn-primary">Add New POS Machine</a>
        </div>
    </div>
    <div class="box-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>POS Code</th>
                    <th>Status</th>
                    <th>Assigned Agent</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($posMachines as $pos)
                <tr>
                    <td>{{ $pos->id }}</td>
                    <td>{{ $pos->pos_code }}</td>
                    <td>{{ $pos->status }}</td>
                    <td>
                        @if($pos->assignment)
                            {{ $pos->assignment->user->name }}
                        @else
                            Not Assigned
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.pos.edit', $pos) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.pos.destroy', $pos) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this POS machine?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">No POS machines found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-10">
            {{ $posMachines->links() }}
        </div>
    </div>
</div>
@endsection
