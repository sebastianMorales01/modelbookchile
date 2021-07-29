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
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Acceso usuario</title>
</head>
<body class="grey darken-1 ">
    <!-- ========== MENU START ========== -->
    <nav class="black darken-4 padding-nav">
        <div class="nav-wrapper" style="padding-right: 20px; padding-left: 20px;">
            <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <a href="../index.php" class="brand-logo "> Model Book Chile </a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li>+</li> 
                    <li class="active"><a href="../index.php">INICIO</a></li>
                    <li><a href="./login.php">INGRESA AQUI PARA PUBLICAR</a></li>
                    <li><a href="./buscador.php">BUSCADOR</a></li>
                    <li><a href="./recomendaciones.php">RECOMENDACIONES</a></li>
                    <li>+</li>               
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
        <li><a href="./login.php">INGRESA AQUI PARA PUBLICAR</a></li>
        <li><a href="./buscador.php">BUSCADOR</a></li>
		<li><a href="./recomendaciones.php">RECOMENDACIONES</a></li>
        <li><a href="#">F.A.Q.</a></li>
    </ul>
    <!-- FIN Nav movil --> 

    <div class="container " style=" width: 100%; " >
        <div class="row center"  >
            <div class="col l4 m4 s12 grey lighten-2" style=" margin: 3% 5% 0% 15%; height: 370px; width: 400px;">
                <h4 class="center">Registrate</h4>
                <form action="../controllers/ControlNuevoUsuario.php" method="post">
                    <div class="input-field">
                        <i class="material-icons prefix">fingerprint</i>
                        <input id="rut" type="text" name="rut" >
                        <label for="rut">Rut / DNI</label>
                    </div>
                    <div class="input-field">
                        <i class="material-icons prefix">alternate_email</i>
                        <input id="email" type="email" name="email">
                        <label for="email">email</label>
                    </div>
                    <div class="input-field">
                        <i class="material-icons prefix">lock</i>
                        <input id="password" type="password" name="password">
                        <label for="password">Clave de acceso</label>
                    </div>
                    <button class="btn black ancho-100">Registrate</button>
                </form>
                <p class="red-text">
                    <?php
                        if(isset($_SESSION['error'])){
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                        }
                    ?>
                </p>
                <p class="green-text">
                                <?php
                                    if(isset($_SESSION['respuesta'])){
                                        echo $_SESSION['respuesta'];
                                        unset ($_SESSION['respuesta']);
                                    }
                                ?>
                            </p>
            </div>
            
            <div class="col l4 m4 s12 grey lighten-2" style="width: 400px; height: 370px; margin: 3% 0% 0% 0%; ">
                <h4 class="center">Acceso Usuario</h4>
                <br>
                <form action="../controllers/ControlLogin.php" method="post">
                    <div class="input-field">
                        <i class="material-icons prefix">alternate_email</i>
                        <input id="email" type="email" name="email">
                        <label for="email">email</label>
                    </div>
                    <div class="input-field">
                        <i class="material-icons prefix">lock</i>
                        <input id="clave" type="password" name="clave">
                        <label for="clave">Clave de acceso</label>
                    </div>
                    <br>
                    <button class="btn black ancho-100" style="margin-top: 13px;">Entrar</button>
                </form>
                <br>
                <a href="./recuperarClave.php" style="color:#FF0000" >Olvidé mi contraseña</a>
                <p class="red-text">
                    <?php
                        if(isset($_SESSION['error2'])){
                            echo $_SESSION['error2'];
                            unset($_SESSION['error2']);
                        }
                    ?>
                </p>
            </div>
        </div> 
    </div>
    
    <!-- ========== MENU END ========== -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.sidenav');
        var instances = M.Sidenav.init(elems);
    });
</script>
</body>
</html>