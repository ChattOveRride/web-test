<?php 

session_start();

if (!isset($_SESSION['username'])){
	header("Location: index.php");
	exit();
}

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
                <h1>Bienvenido,<span><?= $_SESSION['name']; ?></span>!</h1>
                <p>Eres un <b>Usuario</b></p>
                <div class="botones">
                <button onclick="window.location.href='logout.php'" id="botonchido">Cerrar Sesion</button>
                </div>
            </div>
        </div>
    </body>
</html>