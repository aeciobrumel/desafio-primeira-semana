@php
    use App\Enums\PermissionLevel;
@endphp
<div class="card card-user">
    <div class="card-user-content">
        <div class="card-user-left">
            <div class="card-user-img">
                <img src="{{ $photo }}" alt="Foto do usuário">
            </div>
            <div class="card-user-data">
                <div class="card-user-data-nome">{{ $userName }}</div>
                <div class="card-user-data-email">{{ $userEmail }}</div>
            </div>
        </div>
        <div class="card-user-right">
        @if(
            $permission === PermissionLevel::ADMIN && !app('impersonate')->isImpersonating()
         ||
          $permission === PermissionLevel::DOCENTE && $userPermissionLevel === PermissionLevel::ALUNO && !app('impersonate')->isImpersonating()
          )
            <a class="btn-impersonate-user"  href="{{route('impersonate', $userId)}}"><img src="{{ asset('img/eye.svg') }}" alt="Ver"></a>
        @endif
        @if(in_array($permission,[PermissionLevel::ADMIN , PermissionLevel::DOCENTE]))
            <a class="btn-edit-user padraofundo"  href="{{route('users.edit', $userId)}}"><img src="{{ asset('img/note-pencil.svg') }}" alt="Editar"></a>
        @endif
        @if($permission === PermissionLevel::ADMIN)
            <form action="{{route ('users.destroy',$userId)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn-delete-user padraofundo"><img src="{{ asset('img/trash.svg') }}" alt="Excluir"></button>
            </form>
        @endif
        </div>
    </div>
</div>
