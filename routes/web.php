<?php

use App\Http\Controllers\CasesController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;
use TCG\Voyager\Facades\Voyager;

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


Route::get('/', [IndexController::class,'index']);
Route::post('/case', [CasesController::class, 'store'])->name('cases.store');
Route::get('/map', [CasesController::class, 'map'])->name('cases.map');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/export', [CasesController::class, 'export'])->name('cases.export');
    Voyager::routes();
});