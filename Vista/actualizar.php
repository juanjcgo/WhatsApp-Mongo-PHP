<?php
session_start();
require './conexion/config.php';
if(isset($_GET['id'])){
    $profile = $registry->findOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);         
}
if(isset($_POST['submit'])){
    $registry->updateOne([
        '_id' => new MongoDB\BSON\ObjectID($_GET['id'])],
        ['$set'=>['nombre'=> $_POST['nombre'],'foto'=>  $_POST['foto'],'info'=>  $_POST['info'],]]);
    $_SESSION['success'] = "Messaje exitoso!";
    header('Location: index.php');
}
?> 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actulizar</title>
</head>
<body>
    <form method="post">
        <input type="text" name="nombre" value="<?php echo "$profile->nombre" ?>"><br>
        <input type="text" name="foto" value="<?php echo "$profile->foto" ?>"><br>
        <input type="text" name="info" value="<?php echo "$profile->info" ?>">
        <button type="submit" name="submit">Actualizar</button>
    </form>
</body>
</html>