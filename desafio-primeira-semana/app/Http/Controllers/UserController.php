<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //listar usuarios na home
    public function userList(){
        
    $users = DB::select('select * from users');

    return view('homeView', ['users'=> $users]);//passo todos os usuários pra home
}
}