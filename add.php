<?php

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=ecommerce', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$date = $_POST['date_changement'];
$etage = $_POST['etage'];
$position = $_POST['position_ampoule'];
$prix = $_POST['prix_ampoule'];

$statement = $pdo->prepare("INSERT INTO ampoules (date_changement, etage, position_ampoule, prix_ampoule)
    VALUES (:date_changement, :etage , :position_ampoule, :prix_ampoule)");

$statement->bindValue('date_changement', $date);
$statement->bindValue('etage', $etage);
$statement->bindValue('position_ampoule', $position);
$statement->bindValue('prix_ampoule', $prix);

$statement->execute();

header('Location: index.php');