<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ApplicationController;
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

Route::controller(ProjectController::class)->middleware(['auth'])->group(function(){
    Route::get('/', 'index')->name('index');
    
    Route::get('/projects/create', 'create')->name('projects.create');
    
    Route::get('/projects/search', 'search')->name('projects.search');
    
    Route::get('/projects/{project}', 'show');
    
    Route::get('/projects/{project}/edit', 'edit')->name('projects.edit');
    
    Route::post('/projects', 'store')->name('projects.store');
    
    Route::put('/projects/{project}', 'update')->name('projects.update');
    
    Route::delete('/projects/{project}', 'delete');
});

Route::controller(CommentController::class)->middleware(['auth'])->group(function(){
    Route::get('/comments/create/{project}', 'create')->name('comments.create');
    
    Route::post('/comments', 'store')->name('comments.store');
});

Route::controller(ApplicationController::class)->middleware(['auth'])->group(function(){
    Route::get('/apps', 'list')->name('apps.list');
    
    Route::get('/apps/{app}/show', 'show')->name('apps.show');
    
    Route::get('/apps/create/{project}', 'create')->name('apps.create');
    
    Route::post('/apps', 'store')->name('apps.store');
});

require __DIR__.'/auth.php';
