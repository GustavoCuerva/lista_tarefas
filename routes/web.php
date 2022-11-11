<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\TaskController;

Route::get('/', [TaskController::class, 'index'])->middleware('auth')->name('index');
Route::post('/tasks', [TaskController::class, 'store'])->middleware('auth')->name('store');

Route::prefix('/tasks')->group(function(){
    Route::get('/create', [TaskController::class, 'create'])->middleware('auth')->name('tasks.create');
    Route::get('/edit/{id}', [TaskController::class, 'edit'])->middleware('auth')->name('tasks.edit');
    Route::get('/list', [TaskController::class, 'list'])->middleware('auth')->name('tasks.list');
    Route::get('/list/{data}', [TaskController::class, 'list_filter'])->middleware('auth')->name('tasks.list.data');
    Route::get('/{id}', [TaskController::class, 'show'])->middleware('auth')->name('tasks.show');
    Route::put('/updateDone/{id}', [TaskController::class, 'updateDone'])->middleware('auth')->name('tasks.done');
    Route::put('/update/{id}', [TaskController::class, 'update'])->middleware('auth')->name('tasks.update');
    Route::delete('/{id}', [TaskController::class, 'destroy'])->middleware('auth')->name('tasks.del');
});

Route::fallback([TaskController::class, 'fallback']);

// Login / Register
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');
});