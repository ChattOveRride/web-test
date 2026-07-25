<?php 

session_start();

if (!isset($_SESSION['user'])){
    header("Location:index.php");
    exit;
}
$user = $_SESSION["user"];

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css">
        <title>Usuario</title>
    </head>
    <body>
        <div class="espacio-register">
            <div class="box">
                <h1>Welcome <?= $user['name']; ?></h1>
                <p>Email: <?= $user['username']; ?></p>

                <h1>Bienvenido,<span><?= $_SESSION['name']; ?></span>!</h1>
                <p>Eres un <b><span id="nomrol"><?= $_SESSION['role']; ?></span></b></p>
                <div class="botones">
                <button onclick="window.location.href='logout.php'" id="botonchido">Cerrar Sesion</button>
                </div>
            </div>
                </div>
            <script src="script.js"></script>
                    <script>
             var rol = document.getElementById("nomrol");
             if (rol.innerText === "admin"){
                window.location.href='logout.php'
             }
        </script>
    </body>
</html>