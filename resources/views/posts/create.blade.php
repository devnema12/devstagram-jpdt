@extends('layouts.app')

@section('titulo')
    Crea una nueva Publicación
@endsection

@section('contenido')

<div class="md:flex md:items-center">
    <div class="md:w-1/2 px-10">
            dropzone
    </div>
    <div class=" md:w-1/2 bg-white p-6 rounded-lg  shadow-sm mt-10 md:mt-10">
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="mb-5">
                <label for="titulo" class="mb-2 uppercase block text-gray-500 font-bold">Titulo:</label>
                <input
                    id="titulo"
                    name="titulo"
                    type="text"
                    placeholder="Titulo de la publicacion"
                    class="border p-3 w-full  rounded-lg @error('titulo') border-red-500                         
                    @enderror"
                    value="{{ old('titulo') }}"
                />
                @error('titulo')
                    <p class="text-red-500 text-center mt-1">{{ str_replace('titulo', 'nombre', $message) }} </p>
                @enderror
            </div>
           <div class=" mb-5">
               
                    <label for="descripcion" class="mb-2 uppercase block text-gray-500 font-bold">Descripcion:</label>
                    <textarea
                        name="descripcion"
                        id="descripcion"
                        placeholder="descripcion de la publicacion"
                        class="border p-3 w-full  rounded-lg 
                        @error('descripcion')
                         border-red-500                         
                        @enderror"   
                        >{{ old('descripcion') }}</textarea>
                @error('descripcion')
                    <p class="text-red-500 text-center mt-1">{{ str_replace('descripcion', 'nombre', $message) }} </p>
                @enderror
            
           </div>

            <input
             type="submit" 
            value="Crear publicación" 
            class="bg-sky-700 hover:bg-sky-700 transition-colors uppercase p-3 text-white rounded-lg w-full" >
          </form>
    </div>
</div>
@endsection