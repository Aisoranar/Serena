{{-- resources/views/layouts/app.blade.php --}}
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
        @keyframes slideUp {
            from { transform: translateY(20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        @keyframes slideIn {
            from { transform: translateX(-20px); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }

        .animate-fade-in {
            animation: fadeIn 1.5s ease-in-out;
        }
        .animate-slide-up {
            animation: slideUp 1.5s ease-in-out;
        }
        .animate-slide-in {
            animation: slideIn 1.5s ease-in-out;
        }

        /* Navbar Styling */
        .navbar {
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            z-index: 50;
        }
        .navbar-link {
            transition: color 0.3s ease;
        }
        .navbar-link:hover {
            color: #2563eb;
        }
        /* Mobile Menu */
        .mobile-menu {
            transform: translateX(-100%);
            transition: transform 0.3s ease-in-out;
            width: 75%;
        }
        .mobile-menu-open {
            transform: translateX(0);
        }
        .mobile-menu-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 40;
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
        }
        .mobile-menu-overlay-open {
            opacity: 1;
        }
        /* Fix scroll issue */
        body.menu-open {
            overflow: hidden;
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-900">

    <!-- Navbar -->
    <nav class="navbar bg-white fixed w-full z-50 top-0 left-0">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <a href="{{ url('/') }}" class="text-3xl font-bold text-blue-900 flex items-center">
                <i class="fas fa-graduation-cap text-blue-600 mr-2"></i> SERENA
            </a>
            <div class="hidden md:flex space-x-6">
                <a href="{{ url('/') }}" class="navbar-link text-blue-900">Inicio</a>
                @auth
                    @if(auth()->user()->role === 'student')
                        <a href="{{ route('students.index') }}" class="navbar-link text-blue-900">Estudiantes</a>
                    @elseif(auth()->user()->role === 'health_professional')
                        <a href="{{ route('healthprofessional.index') }}" class="navbar-link text-blue-900">Profesional de Salud</a>
                    @elseif(auth()->user()->role === 'docent')
                        <a href="{{ route('teachers.index') }}" class="navbar-link text-blue-900">Docentes</a>
                    @endif
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="navbar-link text-blue-900">Cerrar sesión</button>
                    </form>
                @else
                    <a href="{{ route('login.show') }}" class="navbar-link text-blue-900">Ingresar</a>
                    <a href="{{ route('register.show') }}" class="navbar-link text-blue-900">Registrarse</a>
                @endauth
            </div>
            <!-- Mobile menu button -->
            <div class="md:hidden flex items-center">
                <button id="mobile-menu-button" class="text-blue-900 focus:outline-none">
                    <svg class="svg-inline--fa fa-bars text-2xl" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bars" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M0 96C0 78.33 14.33 64 32 64H416C433.7 64 448 78.33 448 96C448 113.7 433.7 128 416 128H32C14.33 128 0 113.7 0 96zM0 256C0 238.3 14.33 224 32 224H416C433.7 224 448 238.3 448 256C448 273.7 433.7 288 416 288H32C14.33 288 0 273.7 0 256zM416 448H32C14.33 448 0 433.7 0 416C0 398.3 14.33 384 32 384H416C433.7 384 448 398.3 448 416C448 433.7 433.7 448 416 448z"></path></svg>
                </button>
            </div>
        </div>
    </nav>

    <!-- Mobile Menu Overlay 
    <div id="mobile-menu-overlay" class="mobile-menu-overlay"></div>-->

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="mobile-menu fixed inset-0 bg-white shadow-lg z-50">
        <div class="flex flex-col h-full">
            <div class="flex justify-between items-center p-4 border-b">
                <a href="{{ url('/') }}" class="text-3xl font-bold text-blue-900 flex items-center">
                    <i class="fas fa-graduation-cap text-blue-600 mr-2"></i> SERENA
                </a>
                <button id="close-menu" class="text-blue-900 text-2xl focus:outline-none">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="flex flex-col items-center py-8">
                <a href="{{ url('/') }}" class="text-blue-900 py-2 text-xl">Inicio</a>
                @auth
                    @if(auth()->user()->role === 'student')
                        <a href="{{ route('students.index') }}" class="text-blue-900 py-2 text-xl">Estudiantes</a>
                    @elseif(auth()->user()->role === 'health_professional')
                        <a href="{{ route('healthprofessional.index') }}" class="text-blue-900 py-2 text-xl">Profesional de Salud</a>
                    @elseif(auth()->user()->role === 'docent')
                        <a href="{{ route('teachers.index') }}" class="text-blue-900 py-2 text-xl">Docentes</a>
                    @endif
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-blue-900 py-2 text-xl">Cerrar sesión</button>
                    </form>
                @else
                    <a href="{{ route('login.show') }}" class="text-blue-900 py-2 text-xl">Ingresar</a>
                    <a href="{{ route('register.show') }}" class="text-blue-900 py-2 text-xl">Registrarse</a>
                @endauth
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="pt-16">
        @yield('content')
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.9.1/cdn.min.js"></script>
    <script>
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const mobileMenuOverlay = document.getElementById('mobile-menu-overlay');
        const closeMenuButton = document.getElementById('close-menu');
        const body = document.body;

        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.add('mobile-menu-open');
            mobileMenuOverlay.classList.add('mobile-menu-overlay-open');
            body.classList.add('menu-open'); // Disable scroll
        });

        closeMenuButton.addEventListener('click', () => {
            mobileMenu.classList.remove('mobile-menu-open');
            mobileMenuOverlay.classList.remove('mobile-menu-overlay-open');
            body.classList.remove('menu-open'); // Enable scroll
        });

        mobileMenuOverlay.addEventListener('click', () => {
            mobileMenu.classList.remove('mobile-menu-open');
            mobileMenuOverlay.classList.remove('mobile-menu-overlay-open');
            body.classList.remove('menu-open'); // Enable scroll
        });
    </script>
</body>
</html>
