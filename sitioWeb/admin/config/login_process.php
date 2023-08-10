<?php
// Configuración de la conexión a la base de datos
$host = "localhost";
$database = "sistema";
$user = "root";
$password = "";

// Conexión a la base de datos
$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Recuperar datos del formulario
$username = $_POST["username"];
$password = $_POST["password"];

// Consulta para verificar el usuario y la contraseña
$query = "SELECT id FROM users WHERE username = '$username' AND password = '$password'";
$result = $conn->query($query);

if ($result->num_rows === 1) {
    // Inicio de sesión exitoso
    session_start();
    $_SESSION["username"] = $username;
    header("Location: ../inicio.php"); // Redirigir a la página del usuario autenticado
} else {
    // Inicio de sesión fallido
    echo "Inicio de sesión fallido. <a href='../index.php'>Volver a intentar</a>";
}

$conn->close();
?>
