<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class,'index'])->name('home');

Route::prefix('todos')->as('todos.')->controller(TodoController::class)->group(function(){

Route::get('index','index')->name('index');
Route::get('create','create')->name('create');
Route::post('store','store')->name('store');
Route::get('show{id}','show')->name('show');
Route::get('{id}/edit','edit')->name('edit');
Route::put('update','update')->name('update');
Route::delete('destroy', 'destroy')->name('destroy'); 
//Route::resource('todos', TodoController::class);

});
/*
Route::get('todos/index', [TodoController::class,'index'])->name('todos.index');
Route::get('todos/create', [TodoController::class,'create'])->name('todos.create');
Route::post('todos/store', [TodoController::class,'store'])->name('todos.store');
Route::get('todos/show{id}', [TodoController::class,'show'])->name('todos.show');
Route::get('todos/{id}/edit', [TodoController::class, 'edit'])->name('todos.edit');
Route::put('todos/update', [TodoController::class, 'update'])->name('todos.update');
Route::delete('todos/destroy', [TodoController::class, 'destroy'])->name('todos.destroy'); 
*/

