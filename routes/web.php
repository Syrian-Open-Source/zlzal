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
    $cities = [
        [
            'id' => 'Aleppo',
            'name' => 'حلب'
        ],
        [
            'id' => 'Damascus',
            'name' => 'دمشق'
        ],
        [
            'id' => 'Rif-Dimashq',
            'name' => 'ريف دمشق'
        ],
        [
            'id' => 'Daraa',
            'name' => 'درعا'
        ],
        [
            'id' => 'Dayr al-Zawr',
            'name' => 'دير الزور'
        ],
        [
            'id' => 'Hama',
            'name' => 'حماة'
        ],
        [
            'id' => 'Al-Hasakah',
            'name' => 'الحسكة'
        ],
        [
            'id' => 'Homs',
            'name' => 'حمص'
        ],
        [
            'id' => 'Idlib',
            'name' => 'ادلب'
        ],
        [
            'id' => 'Latakia',
            'name' => 'اللاذقية'
        ],
        [
            'id' => 'Quneitra',
            'name' => 'القنيطرة'
        ],
        [
            'id' => 'Al-Raqqah',
            'name' => 'الرقة'
        ],
        [
            'id' => 'Al-Suwayda',
            'name' => 'السويداء'
        ],
        [
            'id' => 'Tartus',
            'name' => 'طرطوس'
        ],
    ];


    return view('welcome',compact('cities'));
});
Route::post('/case', [\App\Http\Controllers\CasesController::class, 'store'])->name('cases.store');
Route::get('/map', [\App\Http\Controllers\CasesController::class, 'map'])->name('cases.map');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/export', [\App\Http\Controllers\CasesController::class, 'export'])->name('cases.export');
    Voyager::routes();
});
