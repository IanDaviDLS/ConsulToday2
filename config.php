<?php
$host = '143.106.241.3';
$user = 'cl201020';
$password = 'cl*20032006';
$db = 'cl201020';

$conn = new mysqli($host, $user, $password, $db);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>
