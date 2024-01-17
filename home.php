<?php

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit();
}

include("app/list_results.php");

$user = $_SESSION['user_name'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./src/styles.css">
    <link rel="stylesheet" href="./src/styles/Home/styles.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="home__container">
        <div class="home__box">
            <div class="home__title">
                <h1>PANEL RESULTADOS</h1>
                <div class="home__logout">
                    <?php echo $user; ?>
                    <form method="post">
                        <button type="submit" name="logout">
                            <i style="color: rgb(187, 65, 100);" class="bx bx-log-out-circle"></i>
                        </button>
                    </form>
                     
                </div>
                
            </div>
            
            <div class="list__header">
                <div class="list__boxes">
                    <div class="list__box">
                        <p><?php echo ($totalAcceptedResults); ?></p>
                        <div class="list__item">
                            <i class="bx bx-check"></i>
                            ACEPTADOS
                        </div>
                    </div>
                    <div class="list__box">
                        <p><?php echo (count($results) - $totalAcceptedResults); ?></p>
                        <div class="list__item">
                            <i class="bx bx-x"></i>
                            RECHAZADOS
                        </div>
                    </div>
                </div>
                <div class='container__btn'>
                    <a href='./pdf.php' class="list__export btn__pdf" target="_blank">
                        <i class='bx bxs-file-pdf'></i>
                    </a>
                    <a href='./excel.php' class="list__export btn__excel">
                        <i class="bx bxs-spreadsheet"></i>
                    </a>
                </div>
            </div>

            <div style="overflow: auto;">
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
                                <tr class="table__tr">
                                    <td class="table__td"><?php echo $result->id; ?></td>
                                    <td class="table__td"><?php echo date('d/m/Y h:i:s A', strtotime($result->createdAt)); ?></td>
                                    <td class="table__td">
                                        <?php if ($result->accepted): ?>
                                            <p class="box__accepted">ACEPTADO</p>
                                        <?php else: ?>
                                            <p class="box__declined">RECHAZADO</p>
                                        <?php endif; ?>
                                    </td>
                                    <td class="table__td"><?php echo $result->guests; ?></td>
                                    <td class="table__td2" style="min-width: 200px;"><?php echo $result->namesGuests; ?></td>
                                    <td class="table__td2" style="min-width: 150px;"><?php echo $result->dietaryReq; ?></td>
                                    <td class="table__td2" style="min-width: 200px;"><?php echo $result->contactName; ?></td>
                                    <td class="table__td2"><?php echo $result->contactPhone; ?></td>
                                    <td class="table__td2"><?php echo $result->contactEmail; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    <?php else: ?>
                        <tbody>
                            <tr>
                                <td class="table__td" colspan="9">
                                    No se encontraron resultados...
                                </td>
                            </tr>
                        </tbody>
                    <?php endif; ?>
                </table>
            </div>

            <div class="list__footer">
                <p>Mostrando <?php echo count($results); ?> respuestas...</p>
            </div>

        </div>
    </div>
</body>
</html>
