
@extends('layout')


@section('content')

<section class="background-login container-fluid">
    <!--modal sucesso-->
    <x-modal id="login-success-modal" message="Bem vindo a nossa plataforma!" />

</section>
<script>
    window.onload = function(){
        @if(session('login-success'))
            var sucessModal = new bootstrap.Modal(document.getElementById('login-success-modal'));
            sucessModal.show();
        @endif
    }
</script>

@endsection


