@extends('layouts.app')

@section('content')
<h1>➕ Nuevo Autor</h1>

<form action="{{ route('authors.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Nombre</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="nationality" class="form-label">Nacionalidad</label>
        <input type="text" name="nationality" id="nationality" class="form-control">
    </div>

    <button class="btn btn-primary">Guardar</button>
    <a href="{{ route('authors.index') }}" class="btn btn-secondary">Volver</a>
</form>
@endsection
