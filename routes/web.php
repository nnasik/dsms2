<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

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

Auth::routes();

Route::group(['middleware' => ['auth']], function () {

    // Profile
    Route::get('/', [ProfileController::class,'profile'])->name('Profile');
    Route::get('/home', [ProfileController::class, 'profile'])->name('Profile');
    Route::get('/profile', [ProfileController::class, 'profile'])->name('Profile');

    // Profile Requests
    Route::post('/profile/update', [ProfileController::class,'updateProfile']);
    Route::post('/profile/updatedp', [ProfileController::class,'updateDP']);
    Route::post('/profile/updatesign', [ProfileController::class,'updateSign']);
    Route::post('/profile/updatepassword', [ProfileController::class, 'updatePassword']);
});