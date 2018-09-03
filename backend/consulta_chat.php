<?php
    require "DB.php";
        
    while($column = mysqli_fetch_array($resultado)){
        echo "<p class='mensaje'>"."<span class='usuario'>".$column["nombre"].": </span>". $column["mensaje"] . "<span class='hora'>" .formatearfecha($column["hora"]). "</span></p>";
 }

    function formatearFecha($fecha){
    return date('g:i a',strtotime($fecha));
    }
    
?>
