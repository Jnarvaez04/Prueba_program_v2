<?php
require './controllers/leer-jugador.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Probabilidad</title>
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
</head>


<body>
    <br>
    <div class="container">

    <?php 
        if(isset($_GET['Ruleta_Rojo_exito'])){
            echo '<div class="alert alert-danger" role="alert">
            Haz acertado
        </div>';
        }
        if(isset($_GET['Ruleta_Rojo_fallo'])){
            echo '<div class="alert alert-danger" role="alert">
            haz Fallado en tu eleccion
        </div>';
        }
        if(isset($_GET['Ruleta_Verde_exito'])){
            echo '<div class="alert alert-success" role="alert">
            Haz acertado
        </div>';
        }
        if(isset($_GET['Ruleta_Verde_fallo'])){
            echo '<div class="alert alert-success" role="alert">
            haz Fallado en tu eleccion
        </div>';
        }
        if(isset($_GET['Ruleta_Negro_exito'])){
            echo '<div class="alert alert-dark" role="alert">
            Haz acertado
        </div>';
        }
        if(isset($_GET['Ruleta_Negro_fallo'])){
            echo '<div class="alert alert-dark" role="alert">
            haz Fallado en tu eleccion
        </div>';
        }

        
    ?>

    <?php 
    if(mysqli_num_rows($query) > 0){
        while($user = mysqli_fetch_assoc($query)){

    ?>

        <div class="card d-flex flex-row gap-2" style="width: auto;">
            <!-- <img src="https://ps.w.org/user-avatar-reloaded/assets/icon-256x256.png?rev=2540745" class="card-img-top" alt="..."> -->
            <div class="card-body">
                <h3>Jugador: <?php echo $user['nombre_user'] ?></h3>
                <h4>Presupueto: <?php echo number_format($user['dinero']) ?></h4>

                <form action="./controllers/evaluar.php" method="post">
                    <input type="number" min="8" max="15" name="porcentaje">
                    <input type="hidden" name="precio" value="<?php echo $user['dinero'] ?>" >
                    <input type="hidden" value="<?php echo $user['id_user'] ?>" name="id_jugador">
                    <input class="btn btn-danger" type="submit" value="Rojo" name="rojo">
                    <input class="btn btn-success" type="submit" value="Verde" name="verde">
                    <input class="btn btn-dark"type="submit" value="Negro" name="negro">
                </form>
            </div>

    
    <?php } } ?>
            



    </div>
</body>

</html>