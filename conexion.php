<?php

class Conexion{

    // atributos de la clase conexion
    private $server = "localhost";
    private $user = "root";
    private $password = "";
    private $database = "album";
    private $con;

    public function __construct(){
        try {
            // creamos la conexion con ola clase PDO pasamos los aprametros de la base de datos, el usuario y la contraseña 
            $this->con = new PDO("mysql:host=$this->server;dbname=$this->database",$this->user,$this->password);
            // establecemos el atributo de error de PDO
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            // capturamos el error
        }catch (PDOException $e){
            echo "Error en la conexion".$e;
            
        }
    }

    // este metodo recibe una sentencia Sql y la ejecuta y retornamos lastInsertId que es el id del registro insertado
    //Para insert/update y delete
    public function ejecutar($sql){

        $this->con->exec($sql);
        return $this->con->lastInsertId();
        
    }

    //Para el select
    public function consultar($sql){
        $sentencia=$this->con->prepare($sql);
        $sentencia->execute();
        return $sentencia->fetchAll();
    }
}
