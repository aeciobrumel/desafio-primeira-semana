
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
            <div class="userlist-header-left">
                <img class="user-three-img" src="{{asset('img/users-three.svg')}}" alt="">
                <h1>Usuários</h1>
                @if(in_array($logged -> permission_level,[ PermissionLevel::ADMIN , PermissionLevel::DOCENTE]))
                    <button class="btn-add-user  " onclick="goTocreateUserForm()">
                        <img id='add-user' class="plus-img padraofundo" src="{{asset('img/plus.svg')}}" alt="">
                    </button>
                @endif
            </div>
            <div class="userlist-header-right">
                 @impersonating
                    <div class="text-impersonate-user">             
                        <div>parar visualização como {{ Auth::user()->name }}</div>
                    </div>
                    <a href="{{ route('impersonate.leave') }}" class="impersonate-user-leave-container">
                        <img id='impersonate-user-leave' class="impersonate-user-leave" src="{{asset('img/eye-slash.svg')}}" alt="">
                    </a>
                 @endImpersonating
            </div>
        </div>
        <div class="userlist-users">
            @foreach($users as $user)
                    <x-card-user 
                        :userName="$user->name" 
                        :userEmail="$user->email" 
                        :userId="$user->id"
                        :permission="$logged->permission_level"
                        :photo="$user->photo_url"
                    />
            @endforeach
        </div>
    </div>
</div>
</section>
@endsection
<!--
 docker compose exec laravel php artisan storage:link
-->



