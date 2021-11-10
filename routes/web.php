<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VacationsController;
use App\Models\Vacation;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
});

Route::get('/vacations/verify/{vacation}/{choice}', [VacationsController::class, 'updateConfirm'])->name('verify.confirm');

Route::group(['middleware' => ["isAdmin"]], function () {
    Route::resource('/admin', AdminController::class);
});

Route::group(['middleware' => ["isEmployee"]], function () {
    Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');
    Route::resource('/vacations', VacationsController::class,)->middleware('auth');

});

require __DIR__ . '/auth.php';
//
