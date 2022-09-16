<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="anjo eijeriks">
    <title>gar-search-klant2.php</title>
</head>
<body>
<h1>garage zoek op klantid 2</h1>
<p>
    op klantid gegevens zoeken uit de
    tabel klanten van de database garage
</p>
<?php
        // klantid uit het formulier halen-------------
        $klantid = $_POST["klantidvak"];
        // klantgegevens uit de tabel halen------------
        require_once "gar-connect.php";
 $klanten = $conn->prepare("
                                     select  klantid,
                                             klantnaam,
                                             klantadres,
                                             klantpostadres,
                                             klantplaats
                                     from    klant
                                     where   klantid = :klantid
                                  ");
$klanten->execute(["klantid" => $klantid]);

// klantgegevens laten zien---------------------------
echo "<table>";
foreach ($klanten as $klant)
{
    echo "<tr>";
    echo "<td>". $klant["klantid"]      ."</td>";
    echo "<td>". $klant["klantnaam"]    ."</td>";
    echo "<td>". $klant["klantadres"]   ."</td>";
    echo "<td>". $klant["klantpostadres"]."</td>";
    echo "<td>". $klant["klantplaats"]  ."</td>";
    echo "</tr>";
}
echo "</table>";
echo "<a href='gar-menu.php'> terug naar het menu </a>";
?>

</body>
</html>