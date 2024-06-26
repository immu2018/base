<?php
use App\Http\Controllers\UserManagerController;
use App\Http\Controllers\ProfileController;

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/admin/dashboard', function () {
        // Only accessible by users with the 'admin' role
        return view('admin.dashboard');
    });
});

Route::group(['middleware' => ['permission:manage posts']], function () {
    Route::get('/posts/manage', function () {
        // Only accessible by users with the 'manage posts' permission
        return view('posts.manage');
    });
});


// User management routes
Route::get('/users', [UserManagerController::class, 'index'])->name('users.index');
Route::post('/users/{user}/roles', [UserManagerController::class, 'assignRoles'])->name('users.assignRoles');
Route::post('/users/{user}/permissions', [UserManagerController::class, 'assignPermissions'])->name('users.assignPermissions');
Route::post('/users/{user}/update', [UserManagerController::class, 'update'])->name('users.update');

 