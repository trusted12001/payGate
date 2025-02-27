@extends('layouts.crmi-dashboard')

@section('content')
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Add New POS Machine</h3>
    </div>
    <div class="box-body">
        <form method="POST" action="{{ route('admin.pos.store') }}">
            @csrf
            <div class="form-group">
                <label for="pos_code">POS Code</label>
                <input type="text" class="form-control" id="pos_code" name="pos_code" placeholder="Enter POS Code" required>
            </div>
            <div class="form-group mt-3">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control">
                    <option value="active">Active</option>
                    <option value="maintenance">Maintenance</option>
                    <option value="decommissioned">Decommissioned</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-4">Save POS Machine</button>
        </form>
    </div>
</div>
@endsection
