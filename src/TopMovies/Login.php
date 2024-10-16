<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log-In</title>
    <link rel="stylesheet" href="style/estilo.css">
        
</head>
<body>

    <div id="container">
        <h3>Log-In</h3>
        <form action="login.php" method="post">
            <p>Usuarioa<input type="text" name="izena" placeholder="Sartu zure izena"></p>
            <p>Pasahitza<input type="password" name="pasahitza" placeholder="Sartu zure pasahitza"></p>
            <input type="submit" value="Sartu" name="sartu"><br>
            
            <div class="form-footer">
                <input type="submit" value="konturik ez?" name="erregistratu">
            </div>
        </form>
    </div>

</body>
</html>
