<?php
include("cabecera.php");
?>

<?php
include("conexion.php");
?>

<?php

$username = $_SESSION['usuario'];
    $obj_conexion = new Conexion();
    $user_id = $obj_conexion->consultar("SELECT ID FROM usuario WHERE username = '$username'");
    $usuario_id = $user_id[0]['ID'];

    $obj_conexion = new Conexion();
    $sentenciaSQL = "SELECT * FROM `portafolio` WHERE usuario_id = '$usuario_id'";
    $proyectos = $obj_conexion->consultar($sentenciaSQL);
//print_r($proyectos);
?>


<div class="p-5 mb-4 bg-light rounded-3">
    <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">Bienvanido <?php echo $_SESSION['usuario']; ?></h1>
        <p class="col-md-8 fs-4">
            Este es tu portafolio privado
        </p>
    </div>


    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php foreach ($proyectos as $proyecto) { ?>
            <div class="col">
                <div class="card">
                    <img height="200" src="imagenes/<?php echo $proyecto['Imagen']; ?>"
                        class="card-img-top img-fluid cover-img" alt="<?php echo $proyecto['Nombre']; ?>">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php echo $proyecto['Nombre']; ?>
                        </h5>
                        <p class="card-text">
                            <?php echo $proyecto['Descripcion']; ?>
                        </p>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>



</div>


<?php
include("pie.php");
?>