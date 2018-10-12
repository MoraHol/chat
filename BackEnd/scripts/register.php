<?php
require "../DB/DBOperator.php";
$db = new DBOperator("localhost", "root@localhost", "test","");
if (sizeof($_GET) > 3) {
    $query = "SELECT * FROM chat_users WHERE nombre = '" . $_GET["userName"] . "'";
    $result = $db->consult($query,"yes");
    if (count($result) > 0) {
        echo "este nombre de usuario ya esta en uso";
        exit();
    }
    $query = "SELECT * FROM chat_users WHERE email = '" . $_GET["email"] . "'";
    $result = $db->consult($query,"yes");
    if (count($result) > 0) {
        echo "este correo ya esta en uso";
        exit();
    }

    if ($_GET["pass"] != $_GET["repeatPass"]) {
        echo "la contraseña no coincide";
        exit();
    }
    $query = "INSERT INTO `chat_users` (`id`, `nombre`, `email`, `password`) VALUES (NULL,'" . $_GET["userName"] . "','" . $_GET["email"] . "','" . $_GET["pass"] . "')";
    $result = $db->consult($query);
    if ($result) {
        echo "Se ha registrado satisfactoriamente";
    } else {
        echo "No se ha podido registrar";
    }
}

?>
