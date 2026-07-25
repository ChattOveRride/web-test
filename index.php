<?php 
session_start();

$errors = [
    'login' => $_SESSION['login_error'] ?? '',
    'registrar' => $_SESSION['register_error'] ?? '',

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
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="espacio-register">
        <div class="caja_inicio_sesion">
           <form method="post" action="login_register.php" class="form">
            <?= showError($errors['login']); ?>
             <h1>Login</h1>
            <h3>Nombre</h3>
		        <input type="text" id="Nombre" name="Nombre" placeholder="Nombre" required>
             <h3>Usuario</h3>
		        <input type="text" id="Usuario" name="Usuario" placeholder="Usuario" required>
            <h3>Contraseña</h3>
                <input type="password" autocomplete="" id="Pass" name="Password" placeholder="Contraseña" required>
                <div class="botones">
                    <button id="botongoogle" type="submit" name="google"><a href="google-callback.php" class="linkgoogle"><img src="google.svg" alt="google" class="logoG">Iniciar sesíon por google</a></button>
                    <button id="botonchido" type="submit" name="login">Iniciar</button>
                </div>
            </form>
        </div>
        </div>
    </body>
</html>