<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erregistratu</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }

        #container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 400px;
        }

        h3 {
            font-size: 24px;
            color: #2c3e50;
            margin-bottom: 20px;
        }

        form p {
            margin-bottom: 15px;
        }

        input[type="text"], input[type="file"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }
        input[type="password"], input[type="file"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }

        input[type="submit"] {
            width: 25%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid black;
            border-radius: 5px;
            font-size: 12px;
            font-weight: bold;
            color: black;
            background-color: transparent;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #d3d3d3;
        }

        .form-footer {
            margin-top: 15px;
            font-size: 14px;
            color: #7f8c8d;
        }

        .form-footer input[type="submit"] {
            border: none;
            background: none;
            color: grey;
            font-size: 14px;
            cursor: pointer;
            text-decoration: underline;
        }

        .form-footer input[type="submit"]:hover {
            color: #7f8c8d;
        }
    </style>
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
