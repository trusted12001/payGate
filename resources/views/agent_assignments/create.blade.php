@extends('layouts.crmi-dashboard')

@section('content')
<div class="container-fluid">
    <div class="row mb-3">
        <div class="col">
            <h1>Assign Agent to {{ $agency->name }}</h1>
        </div>
    </div>

    @include('partials.errors')

    <div class="card">
        <div class="card-body">
            <form action="{{ route('agent-assignment.store', $agency->id) }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label>Select Agent <span class="text-danger">*</span></label>
                    <select name="user_id" class="form-select" required>
                        <option value="">-- Choose Agent --</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label>Select LGA <span class="text-danger">*</span></label>
                    <select name="lga_id" class="form-select" required>
                        <option value="">-- Choose LGA --</option>
                        @foreach($lgas as $lga)
                            <option value="{{ $lga->id }}">{{ $lga->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label>Select POS Machine <span class="text-danger">*</span></label>
                    <select name="pos_machine_id" class="form-select" required>
                        <option value="">-- Choose POS --</option>
                        @foreach($posMachines as $pos)
                            <option value="{{ $pos->id }}">{{ $pos->device_id ?? 'POS #' . $pos->id }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-success">Assign Agent</button>
                    <a href="{{ route('agencies.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
