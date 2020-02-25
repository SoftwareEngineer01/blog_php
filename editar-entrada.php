<!-- Cabecera -->
<?php require_once 'includes/cabecera.php'; ?>
<?php require_once 'includes/redireccion.php'; ?>

<?php    
    $id = $_GET['id'];
    $entrada_actual = conseguirEntrada($db, $id); 

    if(!isset($entrada_actual['id'])){
        header('Location: index.php');
    }
?>

<!-- Barra Lateral -->
<?php require_once 'includes/lateral.php'; ?>

<div id="principal">
    <h1>Editar Entrada</h1>
    <p>
       Edita tu entrada <?=$entrada_actual['titulo'] ?>       
    </p>
    <br>
    <form action="guardar-entrada.php?editar=<?=$entrada_actual['id']?>" method="POST">
        <label for="titulo">Titulo:</label>
        <input type="text" name="titulo" value="<?=$entrada_actual['titulo'] ?>">
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'titulo') : ''; ?>

        <br/>

        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" id="" cols="40" rows="5"><?=$entrada_actual['descripcion'] ?></textarea>
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'descripcion') : ''; ?>

        <br/><br/>

        <label for="categoria">Categoria</label>
        <select name="categoria" id="">
            <?php $categorias = conseguirCategorias($db);
                if(!empty($categorias)):                
                    while($categoria = mysqli_fetch_assoc($categorias)) :
            ?>
                <option value="<?=$categoria['id'];?>"<?=($categoria['id'] == $entrada_actual['categoria_id']) ? 'selected = selected' : '' ?> >
                    <?=$categoria['nombre']; ?>       
                </option>
            <?php               
                    endwhile;
                endif;
            ?>                
        </select>
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'categoria') : ''; ?>

        <br/><br/>       
        
        <input type="submit" value="Guardar">

    </form>

    <?php borrarErrores(); ?>
    
</div>



<!-- Footer -->
<?php require_once 'includes/footer.php'; ?>
