<?php 
include("conexion.php");
?>

<?php

//para retornar el select
$obj_conexion = new Conexion();
$sentenciaSQL = "SELECT portafolio.Nombre, portafolio.Imagen, portafolio.Descripcion, usuario.username FROM portafolio INNER JOIN usuario ON portafolio.usuario_id = usuario.ID";
$proyectos = $obj_conexion->consultar($sentenciaSQL);

$obj_conexion = new Conexion();
$sentenciaSQL = "SELECT COUNT(*) AS total_portafolios FROM portafolio";
$cant_portafolios = $obj_conexion->consultar($sentenciaSQL);

$obj_conexion = new Conexion();
$sentenciaSQL = "SELECT COUNT(*) AS total_usuarios FROM usuario";
$cant_usuarios = $obj_conexion->consultar($sentenciaSQL);


//print_r($proyectos);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido a Tu Portafolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
        body {
            background: rgb(255, 231, 18);
            background: linear-gradient(169deg, rgba(255, 231, 18, 0.3) 0%, rgba(130, 210, 80, 0.3) 20%, rgba(140, 197, 231, 0.3) 40%, rgba(206, 108, 134, 0.3) 60%, rgba(179, 52, 13, 0.3) 80%);
        }

        .cover-img {
            object-fit: cover;
            height: 300px;
            /* Altura deseada de la imagen */
        }

        .img-container, .video-container {
            position: relative;
            display: inline-block;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            transition: opacity 0.3s ease;
        }

        .img-container:hover .overlay {
            opacity: 1;
        }

.video {;
    display: block;
}


.video-container:hover .overlay {
    display: block;
}
    </style>
</head>

<body>

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
                            <a class="nav-link" href="#">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Fotografias</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Quienes somos</a>
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
                <a class="btn btn-outline-primary" href="login.php">Iniciar Sesion</a>
                <a class="btn btn-outline-success" href="registro.php">Registrarse</a>
            </div>
        </div>
    </nav>


    <!-- Carousel -->
    <div id="demo" class="carousel slide" data-bs-ride="carousel">

        <!-- Indicators/dots -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
        </div>

        <!-- The slideshow/carousel -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="static/img/ciclismo.jpg" alt="Los Angeles" class="d-block" style="width:100%" height="500">
                <div class="carousel-caption">
                    <h5>Título de la imagen 1</h5>
                    <p>Descripción de la imagen 1</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="static/img/aguila.jpg" alt="Chicago" class="d-block" style="width:100%" height="500">
                <div class="carousel-caption">
                    <h5>Título de la imagen 2</h5>
                    <p>Descripción de la imagen 2</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="static/img/tren.jpg" alt="New York" class="d-block" style="width:100%" height="500">
                <div class="carousel-caption">
                    <h5>Título de la imagen 3</h5>
                    <p>Descripción de la imagen 3</p>
                </div>
            </div>
        </div>

        <!-- Left and right controls/icons -->
        <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>

    <div class="container">
        <br>
        <h2>Fotografias que puedes Usar</h2>
        <br>
        <div class="mb-3">
        <button class="btn btn-outline-primary">Fotos <?php echo $cant_portafolios[0]['total_portafolios'];?> </button>
        <button class="btn btn-outline-primary">Videos</button>
        <button class="btn btn-outline-primary">Usuarios <?php echo $cant_usuarios[0]['total_usuarios'];?></button>
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php foreach ($proyectos as $proyecto) { ?>
            <div class="text-center">
                <div class="img-container video-container">

                    <?php 
                    $extension = pathinfo($proyecto['Imagen'], PATHINFO_EXTENSION);
                    //VERIFICAR SI ES UNA IMAGEN
                    $es_imagen = in_array($extension, ['jpg', 'jpeg', 'png', 'gif']);
                    //VERIFICAR SI ES UN VIDEO
                    $es_video = in_array($extension, ['mp4', 'avi', 'mov', 'wmv', 'mkv']);

                    //Mostrar imagen o video
                    if($es_imagen){                 
                        echo '<img src="imagenes/'.$proyecto['Imagen'].'" width="300" height="300" class="cover-img rounded"  alt="...">';
                    }elseif($es_video){
                        echo '<video src="imagenes/'.$proyecto['Imagen'].'" height="300" width="300" class="video" muted loop  alt="..."></video>';


                    }else{
                        echo 'Tipo de archivo no soportado';
                    }
                    ?>
                    
    
                    <div class="overlay">
                        <h2><?php echo $proyecto['Nombre']; ?></h2>
                        <p><?php echo $proyecto['Descripcion']; ?></p>
                        <span class="heart-icon">&#10084;</span>
                        <p>Creado por  <?php echo $proyecto['username'];?></p>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <?php include("pie.php"); ?>