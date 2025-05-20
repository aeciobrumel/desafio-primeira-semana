
<form class="form-cadastro" id="form-cadastro" method='post' action="{{isset($user) ? route('users.update', $user->id) : route('users.store')}}" enctype="multipart/form-data" >
    @csrf
    @if(isset($user))
        @method('PUT')
    @endif
    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">Nome:</span>
        <input name="name" value="{{ old('name', $user->name ?? '' )}}" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    </div>
    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">Email:</span>
        <input name="email" value="{{old('email', $user->email ?? ' ') }}" type="email" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    </div>
    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">cpf:</span>
        <input id="cpf" oninput="formatCPF(this)" maxlength=14 placeholder="000.000.000-00" name="cpf" value="{{old('cpf', isset($user) ? $user->getCpfFormattedAttribute() : '') }}" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"  required>
    </div>
    <div class="row">
        <div class="input-group mb-3 col">
            <span class="input-group-text" id="inputGroup-sizing-default">Senha:</span>
            <input name="password" type="password" class="form-control">              
        </div>
        <div class="input-group mb-3 col">
            <span class="input-group-text" id="inputGroup-sizing-default">confirmar senha:</span>
            <input name="confirm_password" type="password" class="form-control">               
        </div>
        <div class="input-group mb-3 col">
            <label class="input-group-text" for="inputGroupSelect01">Permissão:</label>            
            <select name="permission" class="form-select" id="inputGroupSelect01">
                    <option value="" disabled {{ old('permission', isset($user) ? $user->permission_level : '') == '' ? 'selected' : '' }}>
                    Selecione...
                    </option>
                    @foreach($permissions as $permission)
                    <option value="{{$permission->value}}" {{old('permission', isset($user) ? $user->permission_level : '')==$permission->value ? 'selected' : '' }}>
                        {{ $permission -> name }}
                    </option>
                    @endforeach
            </select>
        </div>
    </div>
    <div class="input-group mb-3 col">
        <span class="input-group-text" id="inputGroup-sizing-default">Foto:</span>
        <input name="photo" type="file" class="form-control" accept="image/*">
    </div>
    <div class="container-btn">
        <button type="submit" class="btn btn-primary btn-enviar-usuario">
        {{ isset($user) ? 'Editar usuário' : 'Cadastrar usuário'}}
        </button>
    </div>
</form>