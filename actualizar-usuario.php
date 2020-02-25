<?php

if(isset($_POST)){
    
    require_once 'includes/conexion.php';

    //Obtener valores del formulario de actualización
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false ;
    $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($db, $_POST['apellidos']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;
   
    //Array de errores
    $errores = array();

    /* VALIDANDO DATOS */

    //Validar nombre
    if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
        $nombre_validado = true;
    }else{
        $nombre_validado = false;
        $errores['nombre'] = 'El nombre no es válido';
    }

    //Validar apeliidos
    if(!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)){
        $apellidos_validado = true;
    }else{
        $apellidos_validado = false;
        $errores['apellidos'] = 'Los apellidos no son válido';
    }

    //Validar email
    if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
        $email_validado = true;
    }else{
        $email_validado = false;
        $errores['email'] = 'El email no es válido';
    }
   
    $guardar_usuario = false;
    
    //Comprobar que no hayan errores
    if (count($errores) == 0) {
        $id = $_SESSION['usuario']['id'];
        $guardar_usuario = true;

        //Comprobar si el email existe
        $query = "SELECT id, email FROM usuarios WHERE email= '$email' ";
        $verifica_email = mysqli_query($db, $query);
        $verifica_user = mysqli_fetch_assoc($verifica_email);

        if($verifica_user['id'] == $id || empty($verifica_user)){
            //Actualizar usuarios        
           
            $sql = "UPDATE usuarios SET nombre = '$nombre', apellidos = '$apellidos', email = '$email' WHERE id = $id ";
            
            $guardar = mysqli_query($db, $sql);

            if($guardar){
                $_SESSION['usuario']['nombre'] = $nombre;
                $_SESSION['usuario']['apellidos'] = $apellidos;
                $_SESSION['usuario']['email'] = $email;

                $_SESSION['completado'] = "La actualización se realizo con éxito";
            }else{
                $_SESSION['errores'] ['general'] = "Fallo al actualizar los datos del usuario!!";
            } 
        }else{
            $_SESSION['errores'] ['general'] = "El usuario ya existe!!";
        }              
       
    }else{
        $_SESSION['errores'] = $errores;       
    }
    
}

header('Location: mis-datos.php');