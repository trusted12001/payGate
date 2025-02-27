@extends('layouts.crmi-dashboard')

@section('content')
<div class="container-fluid">
    <h1>Add New Mineral Deposit</h1>
    <form action="{{ route('admin.mineral_deposits.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="mineral_name" class="form-label">Mineral Name</label>
            <input type="text" name="mineral_name" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="4"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Add Mineral</button>
        <a href="{{ route('admin.mineral_deposits.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
