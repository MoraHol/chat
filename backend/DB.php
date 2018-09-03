<?php
    $server = "localhost";
    $user= "root@localhost";
    $password = "";
    //conectar con servidor y MySQL
    $conexion = mysqli_connect($server,$user,$password) or die ("NO SE PUDO ESTABLECER CONEXION");
    //escoger base de datos
    $database = mysqli_select_db($conexion,"test") or die ("Ocurrio un problema al conectar con la base de datos");
    //busqueda a realizar
    $query = "SELECT * FROM chat ORDER BY id DESC";
    //resultado de busqueda
    $resultado = mysqli_query( $conexion, $query ) or die ("Algo ha ido mal en la consulta a la base de datos");


?>
