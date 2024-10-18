<?php
include("db.php");
session_start();

if(isset($_POST["gorde"])) {
    $izenaOsoa = $_POST["izena"];
    $isan = $_POST["isan"];
    $urtea = $_POST["urtea"];
    $puntuazioa = $_POST["puntuazioa"];
    $argazkia = $_POST["argazkia"];
    $usuarioa = $_SESSION['usuario'];
    

    $izena = strtolower($izenaOsoa);

    if(strlen($isan)>0 && strlen($isan)<8 || strlen($isan) >8) {
        echo "<link rel='stylesheet' href='style/estilo.css'><div id='container'>ISAN zenbakiak 8 digitu izan behar ditu</div>";
    } else {
        $slctisan = "SELECT * FROM filmak WHERE ISAN = ?";
        $stmtislct1 = $conn->prepare($slctisan);

        $stmtislct1->bind_param("i", $isan);
        
        if($stmtislct1->execute()) {
            $resultisan = $stmtislct1->get_result();
            
            if($resultisan->num_rows > 0) {
                if(!empty($izena) && !empty($urtea) && !empty($puntuazioa) && !empty($isan)){
                $uptfilma = "UPDATE filmak SET izena = ?, puntuazioa = ? WHERE ISAN = ? and usuario = ?";
                $stmtupdt = $conn->prepare($uptfilma);

                $stmtupdt->bind_param("siis", $izena, $puntuazioa, $isan, $usuarioa);
                
                if($stmtupdt->execute()) {
                    echo "<link rel='stylesheet' href='style/estilo.css'><div id='container'>Erregistroa aktualizatuta</div>";
                } else {
                    echo "<link rel='stylesheet' href='style/estilo.css'><div id='container'>Errorea aktualizatzen</div>";
                                 
                }
            }
            } else {
                if(!empty($izena) && !empty($urtea) && !empty($puntuazioa) && !empty($isan) && !empty($argazkia)) {
                    $insrtdatuak = "INSERT INTO filmak (usuario, izena, ISAN, urtea, puntuazioa, argazkia) VALUES (?,?,?,?,?,?)";
                    $stmtinsrt = $conn->prepare($insrtdatuak);

                    $stmtinsrt->bind_param("ssiiis",$usuarioa,$izena,$isan,$urtea,$puntuazioa,$argazkia);
                    
                    if($stmtinsrt->execute()) {
                        echo "<link rel='stylesheet' href='style/estilo.css'><div id='container'>Erregistroa gordea</div>"; 
                    } else {
                        echo "<link rel='stylesheet' href='style/estilo.css'><div id='container'>Errorea gordetzean</div>";
                                         
                    }
                }
            }
        
        } else {
            echo "<link rel='stylesheet' href='style/estilo.css'><div id='container'>Errorea isan kontsultan</div>";
                   
        }
    

    if(empty($isan) && !empty($izena)) {
        $slctizena = "SELECT * FROM filmak WHERE izena = ? and usuario = ?";
        $stmtislct2 = $conn->prepare($slctizena);

        $stmtislct2 ->bind_param("ss", $izena,$usuarioa);

        if ($stmtislct2->execute()) {
            $result2 = $stmtislct2->get_result();
            echo "<link rel='stylesheet' href='style/estilo.css'>";
            echo "<div id='container3'>";
            echo "<h3 class='header'>$izena- izena duten filmak:</h3>";
        
            if ($result2->num_rows > 0) {
                echo "<div class='movie-list'>";
                while ($row = $result2->fetch_assoc()) {
                    echo "<div class='movie-item'>";
                    echo "<h4 class='movie-title'>" . $row['izena'] . "</h4>";
                    echo "<p class='movie-year'>Urtea: " . $row['urtea'] . "</p>";
                    echo "<p class='movie-rating'>Puntuazioa: " . $row['puntuazioa'] . "/5</p>";
                    echo "<p class='movie-rating'>Usuarioa: " . $row['usuario'] . "</p>";
                    echo "<div id='argazkia'><img src='argazkiak/".$row['argazkia']."' width = '100px' height= '100px' /></div>"; 
                    echo "</div>"; 
                }
                echo "</div>"; 
        
                echo "<form action='topmovies.php' method='post'>";
                echo "<div>";
                echo "<input type='submit' value='Atzera' name='atzera'>";
                echo "</div>"; 
                echo "</form>";
        
            } else {
                echo "<p class='no-movies'>Ez daude filmik izen horrekin</p>";
            }
        
            echo "</div>";
        }
    }

    if(!empty($isan) && empty($izena)) {
        $dltfilma = "DELETE FROM filmak WHERE ISAN = ? and usuario = ?";
        $stmtdlt = $conn->prepare($dltfilma);

        $stmtdlt ->bind_param("is", $isan, $usuarioa);

        if($stmtdlt->execute()) {
            if($stmtdlt->affected_rows > 0){
                echo "<script>
                        var seguru = confirm('Seguru zaude?');
                        if(seguru){
                            alert('Filma ezabatua');
                        } else {
                            window.location.href = 'topmovies.html';
                        }
                      </script>";
            } else {
                echo "<link rel='stylesheet' href='style/estilo.css'><div id='container'>Ez daude filmik zenbaki horrekin</div>";
                echo "<div class='form-footer'>";
                echo "<input type='submit' value='Atzera' name='atzera'>";
                echo "</div>";             
            }
        }
    }

    }
}

