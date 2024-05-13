<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\FrontPageController;

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

Auth::routes();

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

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
    Route::get('/ajax/user-autocomplete-search', [UsersController::class,'selectSearch']);

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
    Route::get('/mail/mails-non-assigned', [MailController::class,'nonAssignedMails'])->name('Non Assigned Mails');
    Route::get('/mail/mails-temporary-replied', [MailController::class,'temporaryRepliedMails'])->name('Temporary Replied Mail');
    Route::get('/mail/new', [MailController::class,'new'])-> name('New Mail');
    Route::get('/mail/view/{id}', [MailController::class,'view'])-> name('New Mail');
    Route::get('/ajax/mail-search', [MailController::class,'mailSearch']);

    // Mail Requests
    Route::post('/mail/add', [MailController::class,'add']);
    Route::post('/mail/update', [MailController::class,'update']);
    Route::post('/mail/assign', [MailController::class,'assign']);
    Route::post('/mail/subject', [MailController::class,'assignSubjectOfficer']);
    Route::post('/mail/updatereply', [MailController::class,'update_reply']);
    Route::post('/mail/upload', [MailController::class,'uploadDocument']);
    Route::post('/mail/uploadreply', [MailController::class,'upload_reply_document']);

    // Reservations
    Route::get('/reservations', [ReservationController::class,'reservations'])->name('reservation.index');
    Route::get('/reservations/json', [ReservationController::class,'json'])->name('reservation.json');
    Route::get('/reservation/new', [ReservationController::class,'new'])->name('News');
    Route::post('/reservation/store', [ReservationController::class,'store'])->name('reservation.store');

    // Blog
    Route::get('/blog', [BlogController::class,'posts'])->name('DSKPW Blog');
    Route::get('/blog/post/{id}', [BlogController::class,'post'])->name('Post');
    Route::get('/blog/event/{id}', [BlogController::class,'event'])->name('Post');
    Route::post('/blog/create', [BlogController::class,'create_post']);
    Route::post('/blog/createevent', [BlogController::class,'create_event']);
    Route::post('/blog/publishpost', [BlogController::class,'publish_post']);
    Route::post('/blog/publishevent', [BlogController::class,'publish_event']);
    Route::post('/blog/uploadmedia', [BlogController::class,'upload_media']);
    Route::post('/blog/postcomment', [BlogController::class,'post_comment']);
    Route::post('/blog/likepost', [BlogController::class,'like_post']);
    Route::post('/blog/unlikepost', [BlogController::class,'unlike_post']);

    // Template
    Route::get('/template', [TemplateController::class,'index'])->name('letter.templates');

    Route::get('/frontpage', [FrontPageController::class,'index'])->name('frontpage.index');
    Route::get('/frontpage/pdf/{id}', [FrontPageController::class,'generatePDF'])->name('frontpage.pdf');
    Route::post('/frontpage/store/subjectfile', [FrontPageController::class,'storeSubjectFile'])->name('frontpage.store.subjectfile');
    Route::post('/frontpage/store/personalfile', [FrontPageController::class,'storePersonalFile'])->name('frontpage.store.personalfile');
    
    
});