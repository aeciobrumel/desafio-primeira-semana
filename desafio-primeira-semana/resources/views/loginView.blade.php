@extends('layout')
@section('content')


            <div class="container">
                    <form method='post' action="{{ route ('authenticate')}}">
                        @csrf
                        <b>login</b>
                        <input type="text" name="email" required>
                        <input type="password" name="password" required>
                        <button type="submit" class="btn">Enviar</button>
                </form>
            </div>
   

     @endsection
