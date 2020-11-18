<?php 
   require '../conexion/config.php';
   require '../Session/Session.php';
    $Session = new UserSession();

    $verificar = $Session->getCurrentUser();

    /* $prod=$cd->listar($verificar); */

    if(!isset($_SESSION['user']) ){ 
            header('Location:../index.php');
    }
   
   if(isset($_POST['submit'])){
    $res = $mensaje->insertOne([
        'origen' => $verificar,
        'destino' => $_POST['destino'],
        'mensaje' => $_POST['mensaje'],
        'hora' => $_POST['hora']
    ]);
      header("Location: listar.php?id=$data->_id");
   }
   elseif(@$_GET['cerrar']){
        $Session->cerrarSesion();
        header('Location:../index.php');
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <LINK REL=StyleSheet HREF="./css/listar.css" TYPE="text/css" MEDIA=screen>
    <script src="./Vista/js/index.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Chats</title>
</head>
<body>
    <div class="contend">
        <div class="user">
            <div class="header-1">
            <img src="./img/logo-e.png" class="logo">
            <h3><?php echo @$_GET['user'] ?></h3>
            <a href="insertar.php?user=<?php echo $verificar ?>">Agregar</a>
            <a href="../Vista/listar.php?cerrar=true">Cerrar</a>

               <!--  <div class="dropdown">
                    <a class="btn btn-secondary dropdown-toggle" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown link
                    </a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div> -->
            </div>
            <div class="search">
                <div class="search-box">
                    <img style="width: 25px; margin-left: 15px;" src="https://img.icons8.com/cotton/64/000000/search--v2.png"/>
                    <input type="text" name="buscar" placeholder="Buscar o empezar un chat nuevo">
                </div>
            </div>
            <?php 
             $listar = $user->find(array('usuario' => $verificar));
             /* array('$and' => array(array("username" => "Pedro"), array("year" => "1940")) */
            /*  echo "<h2>".$verificar->nombre."</h2>";
             var_dump($listar);
             die(); */
             /* $listar = $user->find(); */
            foreach($listar as $row){?>
            
        <a href="listar.php?id=<?php echo $row->celular ?>">
      

        <div class="item">
                <div class="message">
                    <img src="./img/what.png" class="img-item">
                    <p><?php  echo $row->nombre  ?><br></p>
                </div>
            </div>
        </a>
            
            <?php } ?>
        </div>
        <div class="chat">
            <div class="header-2">
                <img src="./img/header.png" style="width: 100%;" >
            </div>
            <?php 
               if (isset($_GET['id'])) {
                
               /* $data = $user->findOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]); */
               /* $data = $mensaje->find(array("origen" => $verificar),  array("destino" => $_GET['id'])); */
               $data = $mensaje->find();
             }
            if(isset($data)){
            foreach($data as $row){
                if($row->origen == $verificar || $row->destino == $verificar){
                echo  "<div>
                            <div class='men-1'>";
                            if($row->origen === $_GET['id']){
                                echo $row->origen;
                                echo "<h5>".$row->mensaje."</h5>";
                            }
                            echo "</div>
                       
                            <div class='men-2'>";
                            if($verificar === $row->origen){
                                echo $row->origen;
                                echo "<h5>".$row->mensaje."</h5>";
                            }
                            echo "</div>
                        </div>"; }}}?>

            <div class="fixed">
                <form method="post">
                    <input class="out" type="text" name="mensaje" placeholder="Escriba aqui">
                    <input class="out" type="hidden" name="destino" value="<?php echo $_GET['id'] ?>">
                    <input class="out" type="hidden" name="hora" value="<?php  echo date("h");?>">      
                    <button type="submit" name="submit" value="submit">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>