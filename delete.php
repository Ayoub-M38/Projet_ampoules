<?php

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=ecommerce', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

/*
$statement = "DELETE FROM ampoules WHERE id_ampoule = ?";

$delete = $pdo->prepare($statement);
$id = $_GET['id_delete'];
$delete->bindParam(1, $id);

$delete->execute();
*/

$statment = $pdo->prepare('DELETE FROM ampoules WHERE id_ampoule= :id')

header('location: index.php');



