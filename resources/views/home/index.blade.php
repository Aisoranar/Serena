@extends('layaouts.app-master')

@section('content')

    <h1>Home</h1>
    
    @auth
        <p>Bienvenido {{auth()->user()->name ?? auth()->user()->username}}, estas autenticado a la pagina</p>

        <p>
            <a href="/logout">Logout</a>
        </p>
    @endauth

    @guest
        <p>Para ver el contenido <a href="/login"> Inicia Sesión</a></p>
    @endguest

@endsection
