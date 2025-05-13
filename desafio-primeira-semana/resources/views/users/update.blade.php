
@extends('layout')


@section('content')

<section class="background-login container-fluid">

<div class="container-home">
    <x-sidebar/>
    <div class="home-right">
        <div class="userlist-section-content-header"> 
            <button class="btn-add-arrow-left" onclick="window.location='{{route('home')}}'">
                <img id='arrow-left-img' class="plus-img" src="{{asset('img/arrow-left.svg')}}" alt="">
            </button>
            <h2>Editar {{$user->name}}</h2>
            <img class="user-three-img" src="{{asset('img/users-three.svg')}}" alt="">

        </div>
        <form class="form-cadastro" id="form-cadastro" method='post' action="{{route ('users.update', $user->id)}}">
        @csrf
        @method('PUT')
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Nome:</span>
                <input name="name" value="{{ $user -> name}}" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Email:</span>
                <input name="email" value="{{ $user -> email }}" type="email" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
            </div>
            <div class="row">
                <div class="input-group mb-3 col">
                    <span class="input-group-text" id="inputGroup-sizing-default">Senha:</span>
                    <input name="password" type="password" class="form-control">                
                </div>
                <div class="input-group mb-3 col">
                    <span class="input-group-text" id="inputGroup-sizing-default">confirmar senha:</span>
                    <input name="confirm_password" type="password" class="form-control">               
                </div>
                <div class="input-group mb-3 col">
                    <label class="input-group-text" for="inputGroupSelect01">Permissão:</label>            
                    <select name="permission" class="form-select" id="inputGroupSelect01">
                        <option value="1" {{ $user->permission_level == 1 ? 'selected' : '' }}>Admin</option>
                        <option value="2" {{ $user->permission_level == 2 ? 'selected' : '' }}>Docente</option>
                        <option value="3" {{ $user->permission_level == 3 ? 'selected' : '' }}>Aluno</option>
                    </select>
                </div>
            </div>
            <div class="container-btn">
              <button type="submit" class="btn btn-primary btn-enviar-usuario">Editar usuário</button>
            </div>
        </form>
    </div>
</div>

</section>
@endsection


