{{-- resources/views/layouts/app-main.blade.php --}}
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SERENA')</title>
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-gray-100 text-gray-900">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-md fixed w-full z-50">
        <div class="container-fluid">
            <a class="navbar-brand text-3xl font-bold text-black flex items-center" href="{{ url('/') }}">
                <i class="fas fa-graduation-cap text-black mr-2"></i> SERENA
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-black hover:text-blue-600 transition-all duration-300" href="{{ route('home') }}">Inicio</a>
                    </li>
                    @auth
                        <li class="nav-item">
                            <a class="nav-link text-black hover:text-blue-600 transition-all duration-300" href="{{ route('students.index') }}">Estudiantes</a>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="btn nav-link text-black hover:text-blue-600 transition-all duration-300">Cerrar sesión</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link text-black hover:text-blue-600 transition-all duration-300" href="{{ route('login.show') }}">Ingresar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-black hover:text-blue-600 transition-all duration-300" href="{{ route('register.show') }}">Registrarse</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="pt-24 container mx-auto px-4">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.9.1/cdn.min.js"></script>
</body>
</html>
