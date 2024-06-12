<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite('resources/css/app.css')
        <link rel="stylesheet" href="{{ asset('css/app.css')}}">
        <title>DevStagram - @yield('titulo')</title>
        <script src="{{ asset('js/app.js')}}" defer></script>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    </head>
    <body class="bg-gray-100">
        <header class="p-5 border-b bg-white shadow">
            <div class="container mx-auto flex justify-between items-center">
                <h1 class="text-3xl font-black">
                    DevStagram
                </h1>

                @auth
                    <nav>
                        <a class="font-bold text-gray-600 text-sm" href="{{ route('login')}}">
                            Hola: 
                            <span class="font-normal">
                                {{ auth()->user()->username }}
                            </span>
                        </a>
                        <a class="font-bold uppercase text-gray-600 text-sm" href="{{ route('register')}}">Cerrar Sesión</a>
                    </nav>
                @endauth

                @guest
                    <nav>
                        <a class="font-bold uppercase text-gray-600 text-sm" href="{{ route('login')}}">Login</a>
                        <a class="font-bold uppercase text-gray-600 text-sm" href="{{ route('register')}}">Crear Cuenta</a>
                    </nav>
                @endguest
            </div>
        </header>

        <main class="container mx-auto mt-10">
            <h2 class="font-black text-center text-3xl mb-10">
                @yield('titulo')
            </h2>
            @yield('contenido')
        </main>

        <footer class="mt-10 text-center p-5 text-gray-500 font-bold uppercase">
            DevStagram - Todos los derechos reservados {{ now() -> year}}.
        </footer>
    </body>
</html>