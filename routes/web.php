<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CurrencyController;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('index');
})->name('dashboard');

Route::get('logout/', [AuthController::class, 'destroy'])->name('admin.logout');

Route::get('currency-converter/', [CurrencyController::class, 'index'])->name('currency-converter');
Route::post('currency-converter/', [CurrencyController::class, 'convert'])->name('currency.convert');

Route::get('converted-currency/', [CurrencyController::class, 'all'])->name('converted-currency');