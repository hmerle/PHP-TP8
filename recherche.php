<?php

include 'connexpdo.php';

$dsn = 'pgsql:host=localhost;port=5432;dbname=citations;';
$user = 'postgres';
$password = 'new_password';
$idcon = connexpdo($dsn, $user, $password);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>AYAYOUB</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

                <li class="nav-item">
                    <a class="nav-link" href="citation.php">Informations</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="recherche.php">Recherche</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="modification.php">Modification</a>
                </li>
            </ul>
        </div>
    </nav>
    <h1>Rechercher une citation</h1>
    <hr>
    <div class="container">
        <form class="form-group">
            <label for="selectAuteur">Auteur</label>
                <select class="form-control" id="selectAuteur">
                    <?php
                    $query1 = "SELECT * FROM auteur";
                    $result1 = $idcon->query($query1);
                    $i = 0;
                    foreach($result1 as $data)
                    {
                        $i++;
                    }
                    for($j = 1; $j <= $i; $j++){
                        $query = "SELECT nom, prenom FROM auteur where id = $j";
                        $result2 = $idcon->prepare($query);
                        $result2->execute();
                        $res2 = $result2->fetch();
                        echo "<option>".$res2[1]." ".$res2[0]."</option>";
                    }
                    ?>
                </select>
            <br>
            <label for="selectSiecle">Siècle</label>
                <select class="form-control" id="selectSiecle">
                    <?php
                    $query1 = "SELECT * FROM siecle";
                    $result1 = $idcon->query($query1);
                    $i = 0;
                    foreach($result1 as $data)
                    {
                        $i++;
                    }
                    for($j = 2; $j <= $i + 1; $j++){
                        $query = "SELECT numero FROM siecle where id = $j";
                        $result2 = $idcon->prepare($query);
                        $result2->execute();
                        $res2 = $result2->fetch();
                        echo "<option> ".$res2[0]."</option>";
                    }
                    ?>
                </select>
            <br>
            <button type="submit" class="btn btn-primary mb-2">Rechercher</button>
        </form>
    </div>
</body>
