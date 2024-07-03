<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/', [ProjectController::class, 'index'])->name('index');
    
    Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
    
    Route::get('/projects/search', [ProjectController::class, 'search'])->name('projects.search');
    
    Route::get('/comments/create/{project}', [CommentController::class, 'create'])->name('comments.create');
    
    Route::get('/projects/{project}', [ProjectController::class, 'show']);
    
    Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
    
    Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
    
    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
    
    Route::put('/projects/{project}', [ProjectController::class, 'update'])->name('projects.update');
    
    Route::delete('/projects/{project}', [ProjectController::class, 'delete']);
});

require __DIR__.'/auth.php';
