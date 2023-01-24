<?php

if (isset($_REQUEST)) {
    include '../conexion.php';

    $id_jugador = $_REQUEST['id_jugador']; //id jugador
    $porcentaje = $_REQUEST['porcentaje']; // 8% a 15%
    $dinero = $_REQUEST['precio']; // 10,000 

    // capturando botones
    $btn_verde = isset($_REQUEST['verde']);
    $btn_rojo = isset($_REQUEST['rojo']);
    $btn_negro = isset($_REQUEST['negro']);

    // var_dump($_REQUEST);

    $cero = 0;
    $float = $cero . '.' . $porcentaje; // concatenacion 0.10
    // echo $float;
    // echo "<br> <br> <br>";

    $precio = $dinero;
    $desc = $precio * $float; // aplicando descuento 10,000 * 0.10 = 1,000

    $total = $precio - $desc; // 9000
    echo $total;

    $randon = rand(1, 10); // Numeros aleatores del 1 al 10

    // Estableciendo numeros y asisignadolo a las variable $rojo, $verde y $negro
    if ($randon == 1 || $randon == 7 ||  $randon == 4 || $randon == 9) {
        $rojo = "Rojo";
        // echo $rojo;
        // echo "<br> <br> <br>";


        if ($btn_rojo == isset($rojo)) { // Validacion para saber que la variables $rojo es igual al boton pulsado desde el formario, para comprobar si ambos son iguales, en caso de que lo sean has gano de lo contraio perdistes
            echo "ganastes Rojo";

            // En caso de acertar creamos la variable $gano para multiplicar por 2 el valor del precio inical sin aplicar ningun descuento o mejor dicho porcentaje ($float)
            $gano = $precio + $desc * 2;
            echo $gano;

            // Realizos consulta para modifar el precio actual del juagador 
            $sql = "UPDATE `usuarios` SET `dinero` = '$gano' WHERE `usuarios`.`id_user` = $id_jugador;";
            $query = mysqli_query($conn, $sql) or die('fallo el query');

            header('location: ../index.php?Ruleta_Rojo_exito');
        } else { // El caso contrario es obviamente  el numero ramdon o aleantorio NO sea igual al boton pulsado desde el formulario
            echo "perdistes";
            $sql = "UPDATE `usuarios` SET `dinero` = '$total' WHERE `usuarios`.`id_user` = $id_jugador;";
            $query = mysqli_query($conn, $sql) or die('fallo el query');
            header('location: ../index.php?Ruleta_Rojo_fallo');
        }
    } else if ($randon == 8 || $randon == 6 ||  $randon == 2 || $randon == 5) {
        $negro = "Negro";
        echo $negro;
        echo "<br> <br> <br>";

        if ($btn_negro == isset($negro)) {
            echo "ganastes black";
            $gano = $precio + $desc * 2;
            echo $gano;
            $sql = "UPDATE `usuarios` SET `dinero` = '$gano' WHERE `usuarios`.`id_user` = $id_jugador;";
            $query = mysqli_query($conn, $sql) or die('fallo el query');
            header('location: ../index.php?Ruleta_Negro_exito');
        } else {
            echo "perdistes";
            $sql = "UPDATE `usuarios` SET `dinero` = '$total' WHERE `usuarios`.`id_user` = $id_jugador;";
            $query = mysqli_query($conn, $sql) or die('fallo el query');
            header('location: ../index.php?Ruleta_Negro_fallo');
        }
    } else if ($randon == 3 || 10) {
        $verde = "Verde";
        echo $verde;
        echo "<br> <br> <br>";

        if ($btn_verde == isset($verde)) {
            echo "ganastes verde";
            $gano = $precio + $desc * 15;
            echo $gano;
            $sql = "UPDATE `usuarios` SET `dinero` = '$gano' WHERE `usuarios`.`id_user` = $id_jugador;";
            $query = mysqli_query($conn, $sql) or die('fallo el query');
            header('location: ../index.php?Ruleta_Verde_exito');
        } else {
            echo "perdistes";
            $sql = "UPDATE `usuarios` SET `dinero` = '$total' WHERE `usuarios`.`id_user` = $id_jugador;";
            $query = mysqli_query($conn, $sql) or die('fallo el query');
            header('location: ../index.php?Ruleta_Verde_fallo');
        }
    } else {
        echo "nada";
    }
}
