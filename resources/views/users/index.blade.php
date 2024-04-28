@extends('layouts.app')

@section('content')
<div class="container">
    <h1>User Management</h1>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">User List</h3>
        </div>
        <div class="card-body border-bottom py-3">
            <div class="d-flex">
                <div class="text-muted">
                    Show
                    <div class="mx-2 d-inline-block">
                        <input type="text" class="form-control form-control-sm" value="10" size="3" aria-label="User count">
                    </div>
                    entries
                </div>
                <div class="ms-auto text-muted">
                    Search:
                    <div class="ms-2 d-inline-block">
                        <input type="text" class="form-control form-control-sm" aria-label="Search user">
                    </div>
                </div>
            </div>
            <table class="table card-table table-vcenter text-nowrap datatable">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <!-- <th>Permissions</th> -->
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ implode(', ', $user->roles->pluck('name')->toArray()) }}</td>
                        <!-- <td>{{ implode(', ', $user->permissions->pluck('name')->toArray()) }}</td> -->
                        <td class="text-end">
    <span class="dropdown">
        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton{{ $user->id }}" data-bs-toggle="dropdown" aria-expanded="false">
            Assign Roles
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $user->id }}">
            <form action="{{ route('users.assignRoles', $user) }}" method="POST">
                @csrf
                @foreach ($roles as $role)
                    <li>
                        <a class="dropdown-item">
                            <input type="checkbox" name="roles[]" value="{{ $role->id }}" 
                                {{ $user->roles->pluck('id')->contains($role->id) ? 'checked' : '' }}>
                            {{ $role->name }}
                        </a>
                    </li>
                @endforeach
                <li><hr class="dropdown-divider"></li>
                <li><button type="submit" class="btn btn-sm btn-success">Update Roles</button></li>
            </form>
        </ul>
    </span>
</td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
    </div>
</div>
@endsection
