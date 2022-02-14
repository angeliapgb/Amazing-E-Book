<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;

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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('guestmiddleware');

Route::get('/detail/{title}', [PageController::class, 'detail'])->name('detail')->middleware('guestmiddleware');
Route::post('/detail/{title}', [PageController::class, 'rent'])->name('rent')->middleware('guestmiddleware');

Route::get('/profile', [PageController::class, 'profile'])->name('profile')->middleware('guestmiddleware');
Route::post('/profile', [PageController::class, 'saveProfile'])->name('saveProfile')->middleware('guestmiddleware');

Route::get('/saved', [PageController::class, 'saved'])->name('saved')->middleware('guestmiddleware');
Route::get('/success', [PageController::class, 'success'])->name('success')->middleware('guestmiddleware');

Route::get('/cart', [PageController::class, 'cart'])->name('cart')->middleware('guestmiddleware');

Route::post('/cartDelete', [PageController::class, 'cartDelete'])->middleware('guestmiddleware');

Route::post('/submit', [PageController::class, 'submit'])->middleware('guestmiddleware');

Route::get('/maintenance', [PageController::class, 'maintenance'])->name('maintenance')->middleware('guestmiddleware', 'usermiddleware');
Route::get('/maintenance/{id}', [PageController::class, 'userDelete'])->name('userDelete')->middleware('guestmiddleware', 'usermiddleware');
Route::post('/maintenance/{id}', [PageController::class, 'userDelete'])->name('userDelete')->middleware('guestmiddleware', 'usermiddleware');

Route::get('/updaterole/{id}', [PageController::class, 'updateRole'])->name('updateRole')->middleware('guestmiddleware');
Route::post('/updaterole/{id}', [PageController::class, 'saveRole'])->name('saveRole')->middleware('guestmiddleware');