if(isset($_POST["gordetakoak"])){
    $usuarioa = $_SESSION['usuario'];

    $slct="SELECT * FROM filmak WHERE usuario = ?";

    $stmtslct = $conn->prepare($slct);
    $stmtslct->bind_param("s", $usuarioa);

    if ($stmtslct->execute()) {
        $result = $stmtslct->get_result();
        echo "<link rel='stylesheet' href='style/estilo.css'>";
        echo "<div id='container3'>";
        echo "<h3 class='header'>$usuarioa-ren filmak:</h3>";
    
        if ($result->num_rows > 0) {
            echo "<div class='movie-list'>";
            while ($row = $result->fetch_assoc()) {
                echo "<div class='movie-item'>";
                echo "<h4 class='movie-title'>" . $row['izena'] . "</h4>";
                echo "<p class='movie-year'>Urtea: " . $row['urtea'] . "</p>";
                echo "<p class='movie-rating'>Puntuazioa: " . $row['puntuazioa'] . "/5</p>";
                echo "<div id='argazkia'><img src='argazkiak/".$row['argazkia']."' width = '100px' height= '100px' /></div>"; 
                echo "</div>"; 
            }
            echo "</div>"; 
    
            echo "<form action='topmovies.php' method='post'>";
            echo "<div>";
            echo "<input type='submit' value='Atzera' name='atzera'>";
            echo "</div>"; 
            echo "</form>";
    
        } else {
            echo "<p class='no-movies'>$usuarioa-ek ez ditu filmik</p>";
        }
    
        echo "</div>";
    }
}
    if (isset($_POST["atzera"])) {
        header("Location: topmovies.html");
        exit();
    }
    if (isset($_POST["amaitu"])){
        header("Location: Login.php");
        exit();
    }
    if (isset($_POST["top"])) {
        $slct4 = "SELECT izena, AVG(puntuazioa) AS puntuazioa, argazkia 
        FROM filmak 
        GROUP BY izena 
        ORDER BY puntuazioa DESC 
        LIMIT 10";    
        $stmtslct4 = $conn->prepare($slct4); 
    
        if ($stmtslct4->execute()) {
            $result4 = $stmtslct4->get_result();
            echo "<link rel='stylesheet' href='style/estilo.css'>";
            echo "<div id='container4'>";
            echo "<h3 class='header'>Top filmak</h3>";
    
            if ($result4->num_rows > 0) {
                $topMovies = $result4->fetch_all(MYSQLI_ASSOC);
                
                echo "<div class='podium'>";
                echo "<div class='first-place'>";
                echo "<h4 class='podium-title'>" . $topMovies[0]['izena'] . "</h4>"; 
                echo "<div id='argazkia'><img src='argazkiak/".$topMovies[0]['argazkia']."' width = '100px' height= '100px' /></div>"; 

                echo "</div>";
    
                echo "<div class='second-place'>";
                echo "<h4 class='podium-title'>" . $topMovies[1]['izena'] . "</h4>"; 
                echo "<div id='argazkia'><img src='argazkiak/".$topMovies[1]['argazkia']."' width = '100px' height= '100px' /></div>"; 

                echo "</div>";
    
                echo "<div class='third-place'>";
                echo "<h4 class='podium-title'>" . $topMovies[2]['izena'] . "</h4>"; 
                echo "<div id='argazkia'><img src='argazkiak/".$topMovies[2]['argazkia']."' width = '100px' height= '100px' /></div>"; 

                echo "</div>";
                echo "</div>"; 
    
                echo "<div class='top-list'>";
                for ($i = 3; $i < count($topMovies); $i++) {
                    echo "<div class='top-item'>";
                    echo "<h4 class='top-title'>" . $topMovies[$i]['izena'] . "</h4>"; 
                    echo "</div>";
                }
                echo "</div>"; 
    
                echo "<form action='topmovies.php' method='post'>";
                echo "<div>";
                echo "<input type='submit' value='Atzera' name='atzera'>";
                echo "</div>"; 
                echo "</form>";
    
            } else {
                echo "<p class='no-movies'>Ez dago filmik</p>";
            }
    
            echo "</div>";
        }
    }
    

?>
