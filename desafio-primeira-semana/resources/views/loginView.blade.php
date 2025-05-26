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
                    <input id="cpf" oninput="formatCPF(this)" maxlength=14 placeholder="CPF" name="cpf" value="{{ old('cpf', $user->cpf ?? '') }}" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"  required>
                </div>
                <div class="form-group">
                    <input type="password"  name="password" class="form-control form-control" id="exampleInputPassword1" placeholder="SENHA" require>
                </div>
                <button type="submit" class="btn btn-primary padraofundo">
                    <span id="buttonText">Acesse agora</span>    
                </button>
                <a href="#">Esqueci meu e-mail ou senha</a>
            </form>
        </div>
    </div>
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
<script>
      function formatCPF(input) {
        let value = input.value.replace(/\D/g, ""); // Remove caracteres não numéricos
        value = value.replace(/(\d{3})(\d)/, "$1.$2"); // Adiciona o primeiro ponto
        value = value.replace(/(\d{3})(\d)/, "$1.$2"); // Adiciona o segundo ponto
        value = value.replace(/(\d{3})(\d{1,2})$/, "$1-$2"); // Adiciona o traço
        input.value = value;
        }
</script>
@endsection
