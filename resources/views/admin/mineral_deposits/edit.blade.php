@extends('layouts.crmi-dashboard')

@section('content')
<div class="container-fluid">
    <h1>Edit Mineral Deposit</h1>
    <form action="{{ route('admin.mineral_deposits.update', $mineralDeposit->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="mineral_name" class="form-label">Mineral Name</label>
            <input type="text" name="mineral_name" class="form-control" value="{{ $mineralDeposit->mineral_name }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="4">{{ $mineralDeposit->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Update Mineral</button>
        <a href="{{ route('admin.mineral_deposits.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
