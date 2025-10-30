<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestor de Libros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
    <div class="container">
        <nav class="mb-4">
            <a href="{{ route('books.index') }}" class="btn btn-outline-primary">Libros</a>
            <a href="{{ route('authors.index') }}" class="btn btn-outline-secondary">Autores</a>
        </nav>
        @yield('content')
    </div>
</body>
</html>
