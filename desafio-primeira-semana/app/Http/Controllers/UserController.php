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
use App\Http\Requests\UpdatePasswordRequest;
use App\Enums\PermissionLevel;


class UserController extends Controller
{
    //listar usuarios na home
    public function userList(){
        $logged = Auth::user();
        $permissions = PermissionLevel::cases();

        if($logged->permission_level === PermissionLevel::ADMIN){
            $users = User::where('id', '!=', $logged->id)
                         ->get();
        }        
        elseif($logged->permission_level === PermissionLevel::DOCENTE){
            $users = User::where('id', '!=', $logged->id)
                         ->where('permission_level', '!=', PermissionLevel::ADMIN)
                         ->get();
        }
        else {
            $users = User::where('id', '!=', $logged->id)
                         ->where('permission_level', '=', PermissionLevel::ALUNO)
                         ->get();
        }
        return view('homeView', compact('users', 'logged', 'permissions'));


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
              $user->first_login = true;
        }
        if ($request->hasFile('photo')){
            $photo = $request->file('photo');
            $photo_name = Str::random(10) . '-' . $photo->getClientOriginalName();
            $photoPath = $photo->storeAs('uploads', $photo_name, 'public');
            $user ->photo = $photoPath;
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
    // troca de senha no primeiro login
    public function editPassword(Request $request){
        $user = $request->user();   
        return view('updatePassword', compact('user'));
    }
    public function updatePassword(UpdatePasswordRequest $request){
            $input = $request->validated();
            $user = $request->user();
            $user->password = Hash::make($input['password']);
            $user->first_login = false;
            $user->save();
            $request->session()->regenerate();
            return redirect()->route('home')->with('success', 'Senha atualizada com sucesso!');
    }

}

