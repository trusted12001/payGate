@extends('layouts.crmi-dashboard')

@section('content')
<div class="container-fluid">
    <h1>Select Profile to Make Payment</h1>

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
            <table class="table">
                <thead>
                    <tr>
                        <th>Full Name / Business Name</th>
                        <th>Tax Category</th>
                        <th>Local Government</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($profiles as $profile)
                    <tr>
                        <td>{{ $profile->full_name ?? $profile->business_name }}</td>
                        <td>{{ $profile->tax_category }}</td>
                        <td>{{ $profile->local_government }}</td>
                        <td>
                            <a href="{{ route('payments.make', $profile->id) }}" class="btn btn-sm btn-success">Make Payment</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
