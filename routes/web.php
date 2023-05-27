<?php

use App\Http\Controllers\CalculatorController;
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

Route::get('/', [CalculatorController::class, 'index']);
Route::get('/{data}', [CalculatorController::class, 'indexHasil'])->name('index-show');

Route::get('/data/history', [CalculatorController::class, 'show'])->name('history');
Route::get('store-calculate', [CalculatorController::class, 'store'])->name('store-calculate');