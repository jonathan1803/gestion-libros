<?php
// Incluir las clases necesarias antes de iniciar la sesión
include 'classes/Libro.php';
include 'classes/Biblioteca.php';

// Iniciar la sesión para acceder a los datos guardados
session_start();

// Verificar si la biblioteca está en la sesión
if (!isset($_SESSION['biblioteca'])) {
    // Crear una nueva instancia de Biblioteca
    $biblioteca = new Biblioteca();

    // Agregar libros por defecto
    $biblioteca->agregarLibro(new Libro(1, "Cien años de soledad", "Gabriel García Márquez", "Novela"));
    $biblioteca->agregarLibro(new Libro(2, "Don Quijote de la Mancha", "Miguel de Cervantes", "Novela"));
    $biblioteca->agregarLibro(new Libro(3, "El Principito", "Antoine de Saint-Exupéry", "Infantil"));
    $biblioteca->agregarLibro(new Libro(4, "1984", "George Orwell", "Ciencia Ficción"));
    $biblioteca->agregarLibro(new Libro(5, "Crónica de una muerte anunciada", "Gabriel García Márquez", "Novela"));

    // Guardar la biblioteca en la sesión
    $_SESSION['biblioteca'] = $biblioteca;
} else {
    // Obtener la biblioteca desde la sesión
    $biblioteca = $_SESSION['biblioteca'];
}

$resultados = []; // Inicializar el array de resultados

// Verificar que se recibieron parámetros
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['criterio'], $_GET['busqueda'])) {
    $criterio = $_GET['criterio'];
    $busqueda = $_GET['busqueda'];

    // Realizar la búsqueda según el criterio
    switch ($criterio) {
        case 'titulo':
            $resultado = $biblioteca->buscarPorTitulo($busqueda);
            if ($resultado) {
                $resultados[] = $resultado;
            }
            break;

        case 'autor':
            $resultados = $biblioteca->buscarPorAutor($busqueda);
            break;

        case 'categoria':
            $resultados = $biblioteca->buscarPorCategoria($busqueda);
            break;

        default:
            echo "Criterio de búsqueda no válido.";
            exit;
    }
} else {
    echo "Faltan parámetros para la búsqueda.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados de Búsqueda</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container py-5">
        <h1 class="text-center text-primary mb-4">Resultados de Búsqueda</h1>

        <?php if (count($resultados) > 0): ?>
            <table class="table table-bordered table-striped shadow">
                <thead class="table-primary">
                    <tr>
                        <th>Título</th>
                        <th>Autor</th>
                        <th>Categoría</th>
                        <th>Disponibilidad</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($resultados as $libro): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($libro->getTitulo()); ?></td>
                            <td><?php echo htmlspecialchars($libro->getAutor()); ?></td>
                            <td><?php echo htmlspecialchars($libro->getCategoria()); ?></td>
                            <td class="<?php echo $libro->isDisponible() ? 'text-success' : 'text-danger'; ?>">
                                <?php echo $libro->isDisponible() ? 'Disponible' : 'Prestado'; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="alert alert-warning text-center shadow" role="alert">
                No se encontraron resultados para su búsqueda.
            </div>
        <?php endif; ?>

        <div class="text-center mt-4">
            <a href="buscar_libro.php" class="btn btn-outline-primary me-2">Nueva Búsqueda</a>
            <a href="index.php" class="btn btn-outline-secondary">Volver al Inicio</a>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
