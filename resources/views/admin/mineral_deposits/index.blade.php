@extends('layouts.crmi-dashboard')

@section('content')
<div class="container-fluid">
    <h1>Mineral Deposits</h1>
    <a href="{{ route('admin.mineral_deposits.create') }}" class="btn btn-primary mb-3">Add New Mineral</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Mineral Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($minerals as $mineral)
            <tr>
                <td>{{ $mineral->id }}</td>
                <td>{{ $mineral->mineral_name }}</td>
                <td>{{ $mineral->description }}</td>
                <td>
                    <a href="{{ route('admin.mineral_deposits.edit', $mineral->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.mineral_deposits.destroy', $mineral->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
