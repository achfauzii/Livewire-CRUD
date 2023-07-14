<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Counter;
use App\Http\Livewire\Siswa;
use App\Http\Livewire\Staff;
use App\Http\Livewire\User;
//use App\Http\Livewire\Post\Index;
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

// Route::get('/', function () {
//     return view('web');
// });
Route::get('/', Counter::class);

Route::get('/siswa',Siswa::class);

Route::get('/staff',Staff::class);

Route::get('/user',User::class);

Route::get('/post/index', \App\Http\Livewire\Post\Index::class) ->name('post.index');
Route::get('/post/create', \App\Http\Livewire\Post\Create::class) ->name('post.create');
Route::get('/post/edit/{id}', \App\Http\Livewire\Post\Edit::class) ->name('post.edit');




