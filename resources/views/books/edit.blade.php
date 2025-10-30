@extends('layouts.app')

@section('content')
<h1>✏️ Editar Autor</h1>

<form action="{{ route('authors.update', $author) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="name" class="form-label">Nombre</label>
        <input type="text" name="name" id="name" value="{{ old('name', $author->name) }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="nationality" class="form-label">Nacionalidad</label>
        <input type="text" name="nationality" id="nationality" value="{{ old('nationality', $author->nationality) }}" class="form-control">
    </div>

    <button class="btn btn-primary">Actualizar</button>
    <a href="{{ route('authors.index') }}" class="btn btn-secondary">Volver</a>
</form>
@endsection
