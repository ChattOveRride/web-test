<?php 

session_start();

if (!isset($_SESSION['username'])){
	header("Location: index.php");
	exit();
}

$errors = [
    'login' => $_SESSION['login_error'] ?? '',
    'register' => $_SESSION['register_error'] ?? '',

];
$activeForm = $_SESSION['active_form'] ?? 'login';

session_unset();

function showError($error){
    return !empty($error)? "<p class='error-message'>$error</p>": '';
}

function isActiveForm($formName, $activeForm) {
 return $formName === $activeForm ? 'active' : '';
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
                <!-- <h1>Bienvenido, Admin! </h1> -->
                <p>Eres un <b>ADMIN</b></p>
                <div class="botones">
                <button onclick="window.location.href='logout.php'" id="botonchido">Cerrar Sesion</button>
                </div>
		    </div>
            <div class="caja_inicio_sesion">
                    <h1>Registrar</h1>
                <form method="post" action="login_register.php">
                    <?= showError($errors['register']); ?>
                    <h3>Nombre</h3>
                        <input type="text" id="Nombre" name="Nombre" placeholder="Nombre" required>
                    <h3>Usuario</h3>
                        <input type="text" id="Usuario" name="Usuario" placeholder="Usuario" required>
                    <h3>Contraseña</h3>
                        <input type="password" autocomplete="" id="Pass" name="Password" placeholder="Contraseña" required>
                    <h3>Rol</h3>
                    <select name="rol" required id="opciones">
                        <option value="">Selecciona un Rol</option>
                        <option value="user">Usuario</option>
                        <option value="admin">Admin</option>
                    </select>
                    <div class="botones">
                        <button id="botonchido" type="submit" name="registrar">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
