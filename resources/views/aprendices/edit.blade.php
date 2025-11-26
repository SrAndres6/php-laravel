@extends('layouts.app')
@section('title','Editar Aprendiz')
@section('content')
<h1>Editar Aprendiz</h1>

<form action="{{ route('aprendices.update', $aprendiz->id) }}" method="POST">
    @csrf
    @method('PUT')

    <p>ID actual: {{ $aprendiz->id }} con Nombre: {{ $aprendiz->nombre }}</p>

    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" value="{{ $aprendiz->nombre }}"><br>

    <label for="documento">Documento:</label>
    <input type="text" id="documento" name="documento" value="{{ $aprendiz->documento }}"><br>
    
    <label for="correo">Correo:</label>
    <input type="email" id="correo" name="correo" value="{{ $aprendiz->correo }}"><br>
    
    <label for="ficha_id">Ficha:</label>
    <input type="text" id="ficha_id" name="ficha_id" value="{{ $aprendiz->ficha_id }}"><br>

    <button type="submit">Actualizar</button>
</form>
