
@extends('layout')
@section('content')
<section class="background-login container-fluid">
    <div class="container-home">
        <x-sidebar/>
        <div class="home-right">
            <x-header-store-user title='Novo usuário' />
            @include('users.partials.form')
        </div>
    </div>
</section>
@endsection


