
@extends('layout')


@section('content')
@php
    use App\Enums\PermissionLevel;
@endphp

<section class="background-login container-fluid">

<div class="container-home">
    <x-sidebar/>
    <div class="home-right">
        <div class="userlist-section-content-header"> 
            <img class="user-three-img" src="{{asset('img/users-three.svg')}}" alt="">
            <h1>Usuários</h1>
            @if(in_array($logged->permission_level,[PermissionLevel::ADMIN , PermissionLevel::DOCENTE]))
                <button class="btn-add-user" onclick="goTocreateUserForm()">
                    <img id='add-user' class="plus-img" src="{{asset('img/plus.svg')}}" alt="">
                </button>
            @endif

        </div>
        <div class="userlist-users">
            @foreach($users as $user)
                    <x-card-user 
                        :userName="$user->name" 
                        :userEmail="$user->email" 
                        :userId="$user->id"
                        :permission="$logged->permission_level"
                    />
            @endforeach
        </div>
    </div>
</div>

</section>
@endsection


