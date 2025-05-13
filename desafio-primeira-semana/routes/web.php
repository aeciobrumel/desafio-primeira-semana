<?php
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Auth\Middleware\Authorize;
use App\Http\Middleware\HasAdminPermission;
use App\Http\Middleware\HasModeradorPermission;

//ROTA de login
Route::get('/',[LoginController::class, 'login'])->name ('login');
Route::post('/login', [LoginController::class, 'authenticate']) -> name ('authenticate');

//Middleware Auth para segurança
Route::middleware(['auth'])->group(function(){
        //passando lista de usuários para home
        Route::get('/home', [UserController::class, 'userList'])->name ('home');
        //rota para ir para cadastrar usuário


        //crud
        Route::middleware(['group-name'])->group(function () {

          // ...
      
      });
        Route::get('/users/create', [UserController::class,'showCreateForm']) -> name ('users.create');
        Route::get('/users/{id}/edit',[UserController::class,'editUser']) -> name ('users.edit');
        Route::put('/users/{id}',[UserController::class,'updateUser']) ->name('users.update');
        Route::delete('/users/{id}',[UserController::class,'destroy'])->name('users.destroy');


          //criando usuarios
        Route::post('/users', [UserController::class, 'storeUser'])->name ('users.store');
        //rota de logout do usuário
        Route::post('/logout', [LoginController::class,'logout']) -> name ('logout');
});



