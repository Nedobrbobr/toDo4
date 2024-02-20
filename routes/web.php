<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('welcome');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware('auth')->group(function () {
    Route::get('/task/new', function () {return view('task-new');})->name('task.new');
    Route::post('/task/new', [TaskController::class, 'add'])->name('task.add');
    Route::get('/task/list', [TaskController::class, 'list'])->name('task.list');
    Route::get('/task/completed', [TaskController::class, 'list_completed'])->name('task.list.completed');
    Route::post('/task/completed', [TaskController::class, 'complete'])->name('task.complete');
});

require __DIR__.'/auth.php';
