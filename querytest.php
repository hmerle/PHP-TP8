<!DOCTYPE html>
<html lang="fr">
<head>
    <title>AYAYOUB</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<?php

include 'connexpdo.php';

$dsn = 'pgsql:host=localhost;port=5432;dbname=citations;';
$user = 'postgres';
$password = 'new_password';
$idcon = connexpdo($dsn, $user, $password);

$query1 = "SELECT nom, prenom FROM auteur";
$result1 = $idcon->query($query1);
echo "<h2>Auteurs de la BDD</h2>";
echo "<table class='table table-striped table-bordered'>";
echo "<thead><br><th scope='col'>Nom</th><th scope='col'>Prénom</th></thead>";
echo "<tbody>";
foreach($result1 as $data){
    echo "<tr><td>".$data['nom']."</td><td>".$data['prenom']."</td></tr>";
}
echo "</table>";

$query1 = "SELECT phrase FROM citation";
$result1 = $idcon->query($query1);
echo "<h2>Citations de la BDD</h2>";
echo "<table class='table table-striped table-bordered'>";
echo "<tbody>";
foreach($result1 as $data){
    echo "<tr><td>".$data['phrase']."</td></tr>";
}
echo "</table>";

$query1 = "SELECT numero FROM siecle";
$result1 = $idcon->query($query1);
echo "<h2>Siècles de la BDD</h2>";
echo "<table class='table table-striped table-bordered'>";
echo "<tbody>";
foreach($result1 as $data){
    echo "<tr><td>".$data['numero']."</td></tr>";
}
echo "</table>";

?>
</head>
</html>
