@extends('layouts.crmi-dashboard')

@section('content')
<div class="container-fluid">
    <div class="row mb-3">
        <div class="col">
            <h1>Edit Agency</h1>
        </div>
    </div>

    @include('partials.errors')

    <div class="card">
        <div class="card-body">
            <form action="{{ route('agencies.update', $agency->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label>Agency Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $agency->name) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email', $agency->email) }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label>Phone</label>
                        <input type="text" name="phone" class="form-control" value="{{ old('phone', $agency->phone) }}">
                    </div>
                    <div class="col-md-6">
                        <label>Address</label>
                        <textarea name="address" class="form-control" rows="2">{{ old('address', $agency->address) }}</textarea>
                    </div>
                </div>

                <div class="mb-3">
                    <label>Assign LGAs <span class="text-danger">*</span></label>
                    <select name="lgas[]" class="form-select" multiple required>
                        @foreach ($lgas as $lga)
                            <option value="{{ $lga->id }}" {{ in_array($lga->id, $selectedLgas) ? 'selected' : '' }}>
                                {{ $lga->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Update Agency</button>
                    <a href="{{ route('agencies.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
