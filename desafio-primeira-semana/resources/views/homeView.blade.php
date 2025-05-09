
@extends('layout')


@section('content')

<section class="background-login container-fluid">

<div class="container-home">
    <x-sidebar/>
    <div class="home-right">
        <h1>lista de usuarios: +++</h1>
        <div class="card card-user">
             <div class="card-user-content">
                <div class="card-user-left">
                    <div class="card-user-img">
                        <img src="{{asset ('img/user-white.svg')}}" alt="">
                    </div>
                    <div class="card-user-data">
                        <div class="card-user-data-nome"> jorel</div>
                        <div class="card-user-data-email">jorel@gmail.com</div>
                    </div>
                </div>
                <div class="card-user-right">
                    <button class="btn-edit-user"><img src="{{asset('img/trash.svg')}}" alt=""></button>
                    <button class="btn-delete-user"><img src="{{asset('img/note-pencil.svg')}}" alt=""></button>
                </div>
            </div>
        </div>

    </div>
</div>

</section>
@endsection


