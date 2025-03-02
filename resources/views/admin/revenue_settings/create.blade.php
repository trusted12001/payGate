@extends('layouts.crmi-dashboard')

@section('content')

<div class="container-fluid">
    <h1>Create Revenue Setting</h1>
    <!---Display error message --->
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.revenue_settings.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="mineral">Mineral</label>
                    <select name="mineral_id" id="mineral" class="form-control" required>
                        <option value="">Select Mineral</option>
                        @foreach($minerals as $id => $mineral)
                        <option value="{{ $id }}">{{ $mineral }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mt-3">
                    <label for="per_gram">Per Gram</label>
                    <input type="text" name="per_gram" class="form-control" placeholder="Enter rate per gram">
                </div>

                <div class="form-group mt-3">
                    <label for="per_kg">Per Kg</label>
                    <input type="text" name="per_kg" class="form-control" placeholder="Enter rate per kilogram">
                </div>

                <div class="form-group mt-3">
                    <label for="per_bag">Per Bag</label>
                    <input type="text" name="per_bag" class="form-control" placeholder="Enter rate per bag">
                </div>

                <div class="form-group mt-3">
                    <label for="per_ton">Per Ton</label>
                    <input type="text" name="per_ton" class="form-control" placeholder="Enter rate per ton">
                </div>

                <div class="form-group mt-3">
                    <label for="per_truck">Per Truck</label>
                    <input type="text" name="per_truck" class="form-control" placeholder="Enter rate per truck">
                </div>

                <button type="submit" class="btn btn-success mt-3">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection
