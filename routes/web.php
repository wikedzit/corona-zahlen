<?php

use App\Http\Controllers\CovidDeathController;
use Illuminate\Support\Facades\Route;

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

Route::match(['get', 'post'], '/', [CovidDeathController::class, 'index'])->name('index');

