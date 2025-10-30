@extends('layouts.app')

@section('content')
<h1>➕ Nuevo Libro</h1>

<form action="{{ route('books.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Título</label>
        <input type="text" name="title" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Año</label>
        <input type="number" name="year" class="form-control">
    </div>
    <div class="mb-3">
        <label>Autor</label>
        <select name="author_id" class="form-control" required>
            <option value="">Seleccionar autor</option>
            @foreach($authors as $author)
            <option value="{{ $author->id }}">{{ $author->name }}</option>
            @endforeach
        </select>
    </div>
    <button class="btn btn-primary">Guardar</button>
</form>
@endsection
