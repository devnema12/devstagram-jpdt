@extends('layouts.app')

@section('titulo')
    Editar Perfil: {{ auth()->user()->username }}
@endsection

@section('contenido')
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow p-6">
            <form method="POST" action="{{ route('perfil.store') }}" class="mt-10 md:mt-0" enctype="multipart/form-data">
                @csrf
                <div class="mb-5">
                    <label for="name" class="mb-2 uppercase block text-gray-500 font-bold">Nombre:</label>
                    <input id="name" name="name" type="text" placeholder="Escribe tu nombre"
                        class="border p-3 w-full  rounded-lg @error('name') border-red-500                         
                        @enderror"
                        value="{{ auth()->user()->name }}" />
                    @error('name')
                        <p class="text-red-500 text-center mt-1">{{ str_replace('name', 'nombre', $message) }} </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="username" class="mb-2 uppercase block text-gray-500 font-bold">Username:</label>
                    <input id="username" name="username" type="text" placeholder="Tu nombre de usuario"
                        class="border p-3 w-full  rounded-lg @error('username') border-red-500                         
                        @enderror"
                        value="{{ auth()->user()->username }}" />
                    @error('username')
                        <p class="text-red-500 text-center mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="imagen" class="mb-2 uppercase block text-gray-500 font-bold">Imagen perfil:</label>
                    <input id="imagen" name="imagen" type="file"
                        class="border p-3 w-full  rounded-lg @error('imagen') border-red-500                         
                        @enderror"
                        value="{{ auth()->user()->imagen }}" accept=".jpg, .jpeg, .png" />
                    @error('imagen')
                        <p class="text-red-500 text-center mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <input type="submit" value="Guardar Cambios"
                    class="bg-sky-700 hover:bg-sky-700 transition-colors uppercase p-3 text-white rounded-lg w-full">
            </form>
        </div>
    </div>
@endsection
