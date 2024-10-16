<html>
<head>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
            margin: auto;
            font-size: 18px;
            text-align: center;
            margin-top: 5%;
            font-family: 'Arial', sans-serif;
        }
        td {
            padding: 12px;
            border: 1px solid #ddd;
            font-size: 20px;
        }
        h2 {
            text-align: center;
            margin-top: 30px;
            font-family: 'Import', sans-serif;
        }
    </style>
</head>
<body>
<h2>Real Madrid-en alineazioa</h2>
<?php
$tituluak = array("Izena", "Abiz1", "Abiz2");
$izenak = array(
    array("Jaime", "Latre", "Ortega"),
    array("Manuel", "Munuera", "Montero"), 
    array("Antonio", "Mateu", "Laoz")
);
echo "<table>";
echo "<tr>";
foreach ($tituluak as $a) {
    echo "<td><b>" . $a . "</b></td>"; 
}
echo "</tr>";

foreach ($izenak as $a) {
    echo "<tr>";
    foreach ($a as $b) {
        echo "<td>" . $b . "</td>"; 
    }
    echo "</tr>";
}

echo "</table>";
?>

</body>
</html>
