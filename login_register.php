<?php

session_start();
require_once 'config.php';

if(isset($_POST['registrar'])) {
    $name = $_POST['Nombre'];
    $username = $_POST['Usuario'];
   
    //$password = password_hash($_POST['Password'], PASSWORD_DEFAULT);
    $options = [
        'cost' => 13
        ];
    $password = password_hash($_POST['Password'], PASSWORD_BCRYPT, $options);
    $role = $_POST['rol'];

    $checkUser = $conn->query("SELECT username FROM users WHERE username = '$username'");
    if ($checkUser->num_rows > 0) {
        $_SESSION['register_error'] = 'Usuario ya esta registrado';
        $_SESSION['active_form'] = 'registrar';
    } else{
        $conn->query("INSERT INTO users (name, username, password, role) VALUES ('$name', '$username', '$password', '$role')");
    }

    header("Location: admin.php");
    exit();
}

if (isset($_POST["login"])) {
    $username = $_POST['Usuario'];
    $password = $_POST['Password'];

    $result = $conn->query("SELECT * FROM users WHERE username = '$username'");
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['name'] = $user['name'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            if ($user['role'] === 'admin') {
                header("Location: admin.php");
            }
            else {
                header("Location: user.php");
            }

            exit();
        }
    }
    $_SESSION['login_error'] = 'Informacion incorrecta';
    $_SESSION['active_form'] = 'login' ;
    header("Location: index.php");
    exit();
}
?>
