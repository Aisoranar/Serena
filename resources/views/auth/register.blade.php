{{-- resources/views/auth/register.blade.php --}}
@extends('layouts.app')

@section('title', 'Registro de Usuario')

@section('content')
<div class="container">
    <h1>Registro</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nombre Completo</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="username">Nombre de Usuario</label>
            <input type="text" name="username" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Correo Electrónico</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password_confirmation">Confirmar Contraseña</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Registrar</button>
    </form>

    <a href="{{ route('login.show') }}">¿Ya tienes una cuenta? Inicia sesión aquí</a>
</div>
@endsection
