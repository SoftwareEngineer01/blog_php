<?php require_once 'conexion.php'; ?>
<?php require_once 'includes/helpers.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <!-- Cabecera -->
    <header id="cabecera">
        <!-- Logo -->
        <div id="logo">
            <a href="index.php">
                Blog de Entretenimiento
            </a>
        </div>

        <!-- Menu -->       
        <nav id="menu">
            <ul>
                <li>
                    <a href="index.php">Inicio</a>
                </li>      
                <!-- Mostrar las categorias -->
                <?php 
                    $categorias = conseguirCategorias($db); 
                    if(!empty($categorias)) :
                         while ($categoria = mysqli_fetch_assoc($categorias)) : 
                ?>
                            <li>
                                <a href="categoria.php?id=<?=$categoria['id']; ?>"><?=$categoria['nombre']; ?></a>
                            </li>
                <?php                     
                    endwhile; 
                    endif;
                ?>   
                <li>
                    <a href="index.php">Sobre mí</a>
                </li>
                <li>
                    <a href="index.php">Contacto</a>
                </li>
            </ul>
        </nav>
    </header>

    <div id="contenedor">