<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //listar usuarios na home
    public function userList(){
    $users = DB::select('select * from users'); //seleciono todos os users do banco
    return view('homeView', ['users'=> $users]);//passo todos os usuários pra home
    }
//criar um novo usuário
    public function storeUser(Request $request){
        //validando os campos
        $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6|same:confirm_password',
        'confirm_password' => 'required',
        'permission' => 'required|in:1,2,3',
        ]);
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $permission = $request->input('permission');

        $newUser = new User();
        $newUser->name = $name;
        $newUser->email = $email;
        $newUser->password = Hash::make($password);
        $newUser->permission_level = $permission;
        $newUser->save();
        return redirect()->route('home')->with('success', 'Usuário cadastrado com sucesso!');
    }
    public function editUser ($id){
        $user = User::findOrFail($id);
        return view('users.update', compact('user'));
    }
    public function updateUser(Request $request, $id){
        $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $id, 
        'permission' => 'required|in:1,2,3',
        ]);
        $user = User::findOrFail($id);//busca o usuario
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->permission_level = $request->input('permission');
        if ($request->filled('password')) {
            $request->validate([
                'password' => 'min:6|same:confirm_password',
                'confirm_password' => 'required',
            ]);
            $user->password = Hash::make($request->input('password'));
        }
        // Salva no banco
        $user->save();
        // Redireciona com mensagem
        return redirect()->route('home')->with('success', 'Usuário atualizado com sucesso!');
    }
    //deleta usuario
    public function destroy($id){
       // $user = User::findOrFail($id);
        User::destroy($id);

        return redirect()->route('home')->with('sucess', 'Usuário deletado com sucesso!');
    }
        //rota para criar usuario
    public function showCreateForm(){
            return view('users.create');
    }
}
