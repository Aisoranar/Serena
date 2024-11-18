{{-- resources/views/home/index.blade.php --}}
@extends('layouts.app-master')
@section('content')
<div class="bg-gradient-to-b from-blue-900 to-green-500 min-h-screen flex flex-col items-center justify-center text-gray-900">

    <!-- Hero Section -->
<section class="relative bg-blue-900 text-center py-16 px-6 rounded-lg overflow-hidden">
    <!-- Background Gradient -->
    <div class="absolute inset-0 bg-gradient-to-br from-blue-800 to-blue-900 opacity-60 -z-10"></div>

    <!-- Hero Content -->
    <div class="relative z-10 max-w-4xl mx-auto">
        <h1 class="text-5xl font-extrabold text-white mb-6 animate-fade-up">
            Bienvenido a <span class="text-green-600 text-shadow">SERENA</span>
        </h1>
        <p class="text-xl mb-12 max-w-3xl mx-auto text-white leading-relaxed animate-slide-up">
            Una plataforma inteligente para la gestión de estudiantes de UNIPAZ, con el objetivo de optimizar el seguimiento y la inclusión educativa.
        </p>

        <!-- Authenticated User Buttons -->
        @auth
            @if(auth()->user()->role === 'student')
                <a href="{{ route('perfil.editar', ['id' => Auth::id()]) }}" class="bg-green-600 text-white font-semibold py-3 px-8 rounded-full shadow-lg hover:bg-green-500 transition-transform transform hover:scale-105">
                    Ir a Estudiantes
                </a>
            @elseif(auth()->user()->role === 'health_professional')
                <a href="{{ route('home.index') }}" class="bg-green-600 text-white font-semibold py-3 px-8 rounded-full shadow-lg hover:bg-green-500 transition-transform transform hover:scale-105">
                    Ir a Profesionales de la Salud
                </a>
            @elseif(auth()->user()->role === 'docent')
                <a href="{{ route('docente.perfil.show', ['id' => Auth::user()->id]) }}" class="bg-green-600 text-white font-semibold py-3 px-8 rounded-full shadow-lg hover:bg-green-500 transition-transform transform hover:scale-105">
                    Ir a Docentes
                </a>
            @endif
        @else
            <a href="{{ route('login.show') }}" class="bg-green-600 text-white font-semibold py-3 px-8 rounded-full shadow-lg hover:bg-green-500 transition-transform transform hover:scale-105 animate-bounce">
                Iniciar Sesión
            </a>
        @endauth
    </div>

    <!-- Decorative Elements -->
    <div class="absolute bottom-0 inset-x-0 h-20 bg-gradient-to-t from-blue-900 to-transparent rounded-t-[60%]"></div>
</section>

<!-- Add Tailwind CSS Utilities for animations -->
<style>
/* Fade-up animation */
@keyframes fadeUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-fade-up {
    animation: fadeUp 1s ease-out forwards;
}

/* Slide-up animation */
@keyframes slideUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-slide-up {
    animation: slideUp 1s ease-out forwards;
}

/* Bounce animation for buttons */
@keyframes bounce {
    0%, 20%, 50%, 80%, 100% {
        transform: translateY(0);
    }
    40% {
        transform: translateY(-15px);
    }
    60% {
        transform: translateY(-7px);
    }
}

.animate-bounce {
    animation: bounce 2s infinite;
}

/* Text Shadow */
.text-shadow {
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
}
</style>



    <!-- Information Section -->
