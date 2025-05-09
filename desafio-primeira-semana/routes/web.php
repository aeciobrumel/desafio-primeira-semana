<?php
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;



Route::get('/',[LoginController::class, 'login'])->name ('login');
Route::post('/login', [LoginController::class, 'authenticate']) -> name ('authenticate');


//Middleware Auth para segurança
Route::middleware(['auth'])->group(function(){
    Route::get('/home', function () {

        return view('homeView');
    })->name ('home');


    Route::post('/logout', [LoginController::class,'logout']) -> name ('logout');


});



