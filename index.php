<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL); 

    // OBTENER MODELOS ACTIVOS DE BD
    use models\ModeloModel as ModeloModel;
    require_once("models/ModeloModel.php");
    $model = new ModeloModel();
    $modelos = $model->getAllModelosActivos();
    
    session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <title>ModelBook CHILE</title>
</head>
<body class="grey darken-1  ">
    <!-- ========== MENU START ========== -->
    <nav class="black darken-4 padding-nav">
        <div class="nav-wrapper" style="padding-right: 20px; padding-left: 20px;">
            <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <a href="./index.php" class="brand-logo ">  Model Book Chile </a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li>+</li>   
                    <li class="active"><a href="./index.php">INICIO</a></li>
                    <li><a href="views/login.php">INGRESA AQUI PARA PUBLICAR</a></li>
                    <li><a href="views/buscador.php">BUSCADOR</a></li>
                    <li><a href="views/recomendaciones.php">RECOMENDACIONES</a></li>     
                    <li><a href="views/loginAdmin.php">+</a></li>           
            </ul>
        </div>
    </nav>
    <!-- ========== FIN MENU START ========== -->

    <!-- ========== NAV MOVIL ONLINE ========== -->
    <ul id="slide-out" class="sidenav">
        <li><div class="user-view">
                <div class="background" >
                    <img width="300" src="https://images3.alphacoders.com/103/1032371.jpg" >
                </div>
                <a href="#user"><img class="circle" src="#"></a>
                <a href="#name"><span class="white-text name">Model Book Chile</span></a>
                <a href="#email"><span class="white-text email">modelbook.chile@gmail.com</span></a>
        </li></div>
        <li><a href="views/login.php">INGRESA AQUI PARA PUBLICAR</a></li>
        <li><a href="views/buscador.php">BUSCADOR</a></li>
		<li><a href="views/recomendaciones.php">RECOMENDACIONES</a></li>
        <li><a href="views/loginAdmin.php">F.A.Q.</a></li>
    </ul>
    <!-- ========== FIN NAV MOVIL ONLINE ========== -->

    <!-- ==========  USER ONLINE ========== -->
    <div class="container">
        <li class="right"><font color="00ff00">1 Online</font></li>
    </div>
		
    <!-- ========== FIN USER ONLINE ========== -->

    <!-- ========== MENSAJE MODELO CREADO ========== -->
    <?php if(isset($_SESSION['respCrearModelo'])){ ?>
            <div class="card-panel " style="width: max-content; transform: translateX(125%);">
                <span class="blue-text text-darken-2">
                    <?php echo $_SESSION['respCrearModelo'];  
                        unset ($_SESSION['respCrearModelo']); 
                        unset($_SESSION["usuario"]);
                        session_destroy(); 
                    ?>
                </span>
            </div>       
    <?php } ?>
    <!-- ========== FIN MENSAJE MODELO CREADO ========== -->  
    
    <!-- ========== CARDS MODELOS ========== -->
    <br><br>
    <div class="container" >
        <div class="row " >
        <form action="controllers/ControlPerfilModelo.php" method="post">
            <?php foreach ($modelos as $modelos){?>
                <div class="col l3 m4 s6 " >
                    <div class="card hoverable"  >
                        <div class="card-image" >
                            <img src="<?=$modelos['fotoPerfil']?>" style="height: 200px; width: 100%; object-fit: cover;"  >
                                <span style="font-size:25px;color:orange; margin-left: 10px;"><?=$modelos['nombre']?></span> <br>
                                <span style="font-size:25px;color:orange; margin-left: 10px;"> <?=$modelos['apellido']?></span>
                        </div>
                        
                        <div class="card-action grey lighten-2">
                            <button name="bt_perfil" value="<?=$modelos["idModelo"]?>"  class="black" >
                                <a class="waves-effect waves-teal btn-flat">ir al perfil</a>
                            </button>
                        </div>
                    </div>
                </div>
            <?php } ?>  
        </form>
        </div>
    </div>
    <!-- ========== FIN CARDS MODELOS ========== -->
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.sidenav');
        var instances = M.Sidenav.init(elems);
    });
</script>

</body>
</html>