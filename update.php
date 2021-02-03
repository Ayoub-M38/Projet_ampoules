<?php

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=ecommerce', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$date_changement = $_POST['date_changement'];
$etage = $_POST['etage'];
$position_ampoule = $_POST['position_ampoule'];
$prix_ampoule = $_POST['prix_ampoule'];


$sql = "UPDATE ampoules SET date_changement = ?, etage = ?, position_ampoule = ?, prix_ampoule = ? WHERE id_ampoule = ?";

$statement = $pdo->prepare($sql);

$statement->bindParam(1, $date_changement);
$statement->bindParam(2, $etage);
$statement->bindParam(3, $position_ampoule);
$statement->bindParam(4, $prix_ampoule);
$id_maj = $_GET['id'];

$statement->execute(array($date_changement, $etage, $position_ampoule, $prix_ampoule, $id_maj));






header('Location: index.php');