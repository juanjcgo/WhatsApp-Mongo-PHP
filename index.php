<?php 
   require './conexion/config.php';
   require './Session/Session.php';
   $Session = new UserSession();

   if(isset($_POST['celular']) && isset($_POST['contras'])){
        $celular = $_POST['celular'];
        $contras = $_POST['contras'];
    if(isset($_SESSION['user'])){ 
         $s = $Session->getCurrentUser();
         header('Location:./Vista/listar.php');
    }
    else if($data = $login->findOne(array('celular' => $celular), array('contras' => $contras))){
         $Session->setCurrentUser($celular);
         header('Location:./Vista/listar.php?user='.$data->nombre);
    }else{
         $errorLogin = "Nombre de usuario y/o password incorrecto";
         header('Location:./index.php?err='.$errorLogin);
    }
}

  /*  if (isset($_POST['submit'])) {
      $data = $login->findOne(['celular' => new MongoDB\BSON\ObjectID($_POST['celular'])]);
   }
      header("Location: listar.php?id=$data->_id"); */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <LINK REL=StyleSheet HREF="./Vista/css/index.css" TYPE="text/css" MEDIA=screen>
    <script src="./Vista/js/index.js" type="text/javascript"></script>
    <title>Login</title>
</head>
<body>
  
    <a href="./Vista/listar.php">Ver chats<a>

    <form  enctype="multipart/form-data" method="post" name="formulario">

        <h3>Iniciar Sesión</h3> 
        <?php  if(isset($_GET['err'])){ ?>
            <div class="err">
                <h5 class="err"><?php echo $_GET['err']?></h5>
            </div>
        <?php } ?>
            <table>
                <tr>
                    <td><h4>Numero de Celular</h4></td>
                    <td>
                        <input type="text" name="celular" class="field" placeholder="+57 3212696821">
                        <label id="error_celular" class="err"></label>
                    </td>
                </tr>
                <tr>
                    <td><h4>Contraseña</h4></td>
                    <td>
                        <input type="password" name="contras" class="field" placeholder="Contraseña">
                        <label id="error_password" class="err"></label>
                    </td>
                </tr>
            </table>
                <input type="submit"  name="accion" onclick="return validar();" value="login">
                <a class="center" href="./Vista/registro.php">Crear Cuenta</a>
    </form>

</body>
</html>