<section class="container mx-auto mt-16 px-4 animate-slide-up">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
        <!-- Card Component -->
        <div class="bg-white rounded-2xl shadow-lg p-6 flex items-center text-gray-900 hover:bg-gray-50 transition-all duration-300 transform hover:scale-105 hover:shadow-2xl relative overflow-hidden">
            <div class="flex-shrink-0">
                <i class="fas fa-info-circle text-blue-600 text-6xl"></i>
            </div>
            <div class="ml-6">
                <h2 class="text-3xl font-semibold mb-3">Inicio</h2>
                <p class="text-lg mb-4">Descubre la funcionalidad de SERENA, una plataforma diseñada para facilitar el acceso y gestión de información estudiantil.</p>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-lg p-6 flex items-center text-gray-900 hover:bg-gray-50 transition-all duration-300 transform hover:scale-105 hover:shadow-2xl relative overflow-hidden">
            <div class="flex-shrink-0">
                <i class="fas fa-chalkboard-teacher text-green-600 text-6xl"></i>
            </div>
            <div class="ml-6">
                <h2 class="text-3xl font-semibold mb-3">Docentes</h2>
                <p class="text-lg mb-4">Accede a recursos y guías diseñados para docentes, que ayudan en la caracterización y acompañamiento de los estudiantes.</p>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-lg p-6 flex items-center text-gray-900 hover:bg-gray-50 transition-all duration-300 transform hover:scale-105 hover:shadow-2xl relative overflow-hidden">
            <div class="flex-shrink-0">
                <i class="fas fa-user-graduate text-yellow-600 text-6xl"></i>
            </div>
            <div class="ml-6">
                <h2 class="text-3xl font-semibold mb-3">Estudiantes</h2>
                <p class="text-lg mb-4">Conoce las estrategias y consejos para fomentar la inclusión y participación activa en el entorno educativo.</p>
            </div>
        </div>
    </div>
</section>

