<?php
require_once 'db.php'; 

$sql = "CREATE TABLE Users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    login VARCHAR(255) UNIQUE,
    password VARCHAR(255),
    createdAt DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updatedAt DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Tabla 'Users' creada exitosamente";
} else {
    echo "Error al crear la tabla 'Users': " . $conn->error;
}

$conn->close();
?>
