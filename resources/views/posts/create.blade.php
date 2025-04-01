@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('titulo')
    Crea una nueva Publicación
@endsection

@section('contenido')
    <div class="md:flex md:items-center">
        <div class="md:w-1/2 px-10">
            <form action="{{ route('imagenes.store') }}" method="POST" enctype="multipart/form-data" id="dropzone"
                class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
                @csrf
            </form>
        </div>
        <div class=" md:w-1/2 bg-white p-6 rounded-lg  shadow-sm mt-10 md:mt-10">
            <form action="{{ route('posts.store') }}" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="titulo" class="mb-2 uppercase block text-gray-500 font-bold">Titulo:</label>
                    <input id="titulo" name="titulo" type="text" placeholder="Titulo de la publicacion"
                        class="border p-3 w-full  rounded-lg @error('titulo') border-red-500                         
                    @enderror"
                        value="{{ old('titulo') }}" />
                    @error('titulo')
                        <p class="text-red-500 text-center mt-1">{{ str_replace('titulo', 'titulo', $message) }} </p>
                    @enderror
                </div>
                <div class=" mb-5">

                    <label for="description" class="mb-2 uppercase block text-gray-500 font-bold">description:</label>
                    <textarea name="description" id="description" placeholder="description de la publicacion"
                        class="border p-3 w-full  rounded-lg 
                        @error('description')
                         border-red-500                         
                        @enderror">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-center mt-1">{{ str_replace('description', 'descripcion', $message) }} </p>
                    @enderror

                </div>

                <div class="mb-5">
                    <input type="hidden" name="imagen" value='{{ old('imagen') }}'>
                    @error('imagen')
                        <p class="text-red-500 text-center mt-1">{{ str_replace('imagen', 'imagen', $message) }} </p>
                    @enderror
                </div>

                <input type="submit" value="Crear publicación"
                    class="bg-sky-700 hover:bg-sky-700 transition-colors uppercase p-3 text-white rounded-lg w-full">
            </form>
        </div>
    </div>
@endsection
