<?php

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;
use App\Http\Controllers\BallController;
use App\Http\Controllers\BlogController;

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ListedJobController;
use App\Http\Controllers\AppliedJobController;

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





Route::redirect('/', 'dashboard');
Route::get("/signIn", function(){
    return view("layouts.sign");
})->name("registerPage");

Route::get("loginPage", function(){
return view("layouts.logIn");
})->name("loginPage");


Route::middleware([
    'auth',
    // 'auth:sanctum',

    // config('jetstream.auth_session'),
    // 'verified',
])->group(function () {

    Route::middleware(["level_middleware"])->group(function () {
        Route::get("addPost", function(){
            return view("layouts.addPost");
        })->name("addPost");

        Route::post("postJob", [ListedJobController::class, 'PostJob'])->name("postJob");
    });



// dashboard start
Route::get('/dashboard',[authController::class, 'dashboard'])->name('dashboard');

Route::group(['prefix'=>"admin", 'middleware'=>"auth_middleware"], function(){

// change Password
Route::get('changePasswordPage', [AdminController::class, 'changePasswordPage'])->name('admin#changePasswordPage');
Route::post("updatePassword", [AdminController::class, 'updatePassword'])->name('admin#updatePassword');

    // Admin List
    Route::get("adminList", [AdminController::class, 'adminList'])->name("admin#adminList");
Route::get("adminDelete/{id}", [AdminController::class, 'adminDelete'])->name("admin#adminDelete");
Route::get("adminToUser/{id}",[AdminController::class, 'adminToUser'])->name("admin#toUser");
Route::get('adminEdit/{id}', [AdminController::class, "adminEdit"])->name("admin#adminEdit");
Route::post("adminUpdate", [AdminController::class, 'adminUpdate'])->name("admin#adminUpdate");

// User List
Route::get("userList", [UserController::class, 'userList'])->name("admin#userList");
Route::get("userToAdmin/{id}",[UserController::class, 'userToAdmin'])->name("admin#toAdmin");


// Contact List
Route::get("contactList", [EmailController::class, 'contactList'])->name("admin#contactList");
Route::get('contactDetails/{id}', [EmailController::class, 'contactDetails'])->name("admin#contactDetails");
Route::get("contactDelete/{id}", [EmailController::class, 'contactDelete'])->name("admin#contactDelete");
Route::get("contactReply/{id}", [EmailController::class, 'contactReply'])->name("admin#contactReply");
Route::post('mailReply', [EmailController::class, 'mailReply'])->name("admin#mailReply");
Route::get('mailList', [EmailController::class, 'mailList'])->name("admin#mailList");
Route::get('replyDelete/{id}', [EmailController::class, 'replyDelete'])->name("admin#replyDelete");

// Blogs List
Route::get("blogList", [BlogController::class, 'blogList'])->name("admin#blogList");
Route::get('addBlogPage', [BlogController::class, 'blogAddPage'])->name('admin#blogAddPage');
Route::post('addBlog', [BlogController::class, 'addBlog'])->name("admin#addBlog");
Route::get("blogDelete/{id}", [BlogController::class, 'blogDelete'])->name("admin#blogDelete");
Route::get("blogDetails/{id}", [BlogController::class, 'blogDetails'])->name('admin#blogDetails');
Route::get('blogEditPage/{id}', [BlogController::class, 'blogEditPage'])->name("admin#blogEditPage");
Route::post("blogUpdate", [BlogController::class, 'blogUpdate'])->name("admin#blogUpdate");

// Job list
Route::get("jobList", [ListedJobController::class, 'jobList'])->name("admin#jobList");
Route::get("addJobPage", [ListedJobController::class, 'addJobPage'])->name("admin#addJobPage");
Route::post("addJob", [ListedJobController::class, 'addJob'])->name("admin#addJob");
Route::get("deleteJob/{id}", [ListedJobController::class, 'deleteJob'])->name('admin#deleteJob');
Route:: get("jobEditPage/{id}", [ListedJobController::class, 'jobEditPage'])->name("admin#jobEditPage");
Route::post("jobUpdate", [ListedJobController::class, 'jobUpdate'])->name("admin#jobUpdate");
Route::get("jobDetails/{id}", [ListedJobController::class, 'jobDetails'])->name("admin#jobDetails");

// applied Job list
Route::get('deleteAppliedJob/{id}/{client_id}/{companyName}', [AppliedJobController::class, 'deleteAppliedJob'])->name("admin#deleteAppliedJob");
Route::get('acceptAppliedJob/{id}/{client_id}/{companyName}', [AppliedJobController::class, 'acceptAppliedJob'])->name("admin#acceptAppliedJob");
});








    Route::middleware(['user_auth_middleware'])->group(function () {
        Route::get("blogUserDetails/{id}", [BlogController::class, 'blogUserDetails'])->name("blogUserDetails");




    Route::get("Client/{error?}/{key?}", [ClientController::class, "GetClient"])->name("getClient");

Route::get("editPasswordPage", [BallController::class, 'editPasswordPage'])->name("editPasswordPage");
Route::post('updatePassword', [BallController::class, 'updatePassword'])->name("updatePassword");
    Route::get("editProfilePage", [BallController::class, 'editProfilePage'])->name("editProfilePage");
    Route::post('postMail', [EmailController::class, 'postMail'])->name("postMail");
    Route::post('postMailContact', [EmailController::class, 'postMailContact'])->name("postMailContact");
    Route::post("editProfile", [BallController::class, "editProfile"])->name("editProfile");
    Route::get("profilePage", [BallController::class, "profilePage"])->name("profilePage");
    Route::get("about", [ClientController::class, "GetAbout"])->name("about");
    Route::get("contact/{error?}", function(){
        return view("layouts.Contact");
    })->name("contact");
    Route::get("blog",[BlogController::class, 'getBlogs'])->name("blog");
    Route::get("services", function(){
        return view("layouts.services");
    })->name("services");
    Route::get('clientAboutJob/{id}', [ListedJobController::class, "GetEachAboutJob"])->name("CAboutJob");
    Route::get("allListedJob", [ListedJobController::class, "GetAllListedJob"])->name("allListedJob");
    Route::get('applyJob/{id}',[ListedJobController::class, 'applyJob'])->name('applyJob');
    Route::get("returnToHome", [ListedJobController::class, "ReturnToHome"])->name("returnHome");

    // Route::post("addingBlog", [BlogController::class, "AddingBlog"])->name("addingBlog");
    Route::get("back", function(){
        return back();
    })->name("back");

    Route::get("getBlogs", [BlogController::class, "getBlogs"]);
    Route::get("replies", [EmailController::class, 'replies'])->name("replies");
    Route::get('MessageDelete/{id}', [EmailController::class, 'MessageDelete'])->name("MessageDelete");
    Route::get('deleteAppliedJobUser/{id}', [AppliedJobController::class, 'deleteAppliedJobUser'])->name("deleteAppliedJobUser");
    });




});

