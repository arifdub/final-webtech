<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "online-app";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    
    }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }

?>