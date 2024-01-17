<?php
require_once 'db.php';

$sql = "CREATE TABLE Results (
    id INT AUTO_INCREMENT PRIMARY KEY,
    accepted BOOLEAN NOT NULL,
    guests INT NOT NULL,
    namesGuests TEXT NOT NULL,
    dietaryReq TEXT,
    contactName VARCHAR(255),
    contactPhone VARCHAR(255),
    contactEmail VARCHAR(255),
    createdAt DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updatedAt DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Tabla results creada exitosamente";
} else {
    echo "Error al crear la tabla results: " . $conn->error;
}

$conn->close();
?>
