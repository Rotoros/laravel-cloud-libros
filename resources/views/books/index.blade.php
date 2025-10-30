@extends('layouts.app')

@section('content')
<h1>📚 Libros</h1>
<a href="{{ route('books.create') }}" class="btn btn-success mb-3">Nuevo Libro</a>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Título</th>
            <th>Año</th>
            <th>Autor</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($books as $book)
        <tr>
            <td>{{ $book->title }}</td>
            <td>{{ $book->year }}</td>
            <td>{{ $book->author->name }}</td>
            <td>
                <a href="{{ route('books.edit', $book) }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ route('books.destroy', $book) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar este libro?')">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
