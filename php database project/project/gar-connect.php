<?php
// gar-connect.php
//maakt een connectie met de database 'garage
//Anjo eijeriks

$servernaam='localhost';
$dbname='project garage';
$username='root';
$password='root';

try {
    $conn = new PDO("mysql:host=$servernaam;dbname=$dbname",
        $username, $password);

    $conn->setAttribute(pdo::ATTR_ERRMODE, pdo::ERRMODE_EXCEPTION);
    //echo "connectie gelukt <br />";
}
catch (pdoException $e)
{
    echo "connectie mislukt:" .$e->getMessage();
}
?>