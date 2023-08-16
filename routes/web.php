<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

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

Route::get('/', [TodoController::class,'index'])->name('home');
Route::post('/todo/new', [TodoController::class, 'create'])->name('todo.new');
Route::get('/todo/delete/{id}', [TodoController::class, 'delete'])->name('todo.delete');
Route::post('/todo/done', [TodoController::class, 'markDone'])->name('todo.done');
Route::get('/todo/edit/{id}', [TodoController::class, 'edit'])->name('todo.edit');
Route::post('/todo/update/{id}', [TodoController::class, 'update'])->name('todo.update');
