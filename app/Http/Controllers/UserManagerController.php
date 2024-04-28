<?php

namespace App\Http\Controllers;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class UserManagerController extends Controller
{
    public function index()
    {
        $users = User::with(['roles', 'permissions'])->get();
        $roles = Role::all(); // Get all roles for the view
        $permissions = Permission::all(); // Get all permissions for the view
        return view('users.index', compact('users', 'roles', 'permissions'));
    }

    public function assignRoles(Request $request, User $user)
{
    $validatedData = $request->validate([
        'roles' => 'required|array',
        'roles.*' => 'exists:roles,id' // Ensure the role IDs exist in the roles table
    ]);

    // Fetch role names or models based on validated IDs
    $roles = Role::findMany($validatedData['roles'])->pluck('name');

    // Sync roles using role names
    $user->syncRoles($roles);
    return back()->with('success', 'Roles updated successfully!');
}


    // public function assignPermissions(Request $request, User $user)
    // {
    //     $validatedData = $request->validate([
    //         'permissions' => 'required|array',
    //         'permissions.*' => 'exists:permissions,id' // Ensure the permission IDs exist
    //     ]);

    //     $user->syncPermissions($validatedData['permissions']);
    //     return back()->with('success', 'Permissions updated successfully!');
    // }

    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            // Add other fields and rules as necessary
        ]);

        $user->update($validatedData);
        return back()->with('success', 'User updated successfully!');
    }
}
