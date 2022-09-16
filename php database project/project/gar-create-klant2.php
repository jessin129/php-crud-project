<!doctype html>
<html lang="nl">
   <head>
    <meta name="author" content="anjo eijeriks">
    <meta charset="utf-8">
    <title>gar-create-klant2.php</title>
   </head>
  <body></body>
        <h1>garage create klant 2</h1>
        <p>
            Een klant toevoegen aan de tabel
            klant in de database garage
        </p>

        <?php
            //klantgegevens uit het formulier halen-------------

        $klantnaam  =$_POST["klantnaamvak"];
        $klantadres  = $_POST["klantadresvak"];
        $klantpostadres=$_POST["klantpostcodevak"];
        $klantplaats=$_POST["klantplaatsvak"];


        //klantgegevens invoeren in de tabel------------------------------
         require_once "gar-connect.php";

         $sql = $conn->prepare("
             insert into klant (klantnaam, klantadres, klantpostadres, klantplaats)
             VALUES (:knaam, :kadres, :kpostcode, :kplaats )
          ");

         $sql->execute( [
                         "knaam" => $klantnaam,
                         "kadres" => $klantadres,
                         "kpostcode" => $klantpostadres,
                         "kplaats" => $klantplaats
                 ]
         );

         echo "<br>De data is toegevoegd onder nummer " . $conn->lastInsertId();
        echo "<a href='gar-menu.php'>Terug naar het menu. </a>";
        ?>







