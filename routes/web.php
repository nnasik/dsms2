<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\MailController;

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

    // User Account
    Route::get('/users', [UsersController::class,'users'])->name('Users');
    Route::get('/user/view/{id}', [UsersController::class,'view'])->name('User');

    // User Account Requests
    Route::post('/user/update', [UsersController::class,'updateUser']);
    Route::post('/user/updatedp', [UsersController::class,'updateDP']);
    Route::post('/user/updatesignature', [UsersController::class,'updateSignature']);
    Route::post('/user/resetpassword', [UsersController::class,'resetPassword']);
    Route::post('/user/addpermission', [UsersController::class,'addPermission']);
    Route::post('/user/rempermission', [UsersController::class,'remPermission']);
    Route::post('/user/activateuser', [UsersController::class,'activateUser']);

    // Mail
    Route::get('/mail', [MailController::class,'dashboard'])->name('Mail');
    Route::get('/mail/mails-all', [MailController::class,'allMails'])->name('All Mail');
    Route::get('/mail/mails-new', [MailController::class, 'newMails'])->name('New Mail');
    Route::get('/mail/mails-due', [MailController::class, 'dueMails'])->name('Due Mail');
    Route::get('/mail/mails-overdue', [MailController::class,'overdueMails'])->name('Over Due Mail');
    Route::get('/mail/mails-replied', [MailController::class,'repliedMails'])->name('Replied Mail');
    Route::get('/mail/mails-temporary-replied', [MailController::class,'temporaryRepliedMails'])->name('Temporary Replied Mail');
    Route::get('/mail/new', [MailController::class,'new'])-> name('New Mail');
    Route::get('/mail/view/{id}', [MailController::class,'view'])-> name('New Mail');

    // Mail Requests
    Route::post('/mail/add', [MailController::class,'add']);
    Route::post('/mail/update', [MailController::class,'update']);
    Route::post('/mail/assign', [MailController::class,'assign']);
    Route::post('/mail/updatereply', [MailController::class,'update_reply']);
    Route::post('/mail/upload', [MailController::class,'uploadDocument']);
    Route::post('/mail/uploadreply', [MailController::class,'upload_reply_document']);
});