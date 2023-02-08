<?php

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


Route::get('/', function () {
    return view('welcome');
});
Route::post('/case', [\App\Http\Controllers\CasesController::class, 'store'])->name('cases.store');
Route::get('/map', [\App\Http\Controllers\CasesController::class, 'map'])->name('cases.map');

Route::group(['prefix' => 'admin'], function () {
Route::get('/export', [\App\Http\Controllers\CasesController::class, 'export'])->name('cases.export');
    Voyager::routes();
});
