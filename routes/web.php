<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BemController;
use App\Http\Controllers\DlmController;
use Illuminate\Support\Facades\Route;


//Data Routes
Route::get('/api/calon_bem', [BemController::class, 'index']);
Route::get('/api/calon_dlm', [DlmController::class, 'index']);


//User Interface Routes

//Auth UI
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/', [AuthController::class, 'login'])->name('/');

//User
//Dashboard
Route::get('/privileged_admin', [UserController::class, 'index'])->name('privileged_admin');
//BEM
Route::get('/privileged_admin/capresma', [UserController::class, 'capresma'])->name('privileged_admin/capresma');
Route::get('/privileged_admin/detail_capresma/{id}', [UserController::class, 'capresmaDetail'])->name('privileged_admin/detail_capresma/{id}');
Route::get('/privileged_admin/add_capresma/', [UserController::class, 'capresmaAddView'])->name('privileged_admin/add_capresma/');
Route::post('/privileged_admin/post_capresma/', [UserController::class, 'capresmaAdd'])->name('privileged_admin/post_capresma/');
Route::post('/privileged_admin/edit_capresma/', [UserController::class, 'capresmaEdit'])->name('privileged_admin/edit_capresma/');
Route::get('/privileged_admin/delete_capresma/{id}', [UserController::class, 'capresmaDelete'])->name('privileged_admin/delete_capresma/{id}');
//DLM
Route::get('/privileged_admin/dlm', [UserController::class, 'dlm'])->name('privileged_admin/dlm');
Route::get('/privileged_admin/detail_dlm/{id}', [UserController::class, 'dlmDetail'])->name('privileged_admin/detail_dlm/{id}');
Route::get('/privileged_admin/add_dlm/', [UserController::class, 'dlmAddView'])->name('privileged_admin/add_dlm/');
Route::post('/privileged_admin/post_dlm/', [UserController::class, 'dlmAdd'])->name('privileged_admin/post_dlm/');
Route::post('/privileged_admin/edit_dlm/', [UserController::class, 'dlmEdit'])->name('privileged_admin/edit_dlm/');
Route::get('/privileged_admin/delete_dlm/{id}', [UserController::class, 'dlmDelete'])->name('privileged_admin/delete_dlm/{id}');


//user routes
//Vote
Route::get('/user/vote', [UserController::class, 'vote'])->name('user/vote');
Route::post('/user/vote/submit', [UserController::class, 'voteProcess'])->name('user/vote/submit');

//Logic Routes
Route::post('/auth/login', [AuthController::class, 'loginProcess'])->name('auth/login');
Route::get('/auth/logout', [AuthController::class, 'logout'])->name('auth/logout');

//route show session
Route::get('/session', function () {
    return session()->all();
});


// require __DIR__.'/auth.php';
