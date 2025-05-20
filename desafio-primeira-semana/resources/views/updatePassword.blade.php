@extends('layout')
@section('content')
<section class="background-section container-fluid">
    <div class="container-fluid">
        <div class="container-login container">
            <img src="{{ asset('img/eja-logo.png')}}" id="eja-logo-login" alt="..." style='width: 150px; '>
            <form class="form-login" id="passwordUpdate" method='post' action="{{ route ('password.update')}}">
                @csrf
                @method('PUT')
                <b class="text-center">Você precisa alterar sua senha </b>
                <div class="form-group">
                    <input type="password" name="password" class="form-control form-control-sm" id="exampleInputPassword1" placeholder="Nova senha" required>
                </div>
                <div class="form-group">
                    <input type="password" name="password_confirmation" class="form-control form-control-sm" id="exampleInputPassword2" placeholder="Repetir nova senha" required>
                </div>
                <button type="submit" class="btn btn-primary">
                    <span id="buttonText">Atualizar Senha</span>    
                </button>
            </form>
        </div>
    </div>
    </div>
</section>
@endsection