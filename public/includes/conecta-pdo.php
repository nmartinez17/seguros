<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
// CONEXION PDO
$conn = new PDO("mysql:host=localhost;dbname=seguros", $dbuser, $dbpass,array(PDO::MYSQL_ATTR_LOCAL_INFILE => true)); // LOCAL
// set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>