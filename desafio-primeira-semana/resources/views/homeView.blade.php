
@extends('layout')


@section('content')

<section class="background-login container-fluid">



 <!--modal sucesso-->
 <div class="modal fade" id="login-success-modal" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close btn-modal" data-bs-dismiss="modal" aria-label="Fechar">
                        <img src="{{ asset('img/x-circle.svg') }}" alt="">
                    </button>
                </div>
                <div class="modal-body">
                    <p>Seja Bem vindo a nossa plataforma!</p>
                </div>
            </div>
        </div>
    </div>
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


