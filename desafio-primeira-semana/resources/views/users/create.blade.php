
@extends('layout')


@section('content')

<section class="background-login container-fluid">

<div class="container-home">
    <x-sidebar/>
    <div class="home-right">
        <div class="userlist-section-content-header"> 
            <img class="user-three-img" src="{{asset('img/users-three.svg')}}" alt="">
            <h1>Usuários</h1>
            <button class="btn-add-arrow-left" onclick="window.location='{{route('home')}}'">
                <img id='arrow-left-img' class="plus-img" src="{{asset('img/arrow-left.svg')}}" alt="">
            </button>
         </div>
         <form class="form-cadastro" id="form-cadastro" method='post' action="{{route ('users.store')}}">
         @csrf
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Nome:</span>
                <input name="name" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Email:</span>
                <input name="email" type="email" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
            </div>
            <div class="row">
                <div class="input-group mb-3 col">
                    <span class="input-group-text" id="inputGroup-sizing-default">Senha:</span>
                    <input name="password" type="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
                <div class="input-group mb-3 col">
                    <span class="input-group-text" id="inputGroup-sizing-default">confirmar senha:</span>
                    <input name="confirm_password" type="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
            </div>
            <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupSelect01">Permissão:</label>            
            <select name="permission" class="form-select" id="inputGroupSelect01">        
                    <option selected></option>
                    <option value="1">Admin</option>
                    <option value="2">Docente</option>
                    <option value="3">Aluno</option>
            </select>
            </div>
            <button type="submit" class="btn btn-primary">enviar</button>
        </form>
    </div>
</div>

</section>
@endsection


