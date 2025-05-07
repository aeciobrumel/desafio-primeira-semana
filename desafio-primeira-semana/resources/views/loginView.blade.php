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
    <!--modal erro -->
    <div class="modal fade" id="login-error-modal" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close btn-modal" data-bs-dismiss="modal" aria-label="Fechar">
                        <img src="{{ asset('img/x-circle.svg') }}" alt="">
                    </button>
                </div>
                <div class="modal-body">
                    <p>Erro no login</p>
                </div>
               
            </div>
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

    <script>
        //verifica se existe a session de erro
        window.onload = function(){
            @if(session('login-error'))
                var failedModal = new bootstrap.Modal(document.getElementById('login-error-modal'));
                failedModal.show();
            @endif
        }
            //escutador de evento para o submit do formulário
            // adiciona um escutador de evento para o evento 'DOMContentLoaded'
            document.addEventListener('DOMContentLoaded', function () {
                const form = document.getElementById('login-form');
                // Adiciona um escutador de evento para o evento 'submit' do formulário
                form.addEventListener('submit', function (event) {
                    // impede envio imediato do formulário
                    event.preventDefault(); 
                    
                    // Desabilita botão para evitar múltiplos envios
                    const submitButton = form.querySelector('button[type="submit"]');
                    submitButton.disabled = true

                            // Mostra o overlay
                    // Aguarda 1 segundo antes de enviar o formulário e mostra o overlay  com spinner
                    document.getElementById('loading-overlay').style.display = 'flex';
                            setTimeout(() => {
                                form.submit();
                            }, 500); // 500 milissegundos = 0,5 segundos
                });
            });
        
    </script>
</section>

@endsection
