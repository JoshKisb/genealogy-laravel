<?php

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

Route::get('/', function () {
    return view('layouts.home');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/pedigree-chart', function () {
        return view('components.pedigree-chart');
    })->name('pedigree-chart');
});
