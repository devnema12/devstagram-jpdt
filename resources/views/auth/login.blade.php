@extends('Layouts.app')

@section('titulo')

    Iniciar Sesion

@endsection

@section('contenido')
    <div class="md:flex  justify-center gap-6 md:items-center ">
        <div class="md:w-6/12   p-5">
         
           <img src="{{ asset('img/login.jpg') }}" alt="imagen registro de usuarios">
        </div>  
        <div class="md:w-4/12 bg-white p-6 rounded-lg  shadow-sm">

              <form method="POST" action="{{route('login')}}">
                @csrf

                @if(session('mensaje'))
                <p class="text-red-500 text-center mt-1">{{ session('mensaje') }}</p>
                @endif
             
                <div class="mb-5">
                    <label for="email" class="mb-2 uppercase block text-gray-500 font-bold">Email:</label>
                    <input
                        id="email"
                        name="email"
                        type="text"
                        placeholder="Escribe tu email"
                        class="border p-3 w-full  rounded-lg @error('email') border-red-500                         
                        @enderror"
                        value="{{ old('email') }}"

                    />
                    @error('email')
                    <p class="text-red-500 text-center mt-1">{{ $message }}</p>
                @enderror
                </div>
                <div class="mb-5">
                    <label for="password" class="mb-2 uppercase block text-gray-500 font-bold">Password:</label>
                    <input
                        id="password"
                        name="password"
                        type="password"
                        placeholder="Password de registro"
                        class="border p-3 w-full  rounded-lg @error('password') border-red-500                         
                        @enderror"
                    />
                    @error('password')
                    <p class="text-red-500 text-center mt-1">{{ $message }}</p>
                @enderror
                </div>
             
             <div class="mb-5">
                 <input type="checkbox" name="remember"> Mantener mi sesion  abierta
             </div>
                <input
                 type="submit" 
                value="Ingresar" 
                class="bg-sky-700 hover:bg-sky-700 transition-colors uppercase p-3 text-white rounded-lg w-full" >
              </form>
        </div>  
    </div>   
@endsection