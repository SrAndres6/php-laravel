@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        {{-- Encabezado y Buscador --}}
        <div class="flex justify-between items-center mb-6 px-4 sm:px-0">
            <h2 class="font-semibold text-2xl text-gray-800 leading-relaxed">
                Listado de Aprendices
            </h2>

            <div class="flex space-x-3">

                {{-- Búsqueda --}}
                <form action="{{ route('aprendices.index') }}" method="GET" class="flex items-center space-x-2">
                    <input
                        type="text"
                        name="q"
                        value="{{ $q }}"
                        placeholder="Buscar nombre o documento..."
                        class="border border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm text-sm p-2 w-48"
                    >

                    <button
                        type="submit"
                        class="bg-gray-800 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-lg text-sm shadow"
                    >
                        Buscar
                    </button>

                    @if($q)
                        <a
                            href="{{ route('aprendices.index') }}"
                            class="text-red-600 hover:text-red-800 text-sm underline"
                        >
                            Limpiar
                        </a>
                    @endif
                </form>

                {{-- Botón Nuevo --}}
                <a
                    href="{{ route('aprendices.create') }}"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg text-sm shadow"
                >
                    + Nuevo
                </a>
            </div>
        </div>

        {{-- Mensaje --}}
        @if(session('ok'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg shadow mb-6 mx-4 sm:mx-0">
                {{ session('ok') }}
            </div>
        @endif

        {{-- Tabla --}}
        <div class="bg-white shadow-lg rounded-lg overflow-hidden border border-gray-200">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-300">
                    <thead class="bg-gray-100">
                        <tr>

                            {{-- NOMBRE --}}
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wide">
                                <div class="flex items-center space-x-2">
                                    <span>Nombre</span>

                                    {{-- Asc --}}
                                    <a href="{{ route('aprendices.index', ['q' => $q, 'sort' => 'nombre', 'direction' => 'asc']) }}"
                                       class="text-gray-600 hover:text-black">🔼</a>

                                    {{-- Desc --}}
                                    <a href="{{ route('aprendices.index', ['q' => $q, 'sort' => 'nombre', 'direction' => 'desc']) }}"
                                       class="text-gray-600 hover:text-black">🔽</a>
                                </div>
                            </th>

                            {{-- APELLIDO --}}
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wide">
                                Apellido
                            </th>

                            {{-- DOCUMENTO --}}
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wide">
                                <div class="flex items-center space-x-2">
                                    <span>Documento</span>

                                    {{-- Asc --}}
                                    <a href="{{ route('aprendices.index', ['q' => $q, 'sort' => 'documento', 'direction' => 'asc']) }}"
                                       class="text-gray-600 hover:text-black">🔼</a>

                                    {{-- Desc --}}
                                    <a href="{{ route('aprendices.index', ['q' => $q, 'sort' => 'documento', 'direction' => 'desc']) }}"
                                       class="text-gray-600 hover:text-black">🔽</a>
                                </div>
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wide">
                                Correo
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wide">
                                Ficha
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wide">
                                Asignatura
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wide">
                                Jornada
                            </th>
                            <th class="px-6 py-4 text-right text-xs font-bold text-gray-700 uppercase tracking-wide">
                                Acciones
                            </th>
                        </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($aprendices as $a)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 whitespace-nowrap text-sm leading-relaxed text-gray-900 font-medium">
                                    {{ $a->nombre }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm leading-relaxed text-gray-700">
                                    {{ $a->apellido ?? 'N/A' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm leading-relaxed text-gray-700">
                                    {{ $a->documento }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm leading-relaxed text-gray-700">
                                    {{ $a->correo }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm leading-relaxed text-gray-700">
                                    {{ $a->ficha_id ?? 'N/A' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm leading-relaxed text-gray-700">
                                    {{ $a->asignatura ?? 'N/A' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm leading-relaxed text-gray-700">
                                    {{ $a->jornada ?? 'N/A' }}
                                </td>

                                {{-- Acciones --}}
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="flex justify-end space-x-2">

                                        {{-- Editar --}}
                                        <a
                                            href="{{ route('aprendices.edit', $a) }}"
                                            class="text-indigo-600 hover:text-indigo-900 border border-indigo-600 rounded-lg px-3 py-1 text-xs shadow-sm transition"
                                        >
                                            Editar
                                        </a>

                                        {{-- Eliminar --}}
                                        <form
                                            action="{{ route('aprendices.destroy', $a) }}"
                                            method="POST"
                                            onsubmit="return confirm('¿Estás seguro de eliminar este aprendiz?');"
                                        >
                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="text-red-600 hover:text-red-900 border border-red-600 rounded-lg px-3 py-1 text-xs shadow-sm transition"
                                            >
                                                Eliminar
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="8" class="px-6 py-4 text-center text-gray-500 text-sm leading-relaxed">
                                    No se encontraron aprendices.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Paginación --}}
        <div class="mt-6 px-4 sm:px-0">
            {{ $aprendices->links() }}
        </div>

    </div>
</div>
@endsection