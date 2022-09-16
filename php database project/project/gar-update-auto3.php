<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="author" content="Anjo Eijeriks">
    <meta charset="UTF-8">
    <title>gar-update-auto3.php</title>
</head>
<body>
<h1>garage update auto 3</h1>
<p>
    autogegevens wijzigen in de tabel klant van de database garage.
</p>
<?php
// klantgegevens uit het formulier halen -----------------------
$klantid            = $_POST ["klantidvak"];
$autokenteken         = $_POST  ["klantnaamvak"];
$automerk        = $_POST  ["klantadresvak"];
$autotype     = $_POST  ["klantpostcodevak"];
$autokmstand        = $_POST   ["klantplaatsvak"];
// updaten klantgegevens ---------------------------------------
require_once "gar-connect.php";
$sql = $conn->prepare
("
            update auto set     autokenteken        = :autokenteken,
                                 automerk       = :automerk,
                                 autotype     = :autotype,
                                 autokmstand     = :autokmstand
                                 where   klantid   = :klantid
        ");

$sql->execute
([
    "klantid"           => $klantid,
    "autokenteken"         => $autokenteken,
    "automerk"        => $automerk,
    "autotype"     => $autotype,
    "autokmstand"       => $autokmstand
]);

echo "De auto is gewijzigd. <br/>";
echo "<a href='gar-menu.php'> terug naar het menu </a>";
?>
</body>
</html>