<!-- Add Tailwind CSS Utilities for animations -->
<style>
/* Slide-up animation */
@keyframes slideUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-slide-up {
    animation: slideUp 0.5s ease-out forwards;
}
</style>


    <!-- About SERENA -->
    <section id="about" class="container mx-auto mt-24 px-4 py-16 bg-gradient-to-r from-blue-50 to-blue-200 rounded-lg shadow-xl max-w-4xl">
        <div class="flex flex-col md:flex-row items-center md:justify-start">
            <div class="flex-shrink-0 mb-8 md:mb-0">
                <i class="fas fa-cogs text-blue-600 text-8xl"></i>
            </div>
            <div class="md:ml-6">
                <h2 class="text-3xl font-extrabold mb-4 text-gray-900 text-center md:text-left">¿Qué es SERENA?</h2>
                <p class="text-lg mb-4 text-gray-800 text-center md:text-left">SERENA es una plataforma web diseñada para gestionar grandes volúmenes de datos estudiantiles, optimizando el manejo de información personal y académica. Sus principales características incluyen:</p>
                <ul class="text-gray-800 mb-6 space-y-2 text-center md:text-left">
                    <li><i class="fas fa-check-circle text-green-600 mr-2"></i> Registro y visualización de información personal de estudiantes.</li>
                    <li><i class="fas fa-check-circle text-green-600 mr-2"></i> Seguimiento de datos y documentación relevante.</li>
                    <li><i class="fas fa-check-circle text-green-600 mr-2"></i> Acceso y gestión de citas y anotaciones por parte de profesionales de la salud.</li>
                    <li><i class="fas fa-check-circle text-green-600 mr-2"></i> Acceso a estadísticas y datos analíticos para mejorar la gestión académica.</li>
                </ul>
                <p class="text-lg text-gray-800 text-center md:text-left">Para más detalles sobre las funcionalidades y el uso de la plataforma, por favor visita las secciones correspondientes una vez inicies sesión.</p>
            </div>
        </div>
    </section>
    
    
    

    <!-- Docentes Section -->
    <section id="docentes" class="container mx-auto mt-24 px-4 py-16 bg-gradient-to-r from-green-50 to-green-200 rounded-lg shadow-xl max-w-4xl">
        <div class="flex flex-col md:flex-row items-center md:justify-start">
            <div class="flex-shrink-0 mb-8 md:mb-0">
                <i class="fas fa-chalkboard-teacher text-green-600 text-8xl"></i>
            </div>
            <div class="md:ml-6">
                <h2 class="text-3xl font-extrabold mb-4 text-gray-900 text-center md:text-left">Sección para Docentes</h2>
                <p class="text-lg mb-4 text-gray-800 text-center md:text-left">La sección de docentes proporciona recursos y guías que les permiten:</p>
                <ul class="text-gray-800 mb-6 space-y-2 text-center md:text-left">
                    <li><i class="fas fa-check-circle text-green-600 mr-2"></i> Acceder a información detallada sobre la caracterización de estudiantes.</li>
                    <li><i class="fas fa-check-circle text-green-600 mr-2"></i> Utilizar herramientas para mejorar la gestión académica y el seguimiento de los estudiantes.</li>
                    <li><i class="fas fa-check-circle text-green-600 mr-2"></i> Conocer estrategias y prácticas para fomentar un entorno inclusivo.</li>
                </ul>
                <p class="text-lg text-gray-800 text-center md:text-left">Los docentes encontrarán materiales y recursos específicos para mejorar sus prácticas educativas y apoyar a sus estudiantes.</p>
            </div>
        </div>
    </section>
    
    

    <!-- Estudiantes Section -->
    <section id="estudiantes" class="container mx-auto mt-24 px-4 py-16 bg-gradient-to-r from-yellow-50 to-yellow-200 rounded-lg shadow-xl max-w-4xl">
        <div class="flex flex-col md:flex-row items-center md:justify-start">
            <div class="flex-shrink-0 mb-8 md:mb-0">
                <i class="fas fa-user-graduate text-yellow-600 text-8xl"></i>
            </div>
            <div class="md:ml-6">
                <h2 class="text-3xl font-extrabold mb-4 text-gray-900 text-center md:text-left">Sección para Estudiantes</h2>
                <p class="text-lg mb-4 text-gray-800 text-center md:text-left">En esta sección se ofrecerán:</p>
                <ul class="text-gray-800 mb-6 space-y-2 text-center md:text-left">
                    <li><i class="fas fa-check-circle text-yellow-600 mr-2"></i> Consejos y estrategias para una participación activa en el aprendizaje.</li>
                    <li><i class="fas fa-check-circle text-yellow-600 mr-2"></i> Recursos y guías para mejorar la inclusión en los círculos académicos.</li>
                    <li><i class="fas fa-check-circle text-yellow-600 mr-2"></i> Acceso a su propia información y la posibilidad de adjuntar documentos relevantes.</li>
                </ul>
                <p class="text-lg text-gray-800 text-center md:text-left">Los estudiantes podrán gestionar su perfil, recibir anotaciones de los profesionales de la salud y acceder a contenido educativo adaptado a sus necesidades.</p>
            </div>
        </div>
    </section>
    
    

    <!-- Contact and Support -->
    <section id="contact" class="container mx-auto mt-24 px-4 py-16 bg-gradient-to-r from-blue-50 to-blue-300 rounded-lg shadow-xl max-w-4xl">
        <div class="flex flex-col md:flex-row items-center md:justify-start">
            <div class="flex-shrink-0 mb-8 md:mb-0">
                <i class="fas fa-envelope text-blue-600 text-8xl"></i>
            </div>
            <div class="md:ml-6">
                <h2 class="text-3xl font-extrabold mb-4 text-gray-900 text-center md:text-left">Contacto y Soporte</h2>
                <p class="text-lg mb-4 text-gray-800 text-center md:text-left">Para cualquier consulta, sugerencia o soporte técnico, por favor contáctanos a:</p>
                <p class="text-lg mb-4 text-gray-800 text-center md:text-left"><strong>Email:</strong> <a href="mailto:support@serena.com" class="text-blue-600 hover:underline">support@serena.com</a></p>
                <p class="text-lg text-gray-800 text-center md:text-left"><strong>Teléfono:</strong> +1 (800) 123-4567</p>
            </div>
        </div>
    </section>
    
    

    <!-- Accessibility Features -->
    <section id="accessibility" class="container mx-auto mt-24 px-4 py-16 bg-gradient-to-r from-gray-50 to-gray-300 rounded-lg shadow-xl max-w-4xl">
        <div class="flex flex-col md:flex-row items-center md:justify-start">
            <div class="flex-shrink-0 mb-8 md:mb-0">
                <i class="fas fa-universal-access text-gray-600 text-8xl"></i>
            </div>
            <div class="md:ml-6">
                <h2 class="text-3xl font-extrabold mb-4 text-gray-900 text-center md:text-left">Accesibilidad</h2>
                <p class="text-lg mb-4 text-gray-800 text-center md:text-left">SERENA se esfuerza por ser accesible para todos los usuarios. Actualmente, la plataforma incluye:</p>
                <ul class="text-gray-800 mb-6 space-y-2 text-center md:text-left">
                    <li><i class="fas fa-check-circle text-gray-600 mr-2"></i> Texto claro y contraste adecuado para mejorar la legibilidad.</li>
                    <li><i class="fas fa-check-circle text-gray-600 mr-2"></i> Compatibilidad con lectores de pantalla para usuarios con discapacidad visual.</li>
                    <li><i class="fas fa-check-circle text-gray-600 mr-2"></i> Opciones de navegación simplificada para mejorar la accesibilidad.</li>
                </ul>
                <p class="text-lg text-gray-800 text-center md:text-left">Estamos en constante desarrollo para incorporar más características de accesibilidad. Si tienes alguna sugerencia, no dudes en contactarnos.</p>
            </div>
        </div>
    </section>
    

