<?php 

session_start();

$errors = [
    'login' => $_SESSION['login_error'] ?? '',
    'register' => $_SESSION['register_error'] ?? '',

];
$activeForm = $_SESSION['active_form'] ?? 'login';

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
        <span id="nomrol" style="color: #7D7C7C;"><?= $_SESSION['role']; ?></span>
        <div class="botones_confi">
                    <a href="admin.php">< Regresar</a>
        </div>
        <div class="espacio-register">
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
        <script>
             var rol = document.getElementById("nomrol");
             if (rol.innerText === "user"){
                window.location.href='logout.php'
             }
        </script>
    </body>
</html>
