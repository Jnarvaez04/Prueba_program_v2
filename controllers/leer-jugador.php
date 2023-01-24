<?php

// SELECT * FROM `usuarios`
include './conexion.php';
$sql = "SELECT * FROM `usuarios`";
$query = mysqli_query($conn, $sql) or die('fallo el query');

?>