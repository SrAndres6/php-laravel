@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            {{-- Encabezado y Buscador --}}
            <div class="flex justify-between items-center mb-4 px-4 sm:px-0">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Listado de Aprendices
                </h2>
                
                <div class="flex space-x-2">
                    {{-- Formulario de Búsqueda --}}
                    <form action="{{ route('aprendices.index') }}" method="GET" class="flex items-center">
                        <input type="text" name="q" value="{{ $q }}" 
                               placeholder="Buscar nombre o documento..." 
                               class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm text-sm">
                        
                        <button type="submit" class="ml-2 bg-gray-800 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded text-sm">
                            Buscar
                        </button>
                        
                        @if($q)
                            <a href="{{ route('aprendices.index') }}" class="ml-2 text-red-600 hover:text-red-800 text-sm underline">
                                Limpiar
                            </a>
                        @endif
                    </form>
                    
                    {{-- Botón Nuevo --}}
                    <a href="{{ route('aprendices.create') }}" class="bg-indigo-600 hover:bg-indigo-800 text-white font-bold py-2 px-4 rounded text-sm">
                        + Nuevo
                    </a>
                </div>
            </div>

            {{-- Mensaje de Éxito --}}
            @if(session('ok'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4 mx-4 sm:mx-0" role="alert">
                    <span class="block sm:inline">{{ session('ok') }}</span>
                </div>
            @endif

            {{-- Tabla de Datos --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nombre
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Apellido
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Documento
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Correo
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Ficha
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Asignatura
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Jornada
                                </th>
                                <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($aprendices as $a)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $a->nombre }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{$a->apellido ?? 'N/A' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $a->documento }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $a->correo }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $a->ficha_id ?? 'N/A' }}
                                    </td>
                                     <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{$a->agsinatura ?? 'N/A' }}
                                    </td>
                                     <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $a->jornada ?? 'N/A' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <div class="flex justify-end space-x-2">
                                            <a href="{{ route('aprendices.edit', $a) }}" class="text-indigo-600 hover:text-indigo-900 border border-indigo-600 rounded px-2 py-1 text-xs">
                                                Editar
                                            </a>
                                            
                                            <form action="{{ route('aprendices.destroy', $a) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este aprendiz?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900 border border-red-600 rounded px-2 py-1 text-xs">
                                                    Eliminar
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                        No se encontraron aprendices.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Paginación --}}
            <div class="mt-4 px-4 sm:px-0">
                {{ $aprendices->links() }}
            </div>
        </div>
    </div>
@endsection