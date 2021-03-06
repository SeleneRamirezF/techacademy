@extends('plantillas.plantilla1')
@section('titulo')
    Editar Asignatura
@endsection
@section('cabecera')
    Editar Asignatura
@endsection
@section('contenido')
<!-- mostramos los mensajes si hay -->
@if ($texto = Session::get('mensaje'))
<p class="bg-blue-400 text-white p-2 my-3 font-bold">{{ $texto }}</p>
@endif
    <form action="{{route('asignaturas.update', $asignatura)}}" method="POST"  enctype="multipart/form-data" class="mt-3">
            @csrf
            @method("PUT")
            <div class="mb-3 pt-0">
                <input type="text" name="nombre" required value="{{$asignatura->nombre}}" class="px-3 py-3 placeholder-gray-400 text-gray-700
                    relative bg-white bg-white rounded text-sm shadow outline-none focus:outline-none focus:shadow-outline w-200"/>
                <input class="px-3 py-3 placeholder-gray-400 text-gray-700 relative bg-white bg-white rounded text-sm shadow outline-none
                    focus:outline-none focus:shadow-outline w-200" value="{{$asignatura->horas}}" name="horas" type="number" min='1'
                    max='9' step="0.50" required />
            </div>
            <div class="mt-4 text-center col-span-2">
                <button type="submit"
                    class="bg-blue-400 hover:bg-blue-600 rounded text-white font-bold py-2 px-4 shadow">
                    <i class="fas fa-plus"></i> Editar</button>
                <button type="reset"
                    class="bg-yellow-400 hover:bg-yellow-600 rounded text-white font-bold py-2 px-4 shadow">
                    <i class="fas fa-brush"></i> Limpiar</button>
                <a href="{{route('asignaturas.index')}}"
                    class="bg-green-600 hover:bg-green-800 rounded text-white font-bold py-3 px-4 shadow">
                    <i class="fas fa-backward"></i> Regresar</a>
            </div>
        </form>
@endsection
