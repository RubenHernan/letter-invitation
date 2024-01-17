<?php
require_once 'db.php'; 

// Usuario por defecto
$userName = 'Admin';
$userLogin = 'Admin';
$userPassword = password_hash('pass', PASSWORD_DEFAULT); 

$sql = "INSERT INTO Users (name, login, password, createdAt, updatedAt) 
        VALUES ('$userName', '$userLogin', '$userPassword', NOW(), NOW())";

if ($conn->query($sql) === TRUE) {
    echo "Usuario por defecto creado exitosamente";
} else {
    echo "Error al crear el usuario por defecto: " . $conn->error;
}

$conn->close();
?>
