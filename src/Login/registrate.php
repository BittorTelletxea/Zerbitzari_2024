<?php
    include('db.php');
    session_start();

    if (isset($_POST["login"])) {
        include('Login.php');
        exit();
    } elseif (isset($_POST["sartu"])) {
        $izena = $_POST["izena"];
        $pasahitza = $_POST["pasahitza"];
        $argazkia = $_FILES["argazkia"]["name"]; 
        $_SESSION["izena"] = $_POST["izena"];

        $sql2 = "INSERT INTO usuario (izena, pasahitza,argazkia) VALUES ('$izena', '$pasahitza','$argazkia')";
        $sql1 = "SELECT * FROM usuario WHERE izena = '$izena' ";


        $stmt = $conn->prepare($sql1);
        $stmt2 = $conn->prepare($sql2);



        if ($stmt->execute()) {
            $result = $stmt->get_result();
    
            if ($result->num_rows > 0) {
                echo "erabiltzailea existitzen da";
            } else {
                if($stmt2->execute()){
                    include('logeatua.php');
                    exit();                
                }
            }

        $stmt->close();
    }

  }

    $conn->close();
    ?>
