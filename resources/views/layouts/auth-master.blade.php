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

        /* Custom styles for auth page */
        .auth-container {
            background: rgba(255, 255, 255, 0.9); /* Semi-transparent background */
            border-radius: 1rem; /* Rounded corners */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Subtle shadow */
        }
    </style>
</head>
<body class="bg-gradient-to-r from-green-500 via-blue-500 to-blue-700 min-h-screen flex items-center justify-center">

    <div class="w-full max-w-md auth-container p-6 animate-fade-in">
        <div class="text-center mb-8">
            <a href="{{ url('/') }}" class="text-4xl font-extrabold text-black flex items-center justify-center space-x-2">
                <i class="fas fa-graduation-cap text-4xl text-black"></i>
                <span>SERENA</span>
            </a>
        </div>

        @yield('content')
    </div>

</body>
</html>
