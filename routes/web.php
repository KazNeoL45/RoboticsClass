<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoboticsKitController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $courses = \App\Models\Course::with('roboticsKit')->get();
    $totalCourses = $courses->count();
    $totalKits = \App\Models\RoboticsKit::count();
    $totalUsers = \App\Models\User::count();
    return view('dashboard', compact('courses', 'totalCourses', 'totalKits', 'totalUsers'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::resource('courses', CourseController::class);
    Route::resource('kits', RoboticsKitController::class);
});

require __DIR__.'/auth.php';
