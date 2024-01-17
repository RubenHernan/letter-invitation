<?php
session_start();

if (isset($_POST['register'])) {

    if (!isset($_POST['responde'])) {
        header("Location: {$_SERVER['PHP_SELF']}");
        exit();
    }


    $responseType = $_POST['responde'] === "accept" ? true : false;
    $numberOfGuests = $_POST['number_of_guests'];
    $guestNames = $_POST['guest_names'];
    $dietaryRequirements = $_POST['dietary_requirements'];
    $contactName = $_POST['contact_name'];
    $contactPhone = $_POST['contact_phone'];
    $contactEmail = $_POST['contact_email'];
   
    require_once 'database/db.php';

    $stmt = $conn->prepare("INSERT INTO results (accepted, guests, namesGuests, dietaryReq, contactName, contactPhone, contactEmail) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("issssss", $responseType, $numberOfGuests, $guestNames, $dietaryRequirements, $contactName, $contactPhone, $contactEmail);

    if ($stmt->execute()) {
        header("Location: thanks.php");
        exit();
    } else {
        echo "Error al registrar el resultado.";
    }

    $stmt->close();
    $conn->close();
}
?>
