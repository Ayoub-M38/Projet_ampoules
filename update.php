<?php

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=ecommerce', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$date_changement = $_POST['date_changement'];
$etage = $_POST['etage'];
$position_ampoule = $_POST['position_ampoule'];
$prix_ampoule = $_POST['prix_ampoule'];



    $sql = "UPDATE ampoules SET date_changement = ?, etage = ?, position_ampoule = ?, prix_ampoule = ?, image= ? WHERE id_ampoule = ?";

    $statement = $pdo->prepare($sql);

    $statement->bindParam(1, $date_changement);
    $statement->bindParam(2, $etage);
    $statement->bindParam(3, $position_ampoule);
    $statement->bindParam(4, $prix_ampoule);
    $statement->bindParam(5, $image);
    $id_maj = $_GET['id'];

    $statement->execute(array($date_changement, $etage, $position_ampoule, $prix_ampoule, $id_maj, $image));

    header('Location: index.php');


function randomString($n)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $str = '';
    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $str .= $characters[$index];
    }

    return $str;
}