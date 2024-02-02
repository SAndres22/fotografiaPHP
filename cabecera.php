<?php
session_start();
// Verificar si la sesión está iniciada
if (!isset($_SESSION["usuario"])) {
    // Si no hay sesión iniciada, redirigir al usuario al login
    header("location: login.php");
    exit(); // Detener la ejecución del script después de la redirección
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
</head>

    <title>Portafolio</title>
    <style>
    .cover-img {
        object-fit: cover;
        height: 300px; /* Altura deseada de la imagen */
    }
    body {
            background: rgb(255, 231, 18);
            background: linear-gradient(169deg, rgba(255, 231, 18, 0.3) 0%, rgba(130, 210, 80, 0.3) 20%, rgba(140, 197, 231, 0.3) 40%, rgba(206, 108, 134, 0.3) 60%, rgba(179, 52, 13, 0.3) 80%);
        }
    </style>
    
</head>
<body>
    <div class="container">
        <!-- aqui va el contenido de la cabecera, el menu-->
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <div class="d-flex">
                <div>
                    <a href="">
                        <img src="static/img/logo.png" alt="" width="50">
                    </a>
                </div>
                <div class="" id="mynavbar">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="home.php">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="portafolio.php">Portafolio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Perfil</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div>
                <form class="d-flex">
                    <input class="form-control me-2" type="text" placeholder="Search">
                    <button class="btn btn-outline-primary" type="button">Buscar</button>
                </form>
            </div>
            <div>
                <a class="btn btn-outline-primary" href="cerrar.php">Cerrar Sesion</a>
            </div>
        </div>
    </nav>
    