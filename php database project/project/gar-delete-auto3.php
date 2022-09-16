<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="author" content="Anjo Eijeriks"
    <meta charset="UTF-8">
    <title>gar-delete-auto3.php</title>
</head>
<body>
<h1>garage delete auto 3</h1>
<p>
    Op klantid gegevens zoeken uit de tabel auto van de database garage zodat ze verwijderd kunnen worden.
</p>
<?php
// gegevens uit het formulier halen ------------------------------
$klantid        = $_POST["klantidvak"];
$verwijderen    = $_POST["verwijdervak"];
// klantgegevens verwijderen -------------------------------------
if ($verwijderen)
{
    require_once "gar-connect.php";
    $sql = $conn->prepare ("
                                        delete from auto
                                        where   klantid = :klantid
                                   ");
    $sql->execute(["klantid" => $klantid]);

    echo "De gegevens zijn verwijderd. <br />";
}
else
{
    echo "De gegevens zijn niet verwijderd. <br />";
}
echo "<a href='gar-menu.php'>Terug naar het menu. </a>";
?>
</body>
</html>

