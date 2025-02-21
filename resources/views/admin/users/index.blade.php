@extends('layouts.crmi-dashboard')

@section('content')
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">User Management</h3>
    <div class="box-tools pull-right">
      <a href="{{ route('admin.users.create') }}" class="btn btn-primary">
        Add New User
      </a>
    </div>
  </div>
  <div class="box-body">
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Email</th>
          <th>Roles</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($users as $user)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td>{{ $user->getRoleNames()->join(', ') }}</td>
          <td>
            <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-warning btn-sm">Edit</a>
            <form action="{{ route('admin.users.destroy', $user) }}" method="POST" style="display:inline-block;">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
            </form>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="5" class="text-center">No users found.</td>
        </tr>
        @endforelse
      </tbody>
    </table>
    <div class="mt-10">
      {{ $users->links() }}
    </div>
  </div>
</div>
@endsection
