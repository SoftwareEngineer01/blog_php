<!-- Cabecera -->
<?php require_once 'includes/cabecera.php'; ?>

<?php    
    $id = $_GET['id'];
    $entrada_actual = conseguirEntrada($db, $id); 

    if(!isset($entrada_actual['id'])){
        header('Location: index.php');
    }
?>

<!-- Barra Lateral -->
<?php require_once 'includes/lateral.php'; ?>

<!-- Caja Principal -->
<div id="principal">

    <h1><?=$entrada_actual['titulo']?></h1>
    <a href="categoria.php?id=<?=$entrada_actual['categoria_id']?>">
        <h2><?=$entrada_actual['categoria']?></h2>
    </a>
    <p><?=$entrada_actual['descripcion']?></p>
    <br>
    <h4><?=$entrada_actual['fecha']?> | <?=$entrada_actual['usuario']?></h4>

    <div id="regresar">
        <a href="entradas.php">Regresar</a>
    </div>

    <?php if(isset($_SESSION['usuario']) && $_SESSION['usuario']['id'] == $entrada_actual['usuario_id']) :  ?>

        <!-- botones -->
        <a href="editar-entrada.php?id=<?=$entrada_actual['id']?>" class="boton boton-verde">Editar entrada</a>
        <a href="borrar-entrada.php?id=<?=$entrada_actual['id']?>" class="boton boton-rojo" onclick="alert('Esta seguro de eliminar la entrada?')">Eliminar entrada</a>

    <?php endif; ?>


</div>   <!-- Fin principal -->           

<!-- Footer -->
<?php require_once 'includes/footer.php'; ?>
