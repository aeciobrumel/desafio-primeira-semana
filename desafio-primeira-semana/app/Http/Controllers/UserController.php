<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\User;
use App\Http\Requests\UserUpdateStoreRequest;
use App\Enums\PermissionLevel;


class UserController extends Controller
{
    //listar usuarios na home
    public function userList(){
        $logged = Auth::user();
        $users = User::where('id', '!=', $logged->id)->get();         
        $permissions = PermissionLevel::cases();
        //seleciono todos os users do banco
        return view('homeView',compact('users', 'logged','permissions'));//passo todos os usuários pra home (menos o logado)
    }        
    //rota para criar usuario
    public function showCreateForm(){
        $logged = Auth::user();
        $permissions = PermissionLevel::cases();
        return view('users.create',compact('permissions', 'logged'));
    }
    //criar um novo usuário
    public function storeUser(UserUpdateStoreRequest $request){
        //validando os campos
        $input = $request->validated();
        $newUser = new User();
        $newUser->name = $input['name'];
        $newUser->email = $input['email'];
        $newUser->cpf = $input['cpf'];
        $newUser->password = Hash::make($input['password']);
        $newUser->permission_level = $input['permission'];
        if($request->hasFile('photo')){
            $photo = $request->file('photo');
            $photo_name = Str::random(10) . '-' . $photo->getClientOriginalName();
            $photoPath = $photo->storeAs('uploads', $photo_name, 'public');
            $newUser->photo = $photoPath;
        }else {
            $newUser->photo = '';
        }
        $newUser->save();
        return redirect()->route('home')->with('success', 'Usuário cadastrado com sucesso!');
    }
    //editar
    public function editUser ($id){
        $user = User::findOrFail($id);
        $permissions = PermissionLevel::cases();
        return view('users.update', compact('user','permissions'));
    }
    //atualizar
    public function updateUser(UserUpdateStoreRequest $request, $id){
         $input = $request->validated();
        $user = User::findOrFail($id);//busca o usuario
        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->cpf = $input['cpf'];
        $user->permission_level = $input['permission'] ;
        if (!empty($input['password'])) {
              $user->password= Hash::make($input['password']);
        }
        if ($request->hasFile('photo')){
            $photo = $request->file('photo');
            $photo_name = Str::random(10) . '-' . $photo->getClientOriginalName();
            $photoPath = $photo->storeAs('uploads', $photo_name, 'public');
            $user ->photo = $photoPath;
        }else {
            $user->photo = '';
        }
        $user->save();
        // Redireciona com mensagem
        return redirect()->route('home')->with('success', 'Usuário atualizado com sucesso!');
    }
    //deleta usuario
    public function destroy($id){
        User::destroy($id);
        return redirect()->route('home')->with('success', 'Usuário deletado com sucesso!');
    }
    
}