<!-- Footer Section -->
<footer class="bg-gradient-to-r from-blue-800 via-blue-900 to-blue-800 text-white py-16 mt-24 rounded-t-3xl border-t-4 border-blue-700 relative overflow-hidden w-full">
    <div class="absolute inset-0 bg-opacity-20 bg-[url('https://www.transparenttextures.com/patterns/white-concrete.png')]"></div>
    <div class="container mx-auto px-6 md:px-12 relative z-10">
        <div class="flex flex-col items-center text-center">
            <!-- Footer Logo and Description -->
            <div class="mb-8">
                <h2 class="text-6xl font-extrabold text-shadow-xl mb-4 text-white">SERENA</h2>
                <p class="text-lg mb-5 leading-relaxed text-gray-200 max-w-2xl mx-auto">
                    Transformando la gestión de datos estudiantiles con innovación, eficiencia y simplicidad.
                </p>
                <p class="text-sm text-gray-300">&copy; 2024 SERENA. Todos los derechos reservados.</p>
                <p class="mt-4 text-sm text-gray-300">
                    Diseño por: 
                    <a href="https://www.linkedin.com/in/aisoranar/" target="_blank" class="text-gray-100 font-semibold hover:text-white transition-colors duration-300" style="text-shadow: 0 0 5px rgba(255, 255, 255, 0.5);">
                        Aisor Anaya
                    </a>
                    &amp;
                    <a href="https://www.linkedin.com/in/juan-gomezduar/" target="_blank" class="text-gray-100 font-semibold hover:text-white transition-colors duration-300" style="text-shadow: 0 0 5px rgba(255, 255, 255, 0.5);">
                        Juan Gómez
                    </a>
                </p>
            </div>

            <!-- Social Media Links -->
            <div class="flex justify-center space-x-8 mb-8">
                <a href="https://web.facebook.com/profile.php?id=100010477652901" class="text-gray-300 hover:text-white transition-transform duration-300 transform hover:scale-125 text-4xl" target="_blank">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="https://www.instagram.com/permanenciaestudiantilunipaz" class="text-gray-300 hover:text-white transition-transform duration-300 transform hover:scale-125 text-4xl" target="_blank">
                    <i class="fab fa-instagram"></i>
                </a>
            </div>
        </div>
    </div>
</footer>


<!-- Add Tailwind CSS Utilities to style the text-shadow -->
<style>
.text-shadow-xl {
    text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.4);
}
</style>


<!-- Font Awesome CDN for social media icons -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>


</div>
@endsection
