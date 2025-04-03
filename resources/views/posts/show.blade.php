@extends('layouts.app')

@section('titulo')
    {{ $post->titulo }}
@endsection

@section('contenido')
    <div class="container mx-auto md:flex">

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


            @auth
                <form action="">
                    <input type="submit" value="Eliminar publicación"
                        class="bg-red-500 hover:bg-red-600 text-white font-bold mt-4  cursor-pointer p-2 rounded">
                </form>
            @endauth
        </div>
        <div class="md:w-1/2 p-5">
            <div class="shadow mb-5 p-5 bg-white">
                @auth

                    <p class="text-xl font-bold text-center m-4">Agrega un nuevo comentario</p>

                    @if (session('mensaje'))
                        <div class="bg-green-500 p-2 rounded-lg uppercase mb-6 text-white font-bold">
                            {{ session('mensaje') }}
                        </div>
                    @endif
                    <form action="{{ route('comentarios.store', ['post' => $post, 'user' => $user->username]) }}"
                        method="POST">
                        {{-- Para solucionar el error 419 page expired --}}
                        @csrf
                        <div class="mb-5">
                            <label for="comentario" class="mb-2 block upppercase text-gray-500 font-bold">Comentario</label>
                            <textarea name="comentario" id="comentario" placeholder="comentario de la publicacion"
                                class="border p-3 w-full rounded-lg 
                             @error('comentario')
                         border-red-500                         
                        @enderror">{{ old('comentario') }}</textarea>



                            @error('comentario')
                                <p class="text-red-500 text-center mt-1">{{ $message }}</p>
                            @enderror

                        </div>

                        <input type="submit" value="Crear Comentario"
                            class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
                    </form>

                @endauth

                <div class="shadow bg-white mb-5 max-h-96 overflow-y-scroll mt-10">
                    @if ($post->comentarios->count())
                        @foreach ($post->comentarios as $coment)
                            <div class="p-5 border-gray-300 border-b">
                                <a href="{{ route('posts.index', $coment->user) }}"
                                    class="font-bold">{{ $coment->user->username }}</a>
                                <p class="">{{ $coment->comentario }}</p>
                                <p class="text-sm text-gray-500">{{ $coment->created_at->diffForHumans() }}</p>

                            </div>
                        @endforeach
                    @else
                        <p class="p-10 text-center">No hay comentario aun</p>
                    @endif
                </div>
            </div>
        </div>


    </div>
@endsection
