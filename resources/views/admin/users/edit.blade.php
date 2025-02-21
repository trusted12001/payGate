@extends('layouts.crmi-dashboard')

@section('content')
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Edit User</h3>
  </div>
  <div class="box-body">
    <form method="POST" action="{{ route('admin.users.update', $user) }}">
      @csrf
      @method('PUT')
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
      </div>
      <div class="form-group mt-3">
        <label for="email">Email Address</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
      </div>
      <div class="form-group mt-3">
        <label for="roles">Assign Roles</label>
        <select name="roles[]" id="roles" class="form-control" multiple>
          @foreach($roles as $role)
            <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>
              {{ $role->name }}
            </option>
          @endforeach
        </select>
      </div>
      <button type="submit" class="btn btn-primary mt-4">Update User</button>
    </form>
  </div>
</div>
@endsection
