<?php
include("conexion.php");
?>

<?php

session_start();

if($_POST){
    $usuario = $_POST["usuario"];
    $clave = $_POST["clave"];

    $obj_conexion = new Conexion();
    $sentenciaSQL = "INSERT INTO `usuario`(`ID`, `username`, `clave`) VALUES ('NULL','$usuario','$clave')";
    $obj_conexion->ejecutar($sentenciaSQL);


    // Iniciar sesión
    $_SESSION["usuario"] = $usuario;

    
    //Redireccionar
    header("location: home.php");
    exit();

}


?>


<!doctype html>
<html lang="en">

<head>
    <title>Registro</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
        <style>
            
        </style>
</head>

<body>

    <div class="row">
        <div class="col-md-4">
        </div>
        <div class="col-md-4">
        <br>
            <div class="card">
                <div class="card-header">Registrarse</div>
                <div class="card-body">
                    <div class="container">
                        <form action="registro.php" method="post">
                            <label class="form-label"  for="username">Usuario</label>
                            <input class="form-control" required autocomplete="off" type="text" name="usuario" id="username" />
                            <br>
                            <label class="form-label" for="password">Contraseña</label>
                            <input class="form-control" required type="password" name="clave" id="password">
                            <br>
                            <button class="btn btn-success" type="submit">Registrarse</button>
                        </form>
                    </div>
                </div>

            </div>

        </div>
        <div class="col-md-4">
        </div>
    </div>

</body>

</html>