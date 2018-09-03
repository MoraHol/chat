  <?php
    require "DB.php";

    if(empty($_POST["nombre"]) || empty($_POST["pass"])){
        header("location: ../index.html");
        exit();
    }else{

        session_start();
        $_SESSION["usuario"] = $_POST["nombre"];
        $query= "SELECT * FROM chat_users WHERE nombre = "."'".$_POST["nombre"]."'";
        $result = mysqli_query($conexion,$query) or die ("error al consultar".mysqli_error());



        if($row = mysqli_fetch_array($result)){
            if($row["password"] == $_POST["pass"]){
                header("location: ../frontend/view/index.html");
                exit();
            }else{
                header("location: ../index.html");
                exit();
            }
        }else{
            header("location: ../index.html");
            exit();
        }
    }
?>
