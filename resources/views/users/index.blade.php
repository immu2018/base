@extends('layouts.app')

@section('content')
<div class="container">
    <h1>User Management</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Roles</th>
                <th>Permissions</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ implode(', ', $user->roles->pluck('name')->toArray()) }}</td>
                <td>{{ implode(', ', $user->permissions->pluck('name')->toArray()) }}</td>
                <td>
                    <!-- Form for assigning roles -->
                    <form action="{{ route('users.assignRoles', $user) }}" method="POST">
                        @csrf
                        <select name="roles[]" multiple>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}" {{ $user->roles->pluck('id')->contains($role->id) ? 'selected' : '' }}>
                                    {{ $role->name }}
                                </option>
                            @endforeach
                        </select>
                        <button type="submit">Assign Roles</button>
                    </form>

                    <!-- Form for assigning permissions -->
                    <!-- <form action="{{ route('users.assignPermissions', $user) }}" method="POST">
                        @csrf
                        <select name="permissions[]" multiple>
                            @foreach ($permissions as $permission)
                                <option value="{{ $permission->id }}" {{ $user->permissions->contains($permission->id) ? 'selected' : '' }}>
                                    {{ $permission->name }}
                                </option>
                            @endforeach
                        </select>
                        <button type="submit">Assign Permissions</button>
                    </form> -->
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
