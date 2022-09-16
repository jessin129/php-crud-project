<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="anjo eijeriks">
    <title>gar-search-auto2.php</title>
</head>
<body>
<h1>garage zoek op klantid 2</h1>
<p>
    op klantid gegevens zoeken uit de
    tabel auto van de database garage
</p>
<?php
// klantid uit het formulier halen-------------
$klantid = $_POST["klantidvak"];
// klantgegevens uit de tabel halen------------
require_once "gar-connect.php";
$autos = $conn->prepare("
                                     select  klantid,
                                             autokenteken,
                                             automerk,
                                             autotype,
                                             autokmstand
                                     from    auto
                                     where   klantid = :klantid
                                  ");
$autos->execute(["klantid" => $klantid]);

// autogegevens laten zien---------------------------
echo "<table>";
foreach ($autos as $auto)
{
    echo "<tr>";
    echo "<td>". $auto["klantid"]      ."</td>";
    echo "<td>". $auto["autokenteken"]    ."</td>";
    echo "<td>". $auto["automerk"]   ."</td>";
    echo "<td>". $auto[" autotype"]."</td>";
    echo "<td>". $auto["autokmstand"]  ."</td>";
    echo "</tr>";
}
echo "</table>";
echo "<a href='gar-menu.php'> terug naar het menu </a>";
?>

</body>
</html>
