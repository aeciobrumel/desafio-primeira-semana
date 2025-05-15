<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserUpdateStoreRequest;
use App\Enums\PermissionLevel;


class UserController extends Controller
{
    //listar usuarios na home
    public function userList(){
        $users = User::all(); //seleciono todos os users do banco
        return view('homeView', ['users'=> $users]);//passo todos os usuários pra home
    }
//criar um novo usuário
    public function storeUser(UserUpdateStoreRequest $request){
        //validando os campos
        $input = $request->validated();
        $newUser = new User();
        $newUser->name = $input['name'];
        $newUser->email = $input['email'];
        $newUser->password = Hash::make($input['password']);
        $newUser->permission_level = $input['permission'];
        $newUser->save();
        return redirect()->route('home')->with('success', 'Usuário cadastrado com sucesso!');
    }
    public function editUser ($id){
        $user = User::findOrFail($id);
        $permissions = PermissionLevel::cases();
        return view('users.update', compact('user','permissions'));
    }
    public function updateUser(UserUpdateStoreRequest $request, $id){
         $input = $request->validated();
        $user = User::findOrFail($id);//busca o usuario
        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->permission_level = $input['permission'] ;
        if (!empty($input['password'])) {
              $user->password= Hash::make($input['password']);
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
        return redirect()->route('home')->with('success', 'Usuário deletado com sucesso!');
    }
        //rota para criar usuario
    public function showCreateForm(){
       $permissions = PermissionLevel::cases();
        return view('users.create',compact('permissions'));
    }
}
