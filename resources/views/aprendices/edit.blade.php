@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden border border-gray-200 p-6">
            <h2 class="font-semibold text-2xl text-gray-800 leading-relaxed mb-6">Editar Aprendiz</h2>

            <form action="{{ route('aprendices.update', $aprendiz) }}" method="POST">
                @csrf
                @method('PUT')

                @include('aprendices._form')

            </form>
        </div>
    </div>
</div>
@endsection