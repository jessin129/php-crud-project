
<html lang="nl" xmlns="http://www.w3.org/1999/html">
<head>
    <meta name="author" content="anjo eijeriks">
    <meta charset="utf-8">
    <title>gar-create-auto2.php</title>
</head>
<body>
<h1>garage create auto 2</h1>
<p>
    Een auto toevoegen aan de tabel
    auto in de database garage
</p>

<?php
//klantgegevens uit het formulier halen-------------
$id= null;
$autokenteken  =$_POST["autokentekenvak"];
$automerk  =$_POST["automerkvak"];
$autotype=$_POST["autotypevak"];
$klantid=$_POST["klantidvak"];


//klantgegevens invoeren in de tabel------------------------------
require_once "gar-connect.php";

$sql = $conn->prepare("
             insert into auto (autokenteken, automerk, autotype, klantid)
             VALUES (:akenteken, :amerk,  :aautotype, :autoid )
          ");

$sql->execute( [
        "akenteken" => $autokenteken ,
        "amerk" => $automerk,
        "aautotype" => $autotype,
        "autoid" => $klantid
    ]
);

echo "<br>De data is toegevoegdd onder nummer " . $conn->lastInsertId();
echo "<a href='gar-menu.php'>Terug naar het menu. </a>";
?>