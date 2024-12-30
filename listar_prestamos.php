<?php
// Incluir las clases necesarias
include 'classes/Prestamo.php';
include 'classes/Biblioteca.php';

// Iniciar sesión para acceder a los datos
session_start();

// Obtener la biblioteca desde la sesión
$biblioteca = $_SESSION['biblioteca'] ?? new Biblioteca();

// Obtener la lista de préstamos
$prestamos = $biblioteca->listarPrestamos();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Préstamos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container py-5">
        <h1 class="text-center text-primary mb-4">Listado de Préstamos</h1>

        <?php if (count($prestamos) > 0): ?>
            <table class="table table-bordered table-striped shadow">
                <thead class="table-primary">
                    <tr>
                        <th>Usuario</th>
                        <th>Título del Libro</th>
                        <th>Fecha de Préstamo</th>
                        <th>Fecha de Devolución</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($prestamos as $prestamo): ?>
                        <?php $detalles = $prestamo->getDetalles(); ?>
                        <tr>
                            <td><?php echo htmlspecialchars($detalles['usuario']); ?></td>
                            <td><?php echo htmlspecialchars($detalles['titulo']); ?></td>
                            <td><?php echo $detalles['fechaPrestamo']; ?></td>
                            <td><?php echo $detalles['fechaDevolucion'] ?? 'No devuelto'; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="alert alert-warning text-center shadow">
                No hay préstamos registrados.
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
