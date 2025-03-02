@extends('layouts.crmi-dashboard')

@section('content')
<div class="container-fluid">
    <h1>Edit Revenue Setting</h1>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.revenue_settings.update', $setting->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="mineral">Mineral</label>
                    <select name="mineral_id" id="mineral" class="form-control" required>
                        <option value="">Select Mineral</option>
                        @foreach($minerals as $id => $mineral)
                            <option value="{{ $id }}" {{ $setting->mineral_id == $id ? 'selected' : '' }}>
                                {{ $mineral }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mt-3">
                    <label for="per_gram">Per Gram</label>
                    <input type="text" name="per_gram" class="form-control" value="{{ $setting->per_gram }}">
                </div>

                <div class="form-group mt-3">
                    <label for="per_kg">Per Kg</label>
                    <input type="text" name="per_kg" class="form-control" value="{{ $setting->per_kg }}">
                </div>

                <div class="form-group mt-3">
                    <label for="per_bag">Per Bag</label>
                    <input type="text" name="per_bag" class="form-control" value="{{ $setting->per_bag }}">
                </div>

                <div class="form-group mt-3">
                    <label for="per_ton">Per Ton</label>
                    <input type="text" name="per_ton" class="form-control" value="{{ $setting->per_ton }}">
                </div>

                <div class="form-group mt-3">
                    <label for="per_truck">Per Truck</label>
                    <input type="text" name="per_truck" class="form-control" value="{{ $setting->per_truck }}">
                </div>

                <button type="submit" class="btn btn-primary mt-3">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
