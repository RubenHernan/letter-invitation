<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename= results.xls");
include("app/list_results.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        .table__box {
            border-collapse: collapse;
            width: 100%;
        }
        .table__header th {
            background-color: rgb(187, 65, 100);
            color: white;
            padding: 15px;
            text-align: left;
            border: 1px solid #ddd; 
        }
        .table__box td,
        .table__box th {
            border: 1px solid #ddd; 
            padding: 8px;
            text-align: left;
        }

        .table__box tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>
<table class="table__box">
                    <thead class="table__header">
                        <tr>
                            <th>ID</th>
                            <th>FECHA</th>
                            <th>ESTADO</th>
                            <th>NRO INVITADOS</th>
                            <th>NOMBRES</th>
                            <th>PETICIONES</th>
                            <th>NOMBRE CONTACTO</th>
                            <th>TELEF CONTACTO</th>
                            <th>EMAIL CONTACTO</th>
                        </tr>
                    </thead>

                    <?php if (count($results) !== 0): ?>
                        <tbody>
                            <?php foreach ($results as $result): ?>
                                <tr>
                                    <td><?php echo $result->id; ?></td>
                                    <td><?php echo date('d/m/Y h:i:s A', strtotime($result->createdAt)); ?></td>
                                    <td>
                                        <?php if ($result->accepted): ?>
                                            <p>ACEPTADO</p>
                                        <?php else: ?>
                                            <p>RECHAZADO</p>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo $result->guests; ?></td>
                                    <td><?php echo $result->namesGuests; ?></td>
                                    <td><?php echo $result->dietaryReq; ?></td>
                                    <td><?php echo $result->contactName; ?></td>
                                    <td><?php echo $result->contactPhone; ?></td>
                                    <td><?php echo $result->contactEmail; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    <?php else: ?>
                        <tbody>
                            <tr>
                                <td colspan="9">
                                    No se encontraron resultados...
                                </td>
                            </tr>
                        </tbody>
                    <?php endif; ?>
                </table>
</body>
</html>