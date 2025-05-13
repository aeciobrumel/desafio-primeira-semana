
@extends('layout')


@section('content')

<section class="background-login container-fluid">

<div class="container-home">
    <x-sidebar/>
    <div class="home-right">
        <div class="userlist-section-content-header"> 
            <img class="user-three-img" src="{{asset('img/users-three.svg')}}" alt="">
            <h1>Usuários</h1>
            <button class="btn-add-user" onclick="goTocreateUserForm()">
                <img id='add-user' class="plus-img" src="{{asset('img/plus.svg')}}" alt="">
            </button>
         </div>
      <div class="userlist-users">

    @php
        $logged =  Auth::user();
    @endphp
            @foreach($users as $user)
                @if($user->id !== $logged->id)
                    <x-card-user 
                        :userName="$user->name" 
                        :userEmail="$user->email" 
                        :userId="$user->id"
                        :canDo="$logged->permission_level"
                    />
                @endif
            @endforeach
         </div>
    </div>
</div>

</section>
@endsection


