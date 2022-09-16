<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="anjo Eijeriks">
    <title>gar-read-auto.php</title>
</head>
<body>
<h1>garage read auto</h1>
<p>
    dit zijn alle gegevens uit de
    tabel auto van de database garage
</p>
<?php
// tabel uitlezen en netjes afdrukken------------------
require_once "gar-connect.php";
$autos = $conn->prepare("
                                   select  klantid,
                                           autokenteken,
                                           automerk,
                                           autotype,
                                           autokmstand
                                   from    auto
                                   
                                 ");
$autos->execute();

echo "<table>";
foreach($autos as $auto)
{
    echo "<tr>";
    echo "<td>". $auto["klantid"]      ."</td>";
    echo "<td>". $auto["autokenteken"]    ."</td>";
    echo "<td>". $auto["automerk"]   ."</td>";
    echo "<td>". $auto["autotype"]."</td>";
    echo "<td>". $auto["autokmstand"]  ."</td>";
    echo "</tr>";
}

echo "</table>";
echo "<a href='gar-menu.php'> terug naar het menu </a>";
?>
</body>
</html>

