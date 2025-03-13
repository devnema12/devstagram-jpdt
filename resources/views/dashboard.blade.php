@extends('layouts.app')


@section('titulo')
    Tu cuenta
@endsection

@section('contenido')
<div class="flex justify-center">
    <div class="w-full md:w-8/12 lg:w-6/12 md:flex">
        <div class="md:w-8/12 lg:6/12 p-5 border border-spacing-1">
            <img src="{{asset('img/usuario.svg')}}" alt="imagen_avatar_usuario">
        </div>
        <div class="md:w-8/12 lg:6/12 p-5">
            
            <p class="text-gray-700 text-2xl">{{ auth()->user()->username}}</p>
        </div>
    </div>
</div>

@endsection