<?php
/*
Hoi Yessin,

Dit formulier werkt nu goed! Er zaten inderdaad een paar kleine(!) foutjes in.

** De tabelnaam in de prepare stond op KLANT terwijl de tabel KLANTEN heet.
** Er stond een komma na klantplaats, maar die mocht daar niet staan vanwege de FROM.
** FROM was per ongeluk gespeld als FORM.

Ik heb de FOREACH() een beetje veranderd. Hierdoor heb je veel minder last
van het gedoe met ' of ". Dat gebeurt door uit PHP te gaan, terug naar HTML
waarbij je per veld kunt vragen om de inhoud van het veld.

De values van de velden zijn altijd

        <input type="text" ... value="<?= $klant['iets'];?>"><br>
        |                            ^---------------------^|
        ^input begint met een < en eindigt met een >        ^

Dat ziet er een beetje vreemd uit, maar het klopt wél.
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="authot" content="Anjo Eijerks">
    <meta charset="UTF-8">
    <title>gar-update-klant2.php</title>
</head>
<body>
<h1>garage update klant 2</h1>
<p>
    Dit formulier wordt gebruikt om klantengegevens te wijzigen in de tabel van de database garage.
</p>
<?php
// klantid uit het formulier halen ---------------------------------
$klantid = $_POST["klantidvak"];
// klantgegevens uit de tabel halen --------------------------------
require_once "gar-connect.php";

$klanten = $conn->prepare("select klantid,
                                         klantnaam,
                                         klantadres,
                                         klantpostadres,
                                         klantplaats
                                from     klant
                                where    klantid = :klantid
                             ");
$klanten->execute(["klantid" => $klantid]);

// klantgegevens in een nieuw formulier laten zien -----------------
echo "<form action='gar-update-klant3.php' method='post'>";
foreach($klanten as $klant)
{
?>
<!-- klantid mag niet gewijzigd worden-->
Klantid: <?php echo $klant["klantid"]?><br>
<input type="hidden" name="klantidvak"
       value="<?= $klant['klantid'];?>"><br>
Klantnaam:
<input type="text" name="klantnaamvak"
       value="<?= $klant['klantnaam'];?>"><br>
Klantadres:
<input type="text" name="klantadresvak"
       value="<?= $klant['klantadres'];?>"><br/>
Klantpostcode:
<input type="text" name="klantpostcodevak"
       value="<?= $klant["klantpostcode"];?>"><br>
Klantplaats:
<input type="text" name="klantplaatsvak"
       value="<?= $klant["klantplaats"];?>"><br>

     <input type='submit'>
                                                                                                                                                                                                                                                                            </form>

    <?php;}
