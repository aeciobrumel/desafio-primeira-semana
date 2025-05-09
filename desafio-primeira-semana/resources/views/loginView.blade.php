@extends('layout')
@section('content')
<section class="background-section container-fluid">
    <div class="img-sesc">
        <img src="{{ asset('img/sesc-logo.png')}}" alt="...">
    </div>
    <div class="container-fluid">
        <div class="container-login container">
            <img src="{{ asset('img/eja-logo.png')}}" id="eja-logo-login" alt="..." style='width: 150px; '>
            <form class="form-login" id="login-form" method='post' action="{{ route ('authenticate')}}">
                @csrf
                <p class="text-center">FAÇA SEU LOGIN</p>
                <div class="form-group">
                    <input type="email" name="email" class="form-control form-control-sm" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="LOGIN" required>
                </div>
                <div class="form-group">
                    <input type="password"  name="password" class="form-control form-control-sm" id="exampleInputPassword1" placeholder="SENHA" require>
                </div>
                <button type="submit" class="btn btn-primary">
                    <span id="buttonText">Acesse agora</span>    
                </button>
                <a href="#">Esqueci meu e-mail ou senha</a>
            </form>
        </div>
    </div>

    <x-modal id="login-error-modal" message="Erro no login" />
    
    <div id="loading-overlay" style="
        display: none;
        position: fixed;
        z-index: 9999;
        top: 0; left: 0;
        width: 100vw;           
        height: 100vh;
        background: rgba(0, 0, 0, 0.4);
        backdrop-filter: blur(2px);
        align-items: center;
        justify-content: center;
    
    ">
        <div class="spinner-border text-light" role="status" style="width: 3rem; height: 3rem;">
            <span class="visually-hidden">Carregando...</span>
        </div>
    </div>

</section>

@endsection
