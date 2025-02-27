@extends('layouts.crmi-dashboard')

@section('content')

    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col">
                <h1>Revenue Settings</h1>
            </div>
            <div class="col text-end">
                <a href="{{ route('admin.revenue_settings.create') }}" class="btn btn-primary">Add New Setting</a>
            </div>
        </div>

        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <div class="card">
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Mineral</th>
                            <th>Per Gram</th>
                            <th>Per Kg</th>
                            <th>Per Bag</th>
                            <th>Per Ton</th>
                            <th>Per Truck</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($settings as $setting)
                        <tr>
                            <td>{{ $setting->mineral }}</td>
                            <td>{{ $setting->per_gram }}</td>
                            <td>{{ $setting->per_kg }}</td>
                            <td>{{ $setting->per_bag }}</td>
                            <td>{{ $setting->per_ton }}</td>
                            <td>{{ $setting->per_truck }}</td>
                            <td>
                                <a href="{{ route('admin.revenue_settings.edit', $setting->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('admin.revenue_settings.destroy', $setting->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?');">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
