<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    //Website
    Route::get('/', [WebsiteController::class, 'index'])->name('website.index');

    //Blog
    Route::get('/view/{user?}/{path?}', [BlogController::class, 'index'])->name('blog.index');
    Route::get('/compose', [BlogController::class, 'create'])->name('blog.create');
    Route::post('/compose', [BlogController::class, 'store'])->name('blog.store');

    //Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
