<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="author" content="Anjo Eijeriks">
    <meta charset="UTF-8">
    <title>gar-update-klant3.php</title>
</head>
<body>
<h1>garage update klant 3</h1>
<p>
    Klantgegevens wijzigen in de tabel klant van de database garage.
</p>
<?php
// klantgegevens uit het formulier halen -----------------------
        $klantid            = $_POST ["klantidvak"];
        $klantnaam          = $_POST  ["klantnaamvak"];
        $klantadres         = $_POST  ["klantadresvak"];
        $klantpostadres      = $_POST  ["klantpostcodevak"];
        $klantplaats        = $_POST   ["klantplaatsvak"];
        // updaten klantgegevens ---------------------------------------
        require_once "gar-connect.php";
        $sql = $conn->prepare
        ("
            update klant set     klantnaam         = :klantnaam,
                                 klantadres        = :klantadres,
                                 klantpostadres     = :klantpostadres,
                                 klantplaats       = :klantplaats
                                 where   klantid   = :klantid
        ");

        $sql->execute
        ([
            "klantid"           => $klantid,
            "klantnaam"         => $klantnaam,
            "klantadres"        => $klantadres,
            "klantpostadres"     => $klantpostadres,
            "klantplaats"       => $klantplaats
        ]);

        echo "De klant is gewijzigd. <br/>";
    echo "<a href='gar-menu.php'> terug naar het menu </a>";
    ?>
</body>
</html>
