<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Livewire\ManageUser;
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
Route::name('home')->get('/', ManageUser::class);
// Route::name('home')->get('/', [HomeController::class, 'index']);
// Route::name('home1')->get('/home1', [HomeController::class, 'index']);
// Route::get('/post', [PostController::class, 'index']);