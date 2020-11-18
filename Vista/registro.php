<?php
    require '../conexion/config.php';
    session_start();

    if(isset($_POST['submit'])){

        $res = $login->insertOne([
            'nombre' => $_POST['nombre'],
            'celular' => $_POST['celular'],
            'contras' => $_POST['contras'],
            'rol' => $_POST['rol']
        ]);
        header('Location: ../index.php');
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
    <title>registrar</title>
</head>
<body>
<form method="post">
        <h3>Crear mi cuenta</h3>
        <div class="form-group">
            <label for="formGroupExampleInput">Nombre de usuario</label>
            <input type="text" name="nombre" class="form-control" id="formGroupExampleInput"  placeholder="Juan Carlos ">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput">Celular</label>
            <input type="text" name="celular" class="form-control" id="formGroupExampleInput" placeholder="3212696821">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput">Contraseña</label>
            <input type="text" name="contras" class="form-control" id="formGroupExampleInput" placeholder="h12j?jkyut3">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput">Rol</label>
            <input type="text" name="rol" class="form-control" id="formGroupExampleInput" placeholder="Rol">
        </div>
        <button type="submit" class="btn btn-primary btn-lg btn-block" name="submit" value="Insertar">Crear Cuenta</button>
    </form>
</body>
</html>