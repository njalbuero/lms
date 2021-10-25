<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index'])->middleware(['auth'])->name('home');

Route::group(['middleware' => ['auth', 'role:user']], function() { 
    // user
});

Route::group(['middleware' => ['auth', 'role:administrator']], function() { 
    Route::get('/admin/dashboard', App\Http\Livewire\Pages\Admin\Dashboard::class)->name('admin.dashboard');
});


require __DIR__.'/auth.php';
