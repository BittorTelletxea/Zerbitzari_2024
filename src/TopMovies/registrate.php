<?php
    include('db.php');
    session_start();

    if (isset($_POST["login"])) {
        include('Login.php');
        exit();
    } elseif (isset($_POST["sartu"])) {
        $izena = $_POST["izena"];
        $pasahitza = $_POST["pasahitza"];
        $_SESSION["usuario"] = $_POST["izena"];

        $sql2 = "INSERT INTO usuario (izena, pasahitza) VALUES ('$izena', '$pasahitza')";
        $sql1 = "SELECT * FROM usuario WHERE izena = '$izena' ";


        $stmt = $conn->prepare($sql1);
        $stmt2 = $conn->prepare($sql2);



        if ($stmt->execute()) {
            $result = $stmt->get_result();
    
            if ($result->num_rows > 0) {
                echo "<link rel='stylesheet' href='style/style.css'><div id='container'>Erabiltzailea existitzen da</div>"; 
            } else {
                if($stmt2->execute()){
                    include('topmovies.html');
                    exit();                
                }
            }

        $stmt->close();
    }

  }

    $conn->close();
    ?>
