<?php
require "DB.php";
?>
    <html>
    <head>
    </head>
    <body>
        <form action="register.php" method="post">
            <br>
            <input type="text" name="username" placeholder="Ingresa tu nombre de usuario" required>
            <br>
            <input type="email" name="email" placeholder="Ingresa tu correo electronico" required>
            <br>
            <input type="password" name="pass" placeholder="Ingresa tu contraseña" required id="pass">
            <br>
            <input type="password" name="repeat-pass" placeholder="Ingresa nuevamente tu contraseña" required id="repeat_pass">
            <br>
            <input type="submit" name="send" value="Registrarme">

        </form>
        <button><a href="../index.html" style="text-decoration:none;">Ingresar</a></button>
        <div>
            <?php
            if (sizeof($_POST) > 3) {
                $query = "SELECT * FROM chat_users WHERE nombre = '" . $_POST["username"] . "'";
                $result = mysqli_query($conexion, $query) or die("pinche");
                if ($column = mysqli_fetch_array($result)) {
                    echo "este nombre de usuario ya esta en uso";
                    exit();
                }
                $query = "SELECT * FROM chat_users WHERE email = '" . $_POST["email"] . "'";
                $result = mysqli_query($conexion, $query);

                if ($column = mysqli_fetch_array($result)) {
                    echo "este correo ya esta en uso";
                    exit();
                }

                if ($_POST["pass"] != $_POST["repeat-pass"]) {
                    echo "la contraseña no coincide";
                    exit();
                }
                $query = "INSERT INTO `chat_users` (`id`, `nombre`, `email`, `password`) VALUES (NULL,'" . $_POST["username"] . "','" . $_POST["email"] . "','" . $_POST["pass"] . "')";
                $result = mysqli_query($conexion, $query) or die("paila");
                if ($result) {
                    echo "se ha registrado satisfactoriamente";
                } else {
                    echo "no se ha podido registrar";
                }
            }

            ?>
        </div>
    </body>

    </html>
