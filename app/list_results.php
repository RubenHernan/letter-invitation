<?php
require_once 'database/db.php';

$stmt = $conn->prepare("SELECT id, accepted, guests, namesGuests, dietaryReq, contactName, contactPhone, contactEmail, createdAt FROM results ORDER BY createdAt ASC");
$stmt->execute();
$stmt->store_result();

$stmt->bind_result($id, $accepted, $guests, $namesGuests, $dietaryReq, $contactName, $contactPhone, $contactEmail, $createdAt);

$results = [];
$totalAcceptedResults = 0;

while ($stmt->fetch()) {
    $result = json_decode(json_encode([
        'id' => $id,
        'accepted' => $accepted,
        'guests' => $guests,
        'namesGuests' => $namesGuests,
        'dietaryReq' => $dietaryReq,
        'contactName' => $contactName,
        'contactPhone' => $contactPhone,
        'contactEmail' => $contactEmail,
        'createdAt' => $createdAt,
    ]));

    $results[] = $result;
    if ($accepted) {
        $totalAcceptedResults++;
    }

}

$stmt->close();
$conn->close();
?>
