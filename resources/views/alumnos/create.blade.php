@extends('plantillas.plantilla1')
@section('titulo')
    Crear Alumno
@endsection
@section('cabecera')
    Crear Alumno
@endsection
@section('contenido')
    <form action="{{route('alumnos.store')}}" method="POST"  enctype="multipart/form-data" class="mt-3">
            @csrf
            <div class="mb-3 pt-0">
                <input type="text" name="nombre" required placeholder="Nombre Alumno" class="px-3 py-3 placeholder-gray-400 text-gray-700
                    relative bg-white bg-white rounded text-sm shadow outline-none focus:outline-none focus:shadow-outline w-200"/>
                <input type="text" name="apellidos" required placeholder="Apellidos Alumno" class="px-3 py-3 placeholder-gray-400
                    text-gray-700 relative bg-white bg-white rounded text-sm shadow outline-none focus:outline-none focus:shadow-outline w-200"/>
                <input  type="email" name="mail" placeholder="Email Alumno" class="px-3 py-3 placeholder-gray-400 text-gray-700 relative
                    bg-white bg-white rounded text-sm shadow outline-none focus:outline-none focus:shadow-outline w-200"/>
                <div class="max-w-md mx-left rounded-lg overflow-hidden md:max-w-xl">
                    <div class="md:flex">
                        <div class="w-full p-3">
                            <div class="relative border-dotted h-48 rounded-lg border-dashed border-2 border-blue-700 bg-gray-100 flex justify-center items-center">
                                <div class="absolute">
                                    <div class="flex flex-col items-center"> <i class="fa fa-folder-open fa-4x text-blue-700"></i>
                                        <span class="block text-gray-400 font-normal">Sube aquí tu imagen</span> </div>
                                </div> <input type="file" class="h-full w-full opacity-0" name="foto">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-4 text-center col-span-2">
                <button type="submit"
                    class="bg-blue-400 hover:bg-blue-600 rounded text-white font-bold py-2 px-4 shadow">
                    <i class="fas fa-plus"></i> Crear</button>
                <button type="reset"
                    class="bg-yellow-400 hover:bg-yellow-600 rounded text-white font-bold py-2 px-4 shadow">
                    <i class="fas fa-brush"></i> Limpiar</button>
                <a href="{{route('alumnos.index')}}"
                    class="bg-green-600 hover:bg-green-800 rounded text-white font-bold py-3 px-4 shadow">
                    <i class="fas fa-backward"></i> Regresar</a>
            </div>
        </form>
@endsection
