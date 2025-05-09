
@extends('layout')


@section('content')

<section class="background-login container-fluid">

<div class="container-home">
    <x-sidebar/>
    <div class="home-right">
        <h1>lista de usuarios: +++</h1>
        @foreach($users as $user)
            <p>nome {{$user->name}}</p>
        @endforeach
     
    </div>
    </div>

</section>
@endsection


