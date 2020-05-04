<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
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
<h1>La citation du jour</h1>
<hr>
<h4>Il y a <?php
        include 'connexpdo.php';

        $dsn = 'pgsql:host=localhost;port=5432;dbname=citations;';
        $user = 'postgres';
        $password = 'new_password';
        $idcon = connexpdo($dsn, $user, $password);

        $query1 = "SELECT * FROM citation";
        $result1 = $idcon->query($query1);
        $i = 0;
        foreach($result1 as $data)
        {
            $i++;
        }
        echo "<strong>$i</strong>";
        ?> citations répertoriées</h4>
<p>Et voici l'une d'entre elles qui est générée aléatoirement :</p>
<?php
try {
    $randint = random_int(1, $i);
} catch (Exception $e) {
}
$query2 = "SELECT phrase FROM citation WHERE id = $randint";
$result2 = $idcon->prepare($query2);
$result2->execute();
$res = $result2->fetch();
echo "<strong>$res[0]</strong><br>";
$query3 = "SELECT a.nom, a.prenom FROM citation c, auteur a WHERE (c.auteurid = a.id AND c.id = $randint)";
$query4 = "SELECT s.numero FROM siecle s, citation c WHERE (c.siecleid = s.id AND c.id = $randint)";
$result3 = $idcon->prepare($query3);
$result3->execute();
$res3 = $result3->fetch();
$result4 = $idcon->prepare($query4);
$result4->execute();
$res4 = $result4->fetch();
echo $res3[1]." ".$res3[0]." (".$res4[0]."<sup>ème</sup> siècle)";

?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>