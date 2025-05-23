<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use App\Models\User;


class LoginController extends Controller
{
    //carrega a view de login
    public function login(){
        return view('loginView');
    }
    //função que realiza a autenticação do usuário
    public function authenticate(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->validated();
            if(Auth::attempt($credentials)){
                $request->session()->regenerate();
                if(Auth::user()->first_login == true){
                    return redirect()->route('password.edit');
                }
                    return redirect()->intended('home')->with('login-sucess',true);
            }
            return back()
            ->with('login-error',true)
            ->withErrors(['cpf' => 'credenciais inválidas.',])
            ->onlyInput('cpf');
    }
    //logout
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }





}






