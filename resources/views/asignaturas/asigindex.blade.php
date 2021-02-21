@extends('plantillas.plantilla1')
@section('titulo')
Asignaturas
@endsection
@section('cabecera')
Gestión de Asignaturas
@endsection
@section('contenido')
@if ($texto = Session::get('mensaje'))
<p class="bg-blue-400 text-white p-2 my-3 font-bold">{{ $texto }}</p>
@endif
<a href="{{route('asignaturas.create')}}"
            class="bg-green-600 hover:bg-green-800 rounded text-white font-bold py-2 px-4 shadow">
            <i class="fa fa-plus"></i> Nueva Asignatura</a>

<div class="text-center grid grid-cols-4 py-2 gap-2 mt-10 border-2 border-blue-200 shadow">
    <div class="font-bold text-xl text-gray-700">Detalle</div>
    <div class="font-bold text-xl text-gray-700">Nombre</div>
    <div class="font-bold text-xl text-gray-700">Horas</div>
    <div class="font-bold text-xl text-gray-700">Acciones</div>
</div>
<div class="text-center grid grid-cols-4 py-2 gap-2 mt-10 border-2 border-blue-200 shadow py-5">
    @foreach($asignaturas as $item)
    <div class="mb-5">
        <a href="{{route('asignaturas.show', $item)}}"
        class="bg-purple-400 hover:bg-green-200 rounded text-white font-bold py-2 px-4 shadow">
        <i class="fa fa-info"></i> Detalle</a>
    </div>
    <div>
        {{$item->nombre}}
    </div>
    <div>
        {{$item->horas}}
    </div>
    <div>
        <form action="{{route('asignaturas.destroy', $item)}}" method="POST">
            @csrf
            @method("DELETE")
            <a href="{{route('asignaturas.edit', $item)}}"
                class="bg-red-400 hover:bg-red-800 rounded text-white font-bold py-2 px-4 shadow">
                <i class="fa fa-edit"></i> Editar</a>
            <button type="submit"
                class="bg-yellow-700 hover:bg-yellow-800 rounded text-white font-bold py-2 px-4 shadow"
                onclick="return confirm('¿Seguro que desea Borrar la asignatura de: {{ $item->nombre . ' con ' . $item->horas }} horas ?')">
                <i class="fas fa-trash"></i> Borrar</button>
        </form>
    </div>
    @endforeach
</div>
<div class="mt-4">
    {{$asignaturas->links()}}
</div>
<div class="mt-8 text-right">
    <a href="{{ ('welcome') }}"
        class="bg-blue-600 hover:bg-blue-800 rounded text-white font-bold py-2 px-4 shadow text-xs">
        <i class="fas fa-home"></i> Principal</a>
</div>
@endsection
