YPE html>
<html lang="en">
<head>
    <meta name="authot" content="Anjo Eijerks">
    <meta charset="UTF-8">
    <title>gar-update-auto2.php</title>
</head>
<body>
<h1>garage update auto 2</h1>
<p>
    Dit formulier wordt gebruikt om autogegevens te wijzigen in de tabel van de database garage.
</p>
<?php
// klantid uit het formulier halen ---------------------------------
$klantid = $_POST["klantidvak"];
// klantgegevens uit de tabel halen --------------------------------
require_once "gar-connect.php";

$klanten = $conn->prepare("select klantid,
                                         autokenteken,
                                         automerk,
                                         autotype,
                                         autokmstand
                                from     auto
                                where    klantid = :klantid
                             ");
$klanten->execute(["klantid" => $klantid]);

// autogegevens in een nieuw formulier laten zien -----------------
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

