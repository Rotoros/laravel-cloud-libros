@extends('layouts.app')

@section('content')
<h1>👩‍💼 Autores</h1>
<a href="{{ route('authors.create') }}" class="btn btn-success mb-3">Nuevo Autor</a>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Nacionalidad</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($authors as $author)
        <tr>
            <td>{{ $author->name }}</td>
            <td>{{ $author->nationality ?? '—' }}</td>
            <td>
                <a href="{{ route('authors.edit', $author) }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ route('authors.destroy', $author) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar este autor?')">Eliminar</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="3" class="text-center text-muted">No hay autores registrados</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
