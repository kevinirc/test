<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\ReadController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SpeakController;
use App\Http\Controllers\WatchController;
use App\Http\Controllers\ListenController;
use App\Http\Controllers\DiscussionController;
use App\Http\Controllers\LectureReadController;
use App\Http\Controllers\StudentReadController;
use App\Http\Controllers\AdminCommentController;
use App\Http\Controllers\AdminDiscussController;
use App\Http\Controllers\LectureSpeakController;
use App\Http\Controllers\LectureWatchController;
use App\Http\Controllers\StudentSpeakController;
use App\Http\Controllers\StudentWatchController;
use App\Http\Controllers\LectureListenController;
use App\Http\Controllers\StudentListenController;


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

Route::get('/about', function () {
    return view('about');
});


Route::get('/',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'authenticate']);
Route::post('/logout',[LoginController::class,'logout']);



//Route::get('/listen', function () {
   // return view('dashboard.listen.index');
//});

/*
Route::get('/watch', function () {
    return view('dashboard.watch.index');
});
*/



Route::group(['middleware' => ['auth','admin']], function () {
    Route::get('/admin-dashboard', function () {
        return view('dashboard.index');
    });
    Route::resource('/listen', ListenController::class);
    Route::resource('/watch', WatchController::class);
    Route::resource('/read', ReadController::class);
    Route::resource('/speak', SpeakController::class);
    Route::resource('/discuss', AdminDiscussController::class);
    Route::resource('/user', UserController::class);
    Route::resource('/comment', AdminCommentController::class);
});

Route::group(['middleware' => ['auth', 'mahasiswa']], function () {
    Route::get('/student-dashboard', function () {
        return view('mahasiswa.dashboard.index');
    });
    Route::resource('/student-listen',StudentListenController::class);
    Route::resource('/student-watch',StudentWatchController::class);
    Route::resource('/student-read',StudentReadController::class);
    Route::resource('/student-speak',StudentSpeakController::class);
});

Route::group(['middleware' => ['auth', 'dosen']], function () {
    Route::get('/lecture-dashboard', function () {
        return view('dosen.dashboard.index');
    });
    Route::resource('/lecture-listen',LectureListenController::class);
    Route::resource('/lecture-watch',LectureWatchController::class);
    Route::resource('/lecture-read',LectureReadController::class);
    Route::resource('/lecture-speak',LectureSpeakController::class);
});
