<?php
require '../conexion/config.php';
session_start();

if(isset($_POST['submit'])){

    if($data = $login->findOne(array('celular' => $_POST['celular']))){

    if($data->celular == $_GET['user']){
        $err = "El numero de celular no existe";
        header('Location: insertar.php?err='.$err);
    }else{
        $insertOneResult = $user->insertOne([
            'nombre' => $_POST['nombre'],
            'celular' => $_POST['celular'],
            'usuario' => $_GET['user']
        ]);
        header('Location: listar.php'); 
    }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <LINK REL=StyleSheet HREF="./css/insertar.css" TYPE="text/css" MEDIA=screen>
    <script src="./Vista/js/insertar.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Insertar</title>
</head>
<body>
    <form method="post">
        <h3>Agregar nuevo contacto</h3>
        <?php  if(isset($_GET['err'])){ ?>
            <div class="err">
                <h5 class="err"><?php echo $_GET['err']?></h5>
            </div>
        <?php } ?>
        <div class="form-group">
            <label for="formGroupExampleInput">Nombre de usuario</label>
            <input type="text" name="nombre" class="form-control" id="formGroupExampleInput"  placeholder="Juan Carlos ">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput">Celular</label>
            <input type="text" name="celular" class="form-control" id="formGroupExampleInput" placeholder="3212696821">
        </div>

        <button type="submit" class="btn btn-primary btn-lg btn-block" name="submit" value="Insertar">Registrar</button>
        <a class="center" href="./listar.php">Atras</a>
    </form>
</body>
</html>