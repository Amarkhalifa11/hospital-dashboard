<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;


Route::get('/', function () {
    return view('welcome');
});

// logout
use App\Http\Controllers\backendController;
Route::get('/logout' , [backendController::class , 'logout'])->name('logout');

// ---------------------------------------------------------------------------------------------------------------

// category
use App\Http\Controllers\CategoryController;
Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');

Route::get('/categories/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
Route::post('/categories/update/{id}', [CategoryController::class, 'update'])->name('categories.update');

Route::get('/categories/SoftDelete/{id}', [CategoryController::class, 'SoftDelete'])->name('categories.SoftDelete');
Route::get('/categories/deletedcategories', [CategoryController::class, 'deletedcategories'])->name('categories.deletedcategories');

Route::get('/categories/restore/{id}', [CategoryController::class, 'restore'])->name('categories.restore');
Route::get('/categories/harddelete/{id}', [CategoryController::class, 'harddelete'])->name('categories.harddelete');

// ---------------------------------------------------------------------------------------------------------------

// DOCTORS
use App\Http\Controllers\DoctorController;
Route::get('/doctors', [DoctorController::class, 'index'])->name('doctors');
Route::get('/doctors/create', [DoctorController::class, 'create'])->name('doctors.create');
Route::post('/doctors/store', [DoctorController::class, 'store'])->name('doctors.store');

Route::get('/doctors/edit/{id}', [DoctorController::class, 'edit'])->name('doctors.edit');
Route::post('/doctors/update/{id}', [DoctorController::class, 'update'])->name('doctors.update');

Route::get('/doctors/SoftDelete/{id}', [DoctorController::class, 'SoftDelete'])->name('doctors.SoftDelete');
Route::get('/doctors/delete', [DoctorController::class, 'thedeleted'])->name('doctors.thedeleted');

Route::get('/doctors/restore/{id}', [DoctorController::class, 'restore'])->name('doctors.restore');
Route::get('/doctors/hardelete/{id}', [DoctorController::class, 'hardelete'])->name('doctors.hardelete');

//posts
use App\Http\Controllers\PostController;
Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');

Route::get('/posts/edit/{id}', [PostController::class, 'edit'])->name('posts.edit');
Route::post('/posts/update/{id}', [PostController::class, 'update'])->name('posts.update');

Route::get('/posts/softDeletes/{id}', [PostController::class, 'softDeletes'])->name('posts.softDeletes');
Route::get('/posts/thedeleted', [PostController::class, 'thedeleted'])->name('posts.thedeleted');

Route::get('/posts/restore/{id}', [PostController::class, 'restore'])->name('posts.restore');
Route::get('/posts/destroy/{id}', [PostController::class, 'destroy'])->name('posts.destroy');




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    Route::get('/dashboard', function () {
        // return view('dashboard');
        return view('admin.index');
    })->name('dashboard');

    Route::get('/users', function () {
        $users = User::all();
        return view('admin.users' , compact('users'));
    })->name('users');
});
