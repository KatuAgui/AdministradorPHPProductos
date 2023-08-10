<?php
$host = "localhost";
$database = "sistema";
$user = "root";
$password = "";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$query = "SELECT * FROM productos";
$result = $conn->query($query);

$listaProductos = array();

while ($row = $result->fetch_assoc()) {
    $listaProductos[] = $row;
}

$conn->close();
?>
