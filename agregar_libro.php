<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Libro</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"> 
</head>
<body class="bg-light">
    <div class="container py-5">
        <h1 class="text-center text-primary mb-4">Agregar un Nuevo Libro</h1>

        <!-- Mostrar mensajes de éxito o error -->
        <?php if (isset($_GET['mensaje'])): ?>
            <?php if ($_GET['mensaje'] === 'exito'): ?>
                <div class="alert alert-success" role="alert">
                    ¡El libro se ha agregado exitosamente!
                </div>
            <?php elseif ($_GET['mensaje'] === 'error'): ?>
                <div class="alert alert-danger" role="alert">
                    Ocurrió un error al agregar el libro. Por favor, verifica los campos.
                </div>
            <?php endif; ?>
        <?php endif; ?>

        <form action="procesar_agregar_libro.php" method="POST" class="card p-4 shadow-lg">
            <div class="mb-3">
                <label for="titulo" class="form-label">Título:</label>
                <input type="text" id="titulo" name="titulo" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="autor" class="form-label">Autor:</label>
                <input type="text" id="autor" name="autor" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="categoria" class="form-label">Categoría:</label>
                <input type="text" id="categoria" name="categoria" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success w-100">Agregar Libro</button>
        </form>
        <div class="text-center mt-4">
            <a href="index.php" class="btn btn-outline-secondary">Volver al Inicio</a>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
