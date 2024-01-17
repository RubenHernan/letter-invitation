<?php
 include("app/user_login.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wedding Invite</title>
    <link rel="stylesheet" href="./src/styles.css">
    <link rel="stylesheet" href="./src/styles/Login/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
</head>
<body>
    <div class="login__container">
      <div class="login__box">
        <h1>Admin</h1>
        <form class="login__form" method="post">
            <div>
                <input
                    required="required"
                    class="login__input"
                    name="login"
                    type="text"
                    placeholder="USUARIO"
                    autoComplete="off"
                />
                <label for="login"></label>
            </div>
            <div>
                <input
                    required="required"
                    class="login__input"
                    name="password"
                    type="password"
                    placeholder="CONTRASEÑA"
                    autoComplete="off"
                />
                <label for="clave"></label>
            </div>
            <div>
                <button class="login__button" type="submit" name="submit">Login</button>
            </div>
        </form>

        <?php
        if (!empty($error_message)) {
            echo "<script>
            Toastify({
              text: '{$error_message}',
              duration: 3000,
              gravity: 'top',
              position: 'right',
              style: {
                background: 'linear-gradient(to right, #ff6666, #ff3333)',
              },
            }).showToast();
          </script>";
        }


        ?>
        
      </div>
    </div>
</body>
</html>
