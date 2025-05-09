
@extends('layout')


@section('content')

<section class="background-login container-fluid">









<div class="container-home">
    <div class="home-left">
        <img class="edus-logo-img" src="{{asset ('img/edus-logo.svg')}}" alt="">

        <nav class="nav-items">
            <button class="button-nav-left">
                <img src="{{asset ('img/house.svg')}}" alt="">
            </button>
            <button class="button-nav-left btn-logout" onclick="logoutPost()" >
                <img src="{{asset ('img/sign-out.svg')}}" alt=""> 
            </button>
        </nav>

    </div>
    <div class="home-right">

    </div>
  

</div>
    <!--modal sucesso no login-->
    <x-modal id="login-success-modal" message="Bem vindo a nossa plataforma!" />
</section>
<script>
   
        





</script>

@endsection


