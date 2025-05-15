
@extends('layout')


@section('content')

<section class="background-login container-fluid">

<div class="container-home">
    <x-sidebar/>
    <div class="home-right">
        <div class="userlist-section-content-header"> 
            <button class="btn-add-arrow-left" onclick="window.location='{{route('home')}}'">
                <img id='arrow-left-img' class="plus-img" src="{{asset('img/arrow-left.svg')}}" alt="">
            </button>    
            <h2>Novo usuário</h2>
            <img class="user-three-img" src="{{asset('img/users-three.svg')}}" alt="">
        </div>
        @include('users.partials.form')
    </div>
</div>

</section>
@endsection


