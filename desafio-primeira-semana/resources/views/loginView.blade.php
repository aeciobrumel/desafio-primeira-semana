@extends('layout')
@section('content')
<section class="background-section container-fluid">
    <div class="container-fluid">
        <div class="container-login container">
            <img src="{{ asset('img/eja-logo.png')}}" alt="..." style='width: 170px; height: 150px;'>
                <form class="form-login" method='post' action="{{ route ('authenticate')}}">
                    @csrf
                    <p class="text-center">FAÇA SEU LOGIN</p>
                    <div class="form-group">
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="LOGIN" required>
                    </div>
                    <div class="form-group">
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="SENHA" require>
                    </div>
                    <button type="submit" class="btn btn-primary">Acesse agora</button>
                </form>
            <a href="#">Esqueci meu e-mail ou senha</a>
        </div>
    </div>
</section>
@endsection
