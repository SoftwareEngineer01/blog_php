<!-- Cabecera -->
<?php require_once 'includes/cabecera.php'; ?>

<!-- Barra Lateral -->
<?php require_once 'includes/lateral.php'; ?>

<!-- Caja Principal -->
<div id="principal">
    <h1>Todas las entradas</h1>

    <?php
        $entradas = conseguirEntradas($db);
        if(!empty($entradas)):
            while ($entrada = mysqli_fetch_assoc($entradas)) :    
    ?>
        <article class="entrada">
            <a href="entrada.php?id=<?=$entrada['id']?>">
                <h2><?=$entrada['titulo']; ?></h2>
                <span class="fecha"><?=$entrada['categoria'].' | '.$entrada['fecha']; ?></span>
                <p><?=substr($entrada['descripcion'], 0, 180). "..."?></p>
            </a>
        </article>
    <?php
            endwhile;
        endif;
    ?>
    


</div>   <!-- Fin principal -->           

<!-- Footer -->
<?php require_once 'includes/footer.php'; ?>
