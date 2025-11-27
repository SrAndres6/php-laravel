@extends('layouts.app')

@section('title','Nuevo Aprendiz')
@section('content')
<h1>Nuevo Aprendiz</h1>
<form action="{{ route('aprendices.store') }}" method="POST">
@csrf
<label>Nombre <input name="nombre" required placeholder="Ej: Ana María Pérez"></label><br>
<label>Apellido <input name="apellido" required placeholder="Ej: Gómez"></label><br>
<label>Documento <input name="documento" required placeholder="Ej: 123456789"></label><br>
<label>Correo <input type="email" name="correo" required placeholder="usuario@correo.com"></label><br>
<label>Ficha <input name="ficha_id" placeholder="Ej: 2728394"></label><br>
<label>Asignatura <input name="asignatura" placeholder="Ej: Matemáticas"></label><br>
<label>Jornada <input name="jornada"></label><br>
<button>Guardar</button>
</form>
@endsection
