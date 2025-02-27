@extends('layouts.crmi-dashboard')

@section('content')
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Edit POS Machine</h3>
    </div>
    <div class="box-body">
        <form method="POST" action="{{ route('admin.pos.update', $pos) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="pos_code">POS Code</label>
                <input type="text" class="form-control" id="pos_code" name="pos_code" value="{{ $pos->pos_code }}" required>
            </div>
            <div class="form-group mt-3">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control">
                    <option value="active" {{ $pos->status == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="maintenance" {{ $pos->status == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
                    <option value="decommissioned" {{ $pos->status == 'decommissioned' ? 'selected' : '' }}>Decommissioned</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-4">Update POS Machine</button>
        </form>
    </div>
</div>
@endsection
