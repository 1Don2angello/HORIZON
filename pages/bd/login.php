<?php
    include('conec.php'); 
    $email = $_POST['email'];
    $password = $_POST['password'];

    $consulta = "CALL sp_mostrarusuariosdb ('$email')";
    $resultado = mysqli_query($conexion,$consulta);
    $fila = mysqli_fetch_array($resultado);
    $respuesta = ''; // variables de comprobacion si hay parametro pues hay parametro//

        if(sizeof($fila) > 0) {
            if($fila["contrasena"] == $password) {
                $respuesta = 1;
            }else{
                $respuesta = "la contrasena es incorrecta o no coincide";

            }
        }else{
            $respuesta = "Email no encontrado";


        }

        if ($respuesta == 1){
            header('Location: dashboard.php');
        }else{
            header('Location: index.html');
        }

?>