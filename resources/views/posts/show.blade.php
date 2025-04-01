@extends('layouts.app')

@section('titulo')
    {{ $post->titulo }}
@endsection

@section('contenido')
    <div class="container mx-auto flex">

        <div class="md:w-1/2">
            <img src="{{ asset('uploads') . '/' . $post->imagen }}"
                alt=" imagen de la publicacione de post {{ $post->titulo }}">

            <div class="p-3">
                <p>0 Likes</p>
            </div>

            <div>
                <p class="font-bold ">{{ $post->user->username }}</p>
                <p class="text-sm text-gray-600">{{ $post->updated_at->diffForHumans() }}</p>
                <p class="mt-5"> <span class="font-bold">Descripción: </span>{{ $post->description }}</p>
            </div>
        </div>
        <div class="md:w-1/2 p-5">
            <div class="shadow mb-5 p-5 bg-white">
                <p class="text-xl font-bold text-center m-4">Agrega un nuevo comentario</p>
                <form action="">

                    <div class="mb-5">
                        <label for="comentario" class="mb-2 block upppercase text-gray-500 font-bold">Comentario</label>
                        <textarea name="comentario" id="comentario" placeholder="comentario de la publicacion"
                            class="border p-3 w-full rounded-lg 
                             @error('comentario')
                         border-red-500                         
                        @enderror">{{ old('comentario') }}</textarea>



                        {{-- @error('comentario')
                            <p class="text-red-500 text-center mt-1">{{ $message }}</p>
                        @enderror --}}

                    </div>

                    <input type="submit" value="Crear Comentario"
                        class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
                </form>
            </div>
        </div>


    </div>
@endsection
