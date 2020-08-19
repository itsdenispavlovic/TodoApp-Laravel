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

Route::get('/', 'TodosController@index');

Route::get('todos', 'TodosController@index')->name('todos.index');
Route::get('todos/{todo}', 'TodosController@show')->name('todo.show');
Route::get('new-todo', 'TodosController@create')->name('todo.create');
Route::post('store-todos', 'TodosController@store')->name('todo.store');

Route::get('todos/{todo}/edit', 'TodosController@edit')->name('todo.edit');
Route::post('todos/{todo}/update-todo', 'TodosController@update')->name('todo.update');

Route::get('todos/{todo}/delete-todo', 'TodosController@destroy')->name('todo.delete');

Route::get('todos/{todo}/complete', 'TodosController@complete')->name('todo.complete');
