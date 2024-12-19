<?php
$host='localhost';
$user='root';
$password='Sara123@';
$database='chef_site_db';

$conn = mysqli_connect($host, $user, $password, $database);

if ($conn->connect_error){
    die("Connexion failed: " . $conn->connect_error);
}
// echo "Connected successfully.";
?>