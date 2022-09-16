<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="author" content="Anjo Eijeriks"
    <meta charset="UTF-8">
    <title>gar-delete-auto2.php</title>
</head>
<body>
<h1>garage delete auto 2</h1>
<p>
    Op klantid gegevens zoeken uit de tabel auto van de database garage zodat ze verwijderd kunnen worden.
</p>
<?php
// klantid uit het formulier halen
$klantid = $_POST["klantidvak"];

// autogegevens uit de tabel halen
require_once "gar-connect.php";

$autos = $conn->prepare("
                          select klantid, 
                          autokenteken, 
                          automerk, 
                          autotype, 
                          autokmstand 
                          from   auto 
                          where   klantid = :klantid
                          ");
$autos->execute(["klantid" => $klantid]);

// klantgegevens laten zien
echo "<table>";
foreach($autos as $auto)
{
    echo "<tr>";
    echo "<td>" . $auto["klantid"] . "</td>";
    echo "<td>" . $auto["autokenteken"] . "</td>";
    echo "<td>" . $auto["automerk"] . "</td>";
    echo "<td>" . $auto["autotype"] . "</td>";
    echo "<td>" . $auto["autokmstand"] . "</td>";
    echo "</tr>";
}
echo "</table><br />";

echo "<form action='gar-delete-auto3.php' method='post'>";
// klantid mag niet meer gewijzigd worden
echo "<input type='hidden' name='klantidvak' value=$klantid>";
// Waarde 0 doorgegeven als er niet gechekt wordt
echo "<input type='hidden' name='verwijdervak' value='0'>";
echo "<input type='checkbox' name='verwijdervak' value='1'>";
echo "Verwijder deze auto. <br />";
echo "<input type='submit'>";
echo "</form>";
?>
</body>
</html>
