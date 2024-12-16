<?php
$host='localhost';
$user='root';
$password='Sara123@';
$database='chef_site_db';

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn){
    die("Connexion échouée: " . mysqli_connect_error());
}
echo "Connexion réussie à la base de données.";