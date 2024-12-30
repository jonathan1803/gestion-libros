<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Biblioteca</title>
    <style>
        /* CSS para asegurar que el footer permanezca al fondo */
        html, body {
            height: 100%;
        }
        body {
            display: flex;
            flex-direction: column;
        }
        main {
            flex: 1; /* Hace que main ocupe todo el espacio disponible */
        }
    </style>
</head>
<body>
<?php include 'includes/header.php'; ?>
<?php include 'buscar_libro.php'; ?>



<footer class="bg-dark text-white py-3 mt-4">
        <div class="text-center">
            <p>&copy; <?php echo date('Y'); ?> Biblioteca - Todos los derechos reservados.</p>
        </div>
    </footer>
</body>
</html>
