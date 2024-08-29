{{-- resources/views/home/index.blade.php --}}
@extends('layouts.app-master') {{-- Cambia 'layaouts' por 'layouts' --}}

@section('content')
    <h1>Home</h1>

    @auth
        <p>Bienvenido {{ auth()->user()->name ?? auth()->user()->username }}, estás autenticado en la página</p>
        <p>
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="btn btn-link">Logout</button>
            </form>
        </p>
    @endauth

    @guest
        <p>Para ver el contenido <a href="{{ route('login.show') }}">Inicia Sesión</a></p>
    @endguest
@endsection
