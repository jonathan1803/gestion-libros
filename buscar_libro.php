<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Libro</title>
    <!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"> 

</head>
<body class="bg-light">
    <div class="container py-5">
        <h3 class="text-left text-primary mb-4">Buscar un Libro</h3>
        <form action="resultado_busqueda.php" method="GET" class="card p-4 shadow-lg">
            <div class="mb-3">
                <label for="criterio" class="form-label">Criterio de Búsqueda:</label>
                <select id="criterio" name="criterio" class="form-select">
                    <option value="titulo">Título</option>
                    <option value="autor">Autor</option>
                    <option value="categoria">Categoría</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="busqueda" class="form-label">Buscar:</label>
                <input type="text" id="busqueda" name="busqueda" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Buscar</button>
        </form>
        <div class="text-center mt-4">
            <a href="index.php" class="btn btn-outline-secondary">Volver al Inicio</a>
        </div>
    </div>
    <!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
