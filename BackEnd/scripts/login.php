  <?php
    require "../blockchain/blockchain.php";
    require "../DB/DBOperator.php";
    if (empty($_POST["nombre"]) || empty($_POST["pass"])) {
        header("location: ../../FrontEnd/view/login.html");
        exit();
    } else {
        session_start();
        $blockchain = new Blockchain();
        $_SESSION["chain"] = serialize($blockchain);
        $_SESSION["usuario"] = $_POST["nombre"];
        $db = new DBOperator("localhost", "root@localhost", "test","");
        $query = "SELECT * FROM chat_users WHERE nombre = " . "'" . $_POST["nombre"] . "'";
        $result = $db->consult($query, "yes");
        if (isset($result)) {
            foreach ($result as $row) {
                if ($row["password"] == $_POST["pass"]) {
                    header("location: ../../FrontEnd/view/index.html");
                    exit();
                } else {
                    header("location: ../FrontEnd/view/login.html");
                    exit();
                }
            }
        } else {
            header("location: ../../FrontEnd/view/login.html");
            exit();
        }
    }
    ?>
