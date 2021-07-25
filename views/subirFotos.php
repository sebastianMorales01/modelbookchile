<?php
ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL); 

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
    <title>Acceso usuario</title>
</head>
<body >
    <?php
    if (isset($_SESSION['usuario'])) { ?>
        <!-- ========== MENU START ========== -->
        <nav class="black darken-4 padding-nav">
            <div class="nav-wrapper" style="padding-right: 20px; padding-left: 20px;">
                <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <a href="#" class="brand-logo "> <img class="logo" src="img/ojo.png"> Model Book Chile </a>
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                        <li class="active"><a href="./index.php">INICIO</a></li>
                        <li><a href="views/login.php">INGRESA AQUI PARA PUBLICAR</a></li>
                        <li><a href="views/buscador.php">BUSCADOR</a></li>
                        <li><a href="#">RECOMENDACIONES</a></li>
                        <li><a href="#">F.A.Q.</a></li>                
                </ul>
            </div>
        </nav>
        <!-- Nav movil --> 
        <ul id="slide-out" class="sidenav">
            <li><div class="user-view">
                    <div class="background" >
                        <img width="300" src="https://images3.alphacoders.com/103/1032371.jpg" >
                    </div>
                    <a href="#user"><img class="circle" src="img/ojo.png"></a>
                    <a href="#name"><span class="white-text name">Model Book Chile</span></a>
                    <a href="#email"><span class="white-text email">modelbook.chile@gmail.com</span></a>
            </li></div>
            <li><a href="views/login.php">INGRESA AQUI PARA PUBLICAR</a></li>
            <li><a href="views/buscador.php">BUSCADOR</a></li>
            <li><a href="#">RECOMENDACIONES</a></li>
            <li><a href="#">F.A.Q.</a></li>
        </ul>
        <!-- FIN Nav movil --> 
		
    <!-- ========== MENU END ========== -->
        <div class="container center" style="border: 1px solid red; padding-left:100px; padding-right: 100px;">
            <h4>Ingresa tus fotos de Modelo</h4>
            <h6><?= $_SESSION['modelo']['nombre']  ?></h6>
                    <form action="../controllers/ControlNuevoModelo.php" method="POST" >
                        





                    
                    </form>
                    <p class="red-text">
                        <?php
                            if(isset($_SESSION['error'])){
                                echo $_SESSION['error'];
                                unset ($_SESSION['error']);
                            }
                        ?>
                    </p>
                    <p class="green-text">
                        <?php
                            if(isset($_SESSION['resp'])){
                                echo $_SESSION['resp'];
                                unset($_SESSION['resp']);
                            }
                        ?>
                    </p>
                </div>
            </div>
            
        </div>












    <?php } else { ?>
        <a href="../index.php">
        <img class="matrix" src="../img/matrix.jpg" >
        </a>

    <?php  } ?>
    <script src="../js/crearModelo.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.sidenav');
            var instances = M.Sidenav.init(elems);
        });
    </script>
</body>
</html>