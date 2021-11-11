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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/home', [HomeController::class, 'index'])->middleware(['auth'])->name('home');

Route::get('/', App\Http\Livewire\Pages\Guest\Home::class)->name('user.home');
Route::get('/about', App\Http\Livewire\Pages\Guest\About::class)->name('about');
Route::get('/contact', App\Http\Livewire\Pages\Guest\Contact::class)->name('contact');

Route::group(['middleware' => ['auth', 'role:user']], function() { 
    Route::get('/book', App\Http\Livewire\Pages\Guest\Book::class)->name('book');
});

Route::group(['middleware' => ['auth', 'role:administrator']], function() { 
    Route::get('/admin/dashboard', App\Http\Livewire\Pages\Admin\Dashboard::class)->name('admin.dashboard');
    Route::get('/admin/manage-orders', App\Http\Livewire\Pages\Admin\ManageOrders::class)->name('admin.manage-orders');
    Route::get('/admin/manage-orders/create', App\Http\Livewire\Pages\Admin\OrderCreate::class)->name('admin.manage-orders.create');
    Route::get('/admin/manage-orders/edit/{order}', App\Http\Livewire\Pages\Admin\OrderEdit::class)->name('admin.manage-orders.edit');
    Route::get('/admin/washing', App\Http\Livewire\Pages\Admin\Washing::class)->name('admin.washing');
    Route::get('/admin/pickup-and-delivery', App\Http\Livewire\Pages\Admin\PickupAndDelivery::class)->name('admin.pickup-and-delivery');
    Route::get('/admin/reports', App\Http\Livewire\Pages\Admin\Reports::class)->name('admin.reports');
});


require __DIR__.'/auth.php';
