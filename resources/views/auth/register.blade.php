@extends('layouts.app')

@section('titulo')
    Registrate en Devstagram
@endsection

@section('contenido')
    <div class="md:flex  justify-center gap-6 md:items-center ">
        <div class="md:w-6/12   p-5">
         
           <img src="{{ asset('img/registrar.jpg') }}" alt="imagen registro de usuarios">
        </div>  
        <div class="md:w-4/12 bg-white p-6 rounded-lg  shadow-sm">

              <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="name" class="mb-2 uppercase block text-gray-500 font-bold">Nombre:</label>
                    <input
                        id="name"
                        name="name"
                        type="text"
                        placeholder="Escribe tu nombre"
                        class="border p-3 w-full  rounded-lg @error('name') border-red-500                         
                        @enderror"
                        value="{{ old('name') }}"
                    />
                    @error('name')
                        <p class="text-red-500 text-center mt-1">{{ str_replace('name', 'nombre', $message) }} </p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="username" class="mb-2 uppercase block text-gray-500 font-bold">Username:</label>
                    <input
                        id="username"
                        name="username"
                        type="text"
                        placeholder="Tu nombre de usuario"
                        class="border p-3 w-full  rounded-lg @error('name') border-red-500                         
                        @enderror"
                    />
                    @error('username')
                    <p class="text-red-500 text-center mt-1">{{ $message }}</p>
                @enderror
                </div>
                <div class="mb-5">
                    <label for="email" class="mb-2 uppercase block text-gray-500 font-bold">Email:</label>
                    <input
                        id="email"
                        name="email"
                        type="text"
                        placeholder="Escribe tu email"
                        class="border p-3 w-full  rounded-lg @error('email') border-red-500                         
                        @enderror"
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
                    <label for="password_confirmation" class="mb-2 uppercase block text-gray-500 font-bold">Repetir password:</label>
                    <input
                        id="password_confirmation"
                        name="password_confirmation"
                        type="password"
                        placeholder="Repite tu password"
                        class="border p-3 w-full  rounded-lg"
                    />
                </div>


                <input
                 type="submit" 
                value="Crear cuenta" 
                class="bg-sky-700 hover:bg-sky-700 transition-colors uppercase p-3 text-white rounded-lg w-full" >
              </form>
        </div>  
    </div>   
@endsection