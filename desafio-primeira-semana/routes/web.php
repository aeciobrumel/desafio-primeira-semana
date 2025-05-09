<?php
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;



//ROTA de login
Route::get('/',[LoginController::class, 'login'])->name ('login');
Route::post('/login', [LoginController::class, 'authenticate']) -> name ('authenticate');

//Middleware Auth para segurança
Route::middleware(['auth'])->group(function(){
   
    //passando lista de usuários para home
   Route::get('/home', [UserController::class, 'userList'])->name ('home');

    //rota de logout do usuário
    Route::post('/logout', [LoginController::class,'logout']) -> name ('logout');


});



