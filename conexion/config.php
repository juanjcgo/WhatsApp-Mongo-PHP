<?php
require_once __DIR__ . "../../vendor/autoload.php";

    
    /* $colección = $conexión->database->collectionName; */
    $user = (new MongoDB\Client)->whatsApp->user;
    $login = (new MongoDB\Client)->whatsApp->login;
    $mensaje = (new MongoDB\Client)->whatsApp->mensaje;

    /* $user = (new MongoDB\Client)->whatsApp->user->mensaje; */
    /* $mensaje = (new MongoDB\Client)->whatsApp->backup;

    $login = (new MongoDB\Client)->whatsApp->login;
    $registry = (new MongoDB\Client)->whatsApp->registry; */


    

?>






<!-- class conexion{

protected $con;

public function __construct(){
    try{
        $con = (new MongoDB\Client);
    }catch(Exception $e){
        echo "Error de conexion: ".$e->getMessage();
    }
}

public function __get( $attr ){
    return $this->$attr; 
}

public function __set( $attr, $value ){
    $this->$attr = $value; 
}

} -->