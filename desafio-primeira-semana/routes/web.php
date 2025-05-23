<?php
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Auth\Middleware\Authorize;
use App\Http\Middleware\HasPermission;
use App\Enums\PermissionLevel;

//ROTA de login
Route::get('/',[LoginController::class, 'login'])->name ('login');
Route::post('/login', [LoginController::class, 'authenticate']) -> name ('authenticate');
//Middleware Auth para segurança
Route::middleware(['auth'])->group(function(){
        Route::get('/home', [UserController::class, 'userList'])->name ('home');
        Route::get('/users/create', [UserController::class,'showCreateForm'])->name('users.create')->middleware('permission:ADMIN,DOCENTE');
        Route::get('/users/{id}/edit',[UserController::class,'editUser'])->name('users.edit')->middleware('permission:ADMIN,DOCENTE');
        Route::put('/users/{id}',[UserController::class,'updateUser']) ->name('users.update')->middleware('permission:ADMIN,DOCENTE');
        Route::delete('/users/{id}',[UserController::class,'destroy'])->name('users.destroy')->middleware('permission:ADMIN');
        Route::post('/users',[UserController::class, 'storeUser'])->name('users.store');
        Route::post('/logout',[LoginController::class,'logout']) -> name('logout');
        Route::get('/password/change', [UserController::class,'editPassword'])->name('password.edit');
        Route::put('/password/change', [UserController::class,'updatePassword'])->name('password.update');
        Route::impersonate();
});


