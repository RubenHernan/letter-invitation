<?php
session_start();
$error_message = "";
if (isset($_POST['submit'])) {
    $input_username = $_POST['login'];
    $input_password = $_POST['password'];

    require_once 'database/db.php';

    $stmt = $conn->prepare("SELECT id, name, login, password FROM Users WHERE login = ?");
    $stmt->bind_param("s", $input_username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($user_id, $user_name, $user_login, $hashed_password);
        $stmt->fetch();

        if (password_verify($input_password, $hashed_password)) {
            $_SESSION['user_id'] = $user_id;
            $_SESSION['user_name'] = $user_name;
            $_SESSION['user_login'] = $user_login;
            header("Location: home.php");
            exit();
        } else {
            $error_message = "Credenciales incorrectas, inténtelo de nuevo...";
        }
    } else {
        $error_message = "Credenciales incorrectas, inténtelo de nuevo...";
    }

    $stmt->close();
    $conn->close();
}
?>