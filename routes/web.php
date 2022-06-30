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
    return redirect()->route('landpage');
});
Route::get('landpage', function () {
    return view('welcome');
})->name('landpage');
Route::get('submit', function () {
    return redirect('/login');
});
Route::get('profile',[\App\Http\Controllers\profile\ProfileController::class,'profile'])->name('profile.index');
Route::post('profile/edit_password/{user}',[\App\Http\Controllers\profile\ProfileController::class,'editPassword'])->name('profile.editPassword');
Route::get('trainer/create',[\App\Http\Controllers\TrainerController::class,'create'])->name('trainer.create');
Route::post('trainer/store',[\App\Http\Controllers\TrainerController::class,'store'])->name('trainer.store');
Route::get('trainer/all',[\App\Http\Controllers\TrainerController::class,'allTrainers'])->name('trainer.all');
Route::get('trainer/delete/{user}',[\App\Http\Controllers\TrainerController::class,'destroy'])->name('trainer.delete');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();