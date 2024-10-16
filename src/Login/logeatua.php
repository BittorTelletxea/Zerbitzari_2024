<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h1>Kaixo! <?php echo $izena?></h1>
    <div id="container">
    <?php
    include('db.php');
    $izena = $_SESSION['izena'];
    echo "<br><div id='izena'>Usuario izena : " . $izena ."</div><br>";
    
    $sql = "SELECT argazkia FROM usuario where izena = '$izena'";
    $stmt = $conn->prepare($sql);

    if($stmt->execute()){
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            $argazkia = $row['argazkia']; 
            echo "<div id='argazkia'><img src='argazkiak/$argazkia' width = '100px' height= '100px' /></div>"; 
        } 
        
    }
    

    ?>
    <br>
    <button ><a href="Login.php">Amaitu saioa</a></button>
    </div>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: auto;
            padding: auto;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }

        #container {
            background-color: white;
            margin: auto;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 400px;
            text-align: center;
        }

        h1 {
            color: #2c3e50;
            font-size: 24px;
            margin-bottom: 20px;
        }

        #izena {
            font-size: 18px;
            color: #34495e;
            margin-bottom: 15px;
        }

        #argazkia img {
            border-radius: 50%;
            margin-top: 10px;
        }

        #argazkia {
            font-size: 16px;
            
            color: #7f8c8d;
        }
        button {
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            background-color: transparent;
            border:1px solid  black;
            border: none;
            border-radius: 3px;
            margin-top: 20px;
        }
        button a{
            text-decoration: none;
            color: black;
        }
    </style>

</body>
</html>