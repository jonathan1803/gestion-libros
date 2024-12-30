<?php
// Incluir las clases necesarias antes de iniciar o acceder a la sesión
include 'classes/Libro.php';
include 'classes/Biblioteca.php';

// Iniciar sesión para almacenar los datos de la biblioteca
session_start();

// Verificar si ya existe una instancia de la biblioteca en la sesión
if (!isset($_SESSION['biblioteca'])) {
    $_SESSION['biblioteca'] = new Biblioteca();
}

// Obtener la instancia de la biblioteca desde la sesión
$biblioteca = $_SESSION['biblioteca'];

// Procesar los datos enviados por el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'] ?? '';
    $autor = $_POST['autor'] ?? '';
    $categoria = $_POST['categoria'] ?? '';

    // Validar que los campos no estén vacíos
    if (!empty($titulo) && !empty($autor) && !empty($categoria)) {
        // Crear un nuevo libro
        $nuevoLibro = new Libro(uniqid(), $titulo, $autor, $categoria);

        // Agregar el libro a la biblioteca
        $biblioteca->agregarLibro($nuevoLibro);

        // Actualizar la biblioteca en la sesión
        $_SESSION['biblioteca'] = $biblioteca;

        // Redirigir con un mensaje de éxito
        header('Location: agregar_libro.php?mensaje=exito');
        exit;
    } else {
        // Redirigir con un mensaje de error
        header('Location: agregar_libro.php?mensaje=error');
        exit;
    }
}
?>
