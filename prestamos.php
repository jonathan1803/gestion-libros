<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Préstamos de Libros</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"> 
</head>
<body class="bg-light">
    <div class="container py-5">
        <h1 class="text-center text-primary mb-4">Préstamo de Libros</h1>

        <!-- Mostrar mensajes de éxito o error -->
        <?php if (isset($_GET['mensaje'])): ?>
            <?php if ($_GET['mensaje'] === 'exito'): ?>
                <div class="alert alert-success" role="alert">
                    ¡Préstamo realizado exitosamente!
                </div>
            <?php elseif ($_GET['mensaje'] === 'error'): ?>
                <div class="alert alert-danger" role="alert">
                    Ocurrió un error al realizar el préstamo. Por favor, verifica los datos ingresados.
                </div>
            <?php endif; ?>
        <?php endif; ?>

        <form action="procesar_prestamo.php" method="POST" class="card p-4 shadow-lg">
            <div class="mb-3">
                <label for="usuario" class="form-label">Usuario:</label>
                <input type="text" id="usuario" name="usuario" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="titulo_libro" class="form-label">Título del Libro:</label>
                <input type="text" id="titulo_libro" name="titulo_libro" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Solicitar Préstamo</button>
        </form>
        <div class="text-center mt-4">
            <a href="index.php" class="btn btn-outline-secondary">Volver al Inicio</a>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
