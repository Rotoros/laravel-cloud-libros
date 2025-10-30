<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestor de Libros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: #f2f4f8; min-height: 100vh;">
    <div class="container py-4">
        <nav class="mb-4">
            <a href="{{ route('books.index') }}" class="btn btn-outline-primary">Libros</a>
            <a href="{{ route('authors.index') }}" class="btn btn-outline-secondary">Autores</a>
        </nav>

        <div class="card shadow p-4 rounded-4 bg-white">
            @yield('content')
        </div>
    </div>
</body>
</html>
