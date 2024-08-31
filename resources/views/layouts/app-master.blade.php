{{-- resources/views/layouts/app-master.blade.php --}}
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SERENA')</title>
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Animaciones personalizadas */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .animate-fade-in {
            animation: fadeIn 1.5s ease-in-out;
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-900">

    <!-- Navbar -->
    <nav class="bg-white shadow-md fixed w-full z-50">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <a href="{{ url('/') }}" class="text-3xl font-bold text-black">
                <i class="fas fa-graduation-cap text-black"></i> SERENA
            </a>
            <div class="hidden md:flex space-x-6">
                <a href="{{ route('home') }}" class="text-black hover:text-blue-600 transition-all duration-300">Inicio</a>
                @auth
                    <a href="{{ route('students.index') }}" class="text-black hover:text-blue-600 transition-all duration-300">Estudiantes</a>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-black hover:text-blue-600 transition-all duration-300">Cerrar sesión</button>
                    </form>
                @else
                    <a href="{{ route('login.show') }}" class="text-black hover:text-blue-600 transition-all duration-300">Ingresar</a>
                    <a href="{{ route('register.show') }}" class="text-black hover:text-blue-600 transition-all duration-300">Registrarse</a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="pt-20">
        @yield('content')
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.9.1/cdn.min.js"></script>
</body>
</html>
