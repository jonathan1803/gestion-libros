<?php
// Incluir las clases necesarias
include 'classes/Libro.php';
include 'classes/Biblioteca.php';
include 'classes/Prestamo.php';

// Iniciar sesión para almacenar los datos
session_start();

// Verificar si la biblioteca está en la sesión
if (!isset($_SESSION['biblioteca'])) {
    $_SESSION['biblioteca'] = new Biblioteca();
}

// Obtener la biblioteca desde la sesión
$biblioteca = $_SESSION['biblioteca'];

// Procesar el formulario enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'] ?? '';
    $tituloLibro = $_POST['titulo_libro'] ?? '';

    // Validar los datos y registrar el préstamo
    if (!empty($usuario) && !empty($tituloLibro)) {
        $exito = $biblioteca->registrarPrestamo($usuario, $tituloLibro);

        if ($exito) {
            $_SESSION['biblioteca'] = $biblioteca; // Actualizar la sesión
            header('Location: prestamos.php?mensaje=exito');
            exit;
        } else {
            header('Location: prestamos.php?mensaje=error');
            exit;
        }
    } else {
        header('Location: prestamos.php?mensaje=error');
        exit;
    }
}
