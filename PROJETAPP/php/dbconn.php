<?php
$conn = new PDO("mysql:host=localhost;dbname=app_pro;charset=utf8mb4", "root", "");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
if(!$conn){
    die("Erreur de connexion à la base de données.");
}
?>