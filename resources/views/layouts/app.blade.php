<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestor de Libros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Fondo de página moderno */
        body {
            background: linear-gradient(135deg, #6a11cb, #2575fc); /* degradado azul-morado */
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
        }

        /* Contenedor principal */
        .container {
            padding-top: 50px;
            padding-bottom: 50px;
        }

        /* Tarjeta de contenido */
        .card {
            background-color: rgba(150, 18, 18, 0.95); /* blanco semitransparente */
            border-radius: 1rem;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            padding: 30px;
        }

        /* Botones personalizados */
        .btn-primary {
            background: #6a11cb;
            border: none;
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background: #2575fc;
        }

        .btn-secondary {
            background: #f1f1f1;
            color: #333;
            border: none;
            transition: all 0.3s ease;
        }
        .btn-secondary:hover {
            background: #e0e0e0;
        }

        /* Navbar de enlaces */
        nav a {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <nav class="mb-4">
            <a href="{{ route('books.index') }}" class="btn btn-primary">Libros</a>
            <a href="{{ route('authors.index') }}" class="btn btn-secondary">Autores</a>
        </nav>

        <div class="card">
            @yield('content')
        </div>
    </div>
</body>
</html>
