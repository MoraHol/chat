<?php
require "DB.php";
session_start();

$query = "INSERT INTO `chat` (`id`, `nombre`, `mensaje`, `hora`) VALUES (NULL,'".$_SESSION["usuario"]."'"." ,'".$_POST["mensaje"]."'".", CURRENT_TIMESTAMP)";
$resultado = mysqli_query( $conexion, $query ) or die ( "Algo ha ido mal en la consulta a la base de datos");

?>
