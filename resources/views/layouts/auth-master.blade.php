{{-- resources/views/layouts/auth-master.blade.php --}}
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
<body class="bg-gradient-to-r from-green-500 via-blue-500 to-blue-700 min-h-screen flex items-center justify-center">

    <div class="w-full max-w-md bg-white shadow-lg rounded-lg p-6 animate-fade-in">
        <div class="text-center mb-6">
            <a href="{{ url('/') }}" class="text-4xl font-extrabold text-black">
                <i class="fas fa-graduation-cap text-black"></i> SERENA
            </a>
        </div>

        @yield('content')
    </div>

</body>
</html>
