<?php

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
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});
Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');
Route::resource('/vacations', VacationsController::class,)->middleware('auth');

Route::group(['middleware' => "auth"], function () {
});
require __DIR__ . '/auth.php';
