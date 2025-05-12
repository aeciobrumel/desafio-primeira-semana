<div class="card card-user">
    <div class="card-user-content">
        <div class="card-user-left">
            <div class="card-user-img">
                <img src="{{ asset('img/user-white.svg') }}" alt="Foto do usuário">
            </div>
            <div class="card-user-data">
                <div class="card-user-data-nome">{{ $userName }}</div>
                <div class="card-user-data-email">{{ $userEmail }}</div>
            </div>
        </div>
        <div class="card-user-right">
            <a class="btn-edit-user"  href="{{route('users.edit', $userId)}}"><img src="{{ asset('img/note-pencil.svg') }}" alt="Editar"></a>
            <form action="{{route ('users.destroy',$userId)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn-delete-user"><img src="{{ asset('img/trash.svg') }}" alt="Excluir"></button>
            </form>
        </div>
    </div>
</div>
