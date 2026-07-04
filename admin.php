<?php 

session_start();

if (!isset($_SESSION['username'])){
    if ($_SESSION['role'] === 'user') {
                header("Location: logout.php");
            }
	header("Location: index.php");
	exit();
}

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css">
        <title>Admin</title>
    </head>
    <body>
        
        <div class="espacio-register">
            <div class="box">
                <h1>Bienvenido,<span><?= $_SESSION['name']; ?></span>! :D</h1>
                <p>Eres un <b><span id="nomrol"><?= $_SESSION['role']; ?></span></b></p>
                <div class="botones">
                <button onclick="window.location.href='logout.php'" id="botonchido">Cerrar Sesion</button>
                </div>
		    </div>
            <div class="caja_inicio_sesion">
                    <h3><a style="text-decoration: none; color:black; font-size:larger; " href="register_user.php">Registrar un usuario<br></a></h3>
            </div>
        </div>
        <script>
             var rol = document.getElementById("nomrol");
             if (rol.innerText === "user"){
                window.location.href='logout.php'
             }
        </script>
    </body>
</html>
