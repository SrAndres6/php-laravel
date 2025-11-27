<form method="POST" action="{{ isset($aprendiz) ? route('aprendices.update', $aprendiz) : route('aprendices.store') }}">
    @csrf
    @if(isset($aprendiz))
        @method('PUT')
    @endif

    {{-- Nombre --}}
    <label class="block">
        <span class="text-sm font-semibold">Nombre</span>
        <input
            type="text"
            name="nombre"
            class="border p-2 w-full rounded @error('nombre') border-red-500 @enderror"
            value="{{ old('nombre', $aprendiz->nombre ?? '') }}"
            placeholder="Ej: Ana María Pérez"
            required
        >
    </label>
    @error('nombre')
        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
    @enderror

    {{-- Documento --}}
    <label class="block mt-3">
        <span class="text-sm font-semibold">Documento</span>
        <input
            type="text"
            name="documento"
            class="border p-2 w-full rounded @error('documento') border-red-500 @enderror"
            value="{{ old('documento', $aprendiz->documento ?? '') }}"
            pattern="\d{5,15}"
            placeholder="Solo números, entre 5 y 15 dígitos"
            required
        >
    </label>
    @error('documento')
        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
    @enderror

    {{-- Apellido --}}
    <label class="block mt-3">
        <span class="text-sm font-semibold">Apellido</span>
        <input
            type="text"
            name="apellido"
            class="border p-2 w-full rounded @error('apellido') border-red-500 @enderror"
            value="{{ old('apellido', $aprendiz->apellido ?? '') }}"
            placeholder="Ej: Gómez Rodríguez"
            required
        >
    </label>
    @error('apellido')
        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
    @enderror

    {{-- Correo --}}
    <label class="block mt-3">
        <span class="text-sm font-semibold">Correo</span>
        <input
            type="email"
            name="correo"
            class="border p-2 w-full rounded @error('correo') border-red-500 @enderror"
            value="{{ old('correo', $aprendiz->correo ?? '') }}"
            placeholder="usuario@correo.com"
            required
        >
    </label>
    @error('correo')
        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
    @enderror

    {{-- Ficha ID --}}
    <label class="block mt-3">
        <span class="text-sm font-semibold">Ficha ID (Opcional)</span>
        <input
            type="number"
            name="ficha_id"
            class="border p-2 w-full rounded @error('ficha_id') border-red-500 @enderror"
            value="{{ old('ficha_id', $aprendiz->ficha_id ?? '') }}"
            placeholder="Ej: 2728394"
        >
    </label>
    @error('ficha_id')
        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
    @enderror

    {{-- Botón Guardar --}} 
    <div class="mt-6">
        <button
            type="submit"
            class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg shadow"
        >
            Guardar
        </button>
    </div>
</form>