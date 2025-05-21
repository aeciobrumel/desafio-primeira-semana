<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
    <link
      rel="stylesheet"
      type="text/css"
      href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/regular/style.css"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/fill/style.css"
    />
</head>
<body>
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show floating-alert" role="alert" id="floating-alert">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
        </div>
    @endif
    @if (session('success'))
    <div class="alert alert-success floating-alert mt-2">
        {{ session('success') }}
    </div>
    @endif

    <main>
    @yield('content')
        <x-modal id="login-error-modal" message="Erro no login" />
        <x-modal id="login-success-modal" message="Bem vindo a nossa plataforma!" />
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
      //Script dos modais de sucesso e erro no login
      window.onload = function(){
              @if(session('login-error'))
                  var failedModal = new bootstrap.Modal(document.getElementById('login-error-modal'));
                  failedModal.show();
              @endif

              @if(session('login-success'))
                  var sucessModal = new bootstrap.Modal(document.getElementById('login-success-modal'));
                  sucessModal.show();
              @endif
          }

      //formata cpf
      function formatCPF(input) {
        let value = input.value.replace(/\D/g, ""); // Remove caracteres não numéricos
        value = value.replace(/(\d{3})(\d)/, "$1.$2"); // Adiciona o primeiro ponto
        value = value.replace(/(\d{3})(\d)/, "$1.$2"); // Adiciona o segundo ponto
        value = value.replace(/(\d{3})(\d{1,2})$/, "$1-$2"); // Adiciona o traço
        input.value = value;
        }
        
      //tira a mensagem de erro global
      setTimeout(() => {
      const alert = document.getElementById('floating-alert');
          if (alert) {
              alert.classList.remove('show'); // fade do Bootstrap
              setTimeout(() => alert.remove(), 500); // remove após fade
          }
        }, 3000); // 5 segundos

            //Script para tela de login
            //escutador de evento para o submit do formulário
            // adiciona um escutador de evento para o evento 'DOMContentLoaded'
      document.addEventListener('DOMContentLoaded', function () {
          const form = document.getElementById('login-form');
          // Adiciona um escutador de evento para captar o evento 'submit' do formulário
          form.addEventListener('submit', function (event) {
          // impede envio imediato do formulário
            event.preventDefault(); 
          // Mostra o overlay com spinner e aguarda meio segundo antes de enviar o formulário
            document.getElementById('loading-overlay').style.display = 'flex';
            setTimeout(() => {
                form.submit();
            }, 500); // 500 milissegundos = 0,5 segundos
          });
        });
      //script logout sidebar
      function logoutPost() {
              const formLogout = document.createElement('form');
              formLogout.method = 'POST';
              formLogout.action ='{{route('logout')}}';

              const csrf = document.createElement('input');
              csrf.type = 'hidden';
              csrf.name= '_token';
              csrf.value = '{{csrf_token()}}';

              formLogout .appendChild(csrf);
              document.body.appendChild(formLogout);
              formLogout.submit();
        }
      // botão de rota pro form
      function goTocreateUserForm(){
          const formRouteCreateUser = document.createElement('form');
          formRouteCreateUser.method = 'get';
          formRouteCreateUser.action ='{{route('users.create')}}';
          const csrf = document.createElement('input');
          csrf.type = 'hidden';
          csrf.name= '_token';
          csrf.value = '{{csrf_token()}}';
          formRouteCreateUser .appendChild(csrf);
          document.body.appendChild(formRouteCreateUser);
          formRouteCreateUser.submit();
        }    

      //preview img       
      document.getElementById('photo').addEventListener('change', function (e) {
          const file = e.target.files[0];
          const preview = document.getElementById('avatarPreview');

            if (file && file.type.startsWith('image/')) {
                const reader = new FileReader();

                reader.onload = function (event) {
                    preview.src = event.target.result;
                };

                reader.readAsDataURL(file);
            }
          }); 
  </script>
</body>
</html>