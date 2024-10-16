    <?php
    include('db.php');
    session_start();
    if (isset($_POST["erregistratu"])) {
        include('Registrate.php');
        exit();
    } elseif (isset($_POST["sartu"])) {
        $izena = $_POST["izena"];
        $pasahitza = $_POST["pasahitza"];
        $_SESSION["izena"] = $_POST["izena"];

        $sql = "SELECT * FROM usuario WHERE izena = '$izena'";
        $stmt = $conn->prepare($sql);


        if ($stmt->execute()) {
            $result = $stmt->get_result();
    
            if ($result->num_rows > 0 ) {
                    include('logeatua.php');
                    exit();
                
                
            } else {
                echo "Erabiltzailea ez da existitzen";
            }

        $stmt->close();
    }


    $conn->close();
}
    ?>
