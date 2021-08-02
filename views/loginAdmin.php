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
    <title>Acceso admin</title>
</head>
<body style="background-image: url(../img/fondo.jpg);background-size: 100%;  ">
    <!-- ========== MENU START ========== -->
    <nav class="black darken-4 padding-nav">
        <div class="nav-wrapper" style="padding-right: 20px; padding-left: 20px;">
            <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <a href="../index.php" class="brand-logo "><img class="logo" src="../img/icon.jpg"> Model Book Chile </a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li class="active"><a href="../index.php">Home</a></li>     
            </ul>
        </div>
    </nav>
    <!-- ========== NAV MOVIL ========== -->
    <ul id="slide-out" class="sidenav">
        <li><div class="user-view">
                <div class="background" >
                    <img width="300" src="../img/icon2.jpg"> 
                </div>
                <a href="#user"><img class="circle" src="../img/icon.jpg"></a>
                <a href="../index.php"><span class="white-text name">Model Book Chile</span></a>
                <a href="#email"><span class="white-text email">modelbook.chile@gmail.com</span></a>
        </li></div>
        <li><a href="../index.php">Home</a></li>
    </ul>
    <!-- ========== FIN NAV MOVIL ========== -->

    <div class="container"  >
        <div class="row center"  >
            <div class="col l3 m3 s12"></div>

            <!-- ========== FORMULARIO LOGIN ADMIN ========== -->
            <div class="col l6 m6 s12 grey lighten-2" style="height: 300px ;margin-top: 20px; border-radius: 20px;">
                <h4 class="center">Acceso</h4>
                <form action="../controllers/ControlLoginAdmin.php" method="post">
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
                    <button class="btn black ancho-100">Entrar</button>
                </form>
                <p class="red-text">
                    <?php
                        if(isset($_SESSION['errorLoginAdmin'])){
                            echo $_SESSION['errorLoginAdmin'];
                            unset($_SESSION['errorLoginAdmin']);
                        }
                    ?>
                </p>
            </div>
            <!-- ========== FORMULARIO LOGIN ADMIN ========== -->
        </div> 
    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.sidenav');
        var instances = M.Sidenav.init(elems);
    });
</script>
</body>
</html>