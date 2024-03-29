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
######################################### profile ######################################################################
Route::get('profile',[\App\Http\Controllers\profile\ProfileController::class,'profile'])->name('profile.index');
Route::post('profile/edit_password/{user}',[\App\Http\Controllers\profile\ProfileController::class,'editPassword'])->name('profile.editPassword');
#############################################3 End profile ##############################################################

############################################# trainer #########################################################################
Route::get('trainer/create',[\App\Http\Controllers\TrainerController::class,'create'])->name('trainer.create');
Route::post('trainer/store',[\App\Http\Controllers\TrainerController::class,'store'])->name('trainer.store');
Route::get('trainer/all',[\App\Http\Controllers\TrainerController::class,'allTrainers'])->name('trainer.all');
Route::get('trainer/delete/{user}',[\App\Http\Controllers\TrainerController::class,'destroy'])->name('trainer.delete');
##########################################333### End trainer #######################################################################

#############################################333## start trainee #####################################################################
Route::get('trainee/create',[\App\Http\Controllers\TraineeController::class,'create'])->name('trainee.create');
Route::get('trainee/info/{trainee}',[\App\Http\Controllers\TraineeController::class,'info'])->name('trainee.info');
Route::get('trainee/pay',[\App\Http\Controllers\TraineeController::class,'pay'])->name('trainee.pay');
Route::post('trainee/store',[\App\Http\Controllers\TraineeController::class,'store'])->name('trainee.store');
Route::get('trainee/all',[\App\Http\Controllers\TraineeController::class,'allTrainees'])->name('trainee.all');
Route::get('trainee/all/download',[\App\Http\Controllers\TraineeController::class,'allTraineesPDF'])->name('trainee.all.download');
Route::post('trainee/filtered',[\App\Http\Controllers\TraineeController::class,'allTraineesFilter'])->name('trainee.filter');
Route::post('trainee/filtered/expired',[\App\Http\Controllers\TraineeController::class,'allTraineesFilterExpired'])->name('trainee.filter.expired');
Route::get('trainee/expired',[\App\Http\Controllers\TraineeController::class,'expiredTrainees'])->name('trainee.expired');
Route::get('trainee/expired/download',[\App\Http\Controllers\TraineeController::class,'expiredTraineesPDF'])->name('trainee.expired.download');
Route::get('trainee/edit/{trainee}',[\App\Http\Controllers\TraineeController::class,'edit'])->name('trainee.edit');
Route::post('trainee/update/{trainee}',[\App\Http\Controllers\TraineeController::class,'update'])->name('trainee.update');
Route::get('trainee/search',[\App\Http\Controllers\TraineeController::class,'search'])->name('trainee.search');
Route::get('trainee/search/member',[\App\Http\Controllers\TraineeController::class,'searchForMembers'])->name('trainee.searchMembers');
Route::get('trainee/searchExpired',[\App\Http\Controllers\TraineeController::class,'searchInExpired'])->name('trainee.searchExpired');
Route::get('trainee/delete/{trainee}',[\App\Http\Controllers\TraineeController::class,'destroy'])->name('trainee.delete');
################################################## end trainee ######################################################################
######################################################## start finance ################################################################
Route::get('finance/index',[\App\Http\Controllers\FinanceController::class,'index'])->name('finance.index');
Route::get('finance/day',[\App\Http\Controllers\FinanceController::class,'day'])->name('finance.day');
Route::post('finance/Date',[\App\Http\Controllers\FinanceController::class,'financeDate'])->name('finance.date');
############################################################ end finance ##############################################################
##################################################### Auth ###########################################################################
Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes([

    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);
######################################################## end auth #######################################################################
