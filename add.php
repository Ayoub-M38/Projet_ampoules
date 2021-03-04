<?php

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=ecommerce', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$date = $_POST['date_changement'];
$etage = $_POST['etage'];
$position = $_POST['position_ampoule'];
$prix = $_POST['prix_ampoule'];


if (!is_dir('images')) {
    mkdir('images');
}

if (empty($errors)) {
    $image = $_FILES['image'] ?? null;
    $imagePath = '';
    if ($image && $image['tmp_name']) {

        $imagePath = 'images/' . randomString(8) . '/' . $image['name'];
        mkdir(dirname($imagePath));

        move_uploaded_file($image['tmp_name'], $imagePath);
    }


    $statement = $pdo->prepare("INSERT INTO ampoules (date_changement, etage, position_ampoule, prix_ampoule, image)
    VALUES (:date_changement, :etage , :position_ampoule, :prix_ampoule, :image)");

    $statement->bindValue('date_changement', $date);
    $statement->bindValue('etage', $etage);
    $statement->bindValue('position_ampoule', $position);
    $statement->bindValue('prix_ampoule', $prix);
    $statement->bindValue('image', $imagePath);

    $statement->execute();

    header('Location: index.php');
}
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

