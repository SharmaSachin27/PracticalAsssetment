<?php

use App\Http\Controllers\StudentController;
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
Route::get('/',  [StudentController::class,'index'])->name('index');
Route::group([
    'prefix'     => 'student',
    'as'         => 'student.',
], function () {
    Route::controller(StudentController::class)->group(function () {
        Route::get('create',  'create')->name('create');
        Route::post('store',  'store')->name('store');
        Route::get('edit/{id}',  'edit')->name('edit');
        Route::post('update/{id}',  'update')->name('update');
        Route::delete('destroy',  'destroy')->name('destroy');
    });
});