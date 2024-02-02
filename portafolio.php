<?php
include("cabecera.php");
?>
<?php
include("conexion.php");
    
?>

<!-- Instanciamos la clase conexion -->
<?php

$username = $_SESSION['usuario'];
    $obj_conexion = new Conexion();
    $user_id = $obj_conexion->consultar("SELECT ID FROM usuario WHERE username = '$username'");
    $usuario_id = $user_id[0]['ID'];

if($_POST){
    $nombreP = $_POST['nombrePortafolio'];
    $imagenP = $_FILES['imagenP']['name'];
    $descripcionP = $_POST['descripcion'];
    $user_id = $_POST['user_id'];

    //agregar fecha a la imagen
    $fecha = new DateTime();
    $imagenP = $fecha->getTimestamp()."_".$imagenP;

    //Trabajo con la imagen
    $imagenTemporal = $_FILES['imagenP']['tmp_name'];
    move_uploaded_file($imagenTemporal, 'imagenes/'.$imagenP);


    // en este codigo se inserta un nuevo registro, instanciamos un objeto de la clase Conexion,
// creamos una sentencia Sql y llamampos el metodo ejecutar y le pasamos la sentencia sql
    
    $obj_conexion = new Conexion();

    $sentenciaSQL = "INSERT INTO `portafolio`(`ID`, `Nombre`, `Imagen`, `Descripcion`, `usuario_id`) VALUES ('NULL','$nombreP','$imagenP','$descripcionP','$user_id')";
    $obj_conexion->ejecutar($sentenciaSQL);

    //Redireccionar
    header("location: portafolio.php");
    
}

//Para el delete
if($_GET){
    //Pasamos el id de borrar
    $id = $_GET['borrar'];
    // print_r($id);
    $obj_conexion = new Conexion();

    //Borramos la imagen tambien
    $imagen = $obj_conexion->consultar("SELECT Imagen FROM `portafolio` WHERE ID = $id");
    //print_r($imagen);
    unlink("imagenes/".$imagen[0]['Imagen']);

    $sentenciaSQL = "DELETE FROM `portafolio` WHERE ID = $id";
    $obj_conexion->ejecutar($sentenciaSQL);

    header("location: portafolio.php");

}


//para retornar el select
$obj_conexion = new Conexion();
$sentenciaSQL = "SELECT * FROM `portafolio` WHERE usuario_id = '$usuario_id'";
$proyectos = $obj_conexion->consultar($sentenciaSQL);
//print_r($proyectos);


?>

<br>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">Nuevo Portafolio</div>
                <div class="card-body">
                    <div class="container">
                        <form action="portafolio.php" method="post" enctype = "multipart/form-data">
                            <input type="hidden" name="user_id" value="<?php echo $user_id[0]['ID'];?>">
                            <label class="form-label" for="nombrePortafolio">Nombre del portafolio</label>
                            <input required class="form-control" id="nombrePortafolio" name="nombrePortafolio" type="text" autocomplete="off">
                            <label class="form-label" for="imagen">Imagen</label>
                            <input required class="form-control" id="imagen" name="imagenP" type="file">
                            <label class="form-label" for="descripcion">Descripción</label>
                            <textarea required name="descripcion" class="form-control" id="descripcion" cols="30" rows="5"></textarea>
                            <br>
                            <button class="btn btn-success" type="submit">Crear portafolio</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-7">
            <div class="table-responsive mt-4">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">NOMBRE</th>
                            <th scope="col">IMAGEN</th>
                            <th scope="col">DESCRIPCION</th>
                            <th scope="col">ACCIONES</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($proyectos as $proyecto) { ?>
                        <tr class="">
                            <td scope="row"><?php echo $proyecto['ID']; ?></td>
                            <td><?php echo $proyecto['Nombre']; ?></td>
                            <td><img src="imagenes/<?php echo $proyecto['Imagen']; ?>" width="100"></td>
                            <td><?php echo $proyecto['Descripcion']; ?></td>
                            <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="#" class="btn btn-warning me-2">Editar</a>
                                <a href="?borrar=<?php echo $proyecto['ID']; 
                                ?>" class="btn btn-danger">Eliminar</a>
                            </div>
                            </td>
                            
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>







<?php
include("pie.php");
?>