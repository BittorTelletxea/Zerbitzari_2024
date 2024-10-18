<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erregistratu</title>
    <link rel="stylesheet" href="style/estilo.css">
</head>
<body>

    <div id="container">
        <h3>Erregistratu</h3>
        <form action="registrate.php" method="post" >            <p>Usuarioa<input type="text" name="izena" placeholder="Sartu zure izena"></p>
            <p>Pasahitza<input type="password" name="pasahitza" placeholder="Sartu zure pasahitza"></p>
            <input type="submit" value="Erregistratu" name="sartu"><br>
            
            <div class="form-footer">
                <input type="submit" value="Kontua baduzu?" name="login">
            </div>
        </form>
    </div>

</body>
</html>
