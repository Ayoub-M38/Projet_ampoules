<?php
include_once "header.php";

 if (isset($_POST['submit'])) {
     $email = $_POST['email'];
     $password = $_POST['password'];

     $pdo = new PDO('mysql:host=localhost;dbname=ecommerce', 'root', '');
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $query = "SELECT * FROM  user WHERE email = '$email'";
     $statement = $pdo->prepare($query);
     $statement->execute();

     if ($statement->rowCount() > 0)
     {
        $data = $statement->fetchAll();
        if(password_verify($password, $data[0]["password"]))
        {
            echo "<div class='alert alert success' role='alert'>You are connected</div>";
            $_SESSION['email'] = $email;
        }
     }
     else
     {
         $password = password_hash($password, PASSWORD_DEFAULT);
         $query = "INSERT INTO user (email, password) VALUES ('$email', '$password')";
         $statement = $pdo->prepare($query);
         $statement->execute();
         echo 'Login success';
     }
 }