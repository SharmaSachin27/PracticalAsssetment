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
Route::get('student/create', [StudentController::class, 'create'])->name('student.create');
Route::post('student/store', [StudentController::class, 'store'])->name('student.store');
Route::get('student/{id}/edit', [StudentController::class, 'edit'])->name('student.edit');
Route::put('student/{id}/update', [StudentController::class, 'update'])->name('student.update');
Route::get('student/{id}/destroy', [StudentController::class, 'softDestroy'])->name('student.softdelete');
Route::get('student/{id}/delete', [StudentController::class, 'destroy'])->name('student.delete');