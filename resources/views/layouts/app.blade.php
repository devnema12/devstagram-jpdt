<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Devstagram - @yield('titulo')</title>
  <link rel="stylesheet" href="{{ asset('js/app.css') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite('resources/css/app.css')
</head>

<body class="bg-slate-100">
 

 


    <header class="p-5 border-b bg-white shadow">
        <div class="container mx-auto flex justify-between items-center">
          <a href="{{ route('home') }}">  <h1 class="text-3xl font-black"> Devstagram</h1></a>

          @auth
              <nav class="flex gap-4">
              
                <a
              
                href="{{ route('register') }}" 
                class="font-bold uppercase text-gray-600 text-sm"> 
                 <span class="font-normal">
                  Hola: {{ auth()->user()->username}}
                  </span></a>

            <form action="{{ route('logout')}}" method="POST">
                @csrf
              <button 
              type="submit"
              href="{{ route('logout') }}" 
              class="font-bold uppercase text-gray-600 text-sm">Cerrar sesion
            </a>
            </form>
            </nav>
          @endauth

          @guest
              <nav class="flex gap-4">
                <a href="/login" class="font-bold uppercase text-gray-600 text-sm">Login</a>
                <a
                href="{{ route('register') }}" 
                class="font-bold uppercase text-gray-600 text-sm">Crear Cuenta</a>
            </nav>  
          @endguest
         
        </div>
    </header>


    <main class="container mx-auto mt-10 ">

        <h2 class="font-black text-3xl mb-10 text-center"> @yield('titulo')</h2>
        @yield('contenido')
    </main>

    <footer class="taext-center p-5 text-gray-500 font-bold- uppercase text-center mt-10">
               {{-- <p>Devstagram -Todos los derechos reservados @php echo date('Y') @endphp </p> --}}
               <p>Devstagram -Todos los derechos reservados {{now()->year}} </p>
    </footer>
</body>

</html>