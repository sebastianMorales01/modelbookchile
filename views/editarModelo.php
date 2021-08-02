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
    <title>Editar Modelo</title>
</head>
<body style="background-image: url(../img/fondo.jpg);background-size: 100%;  ">
    <?php
    if (isset($_SESSION['modelo'])) { ?>
        <!-- ========== MENU START ========== -->
        <nav class="black darken-4 padding-nav">
            <div class="nav-wrapper" style="padding-right: 20px; padding-left: 20px;">
                <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <a href="../index.php" class="brand-logo "><img class="logo" src="../img/icon.jpg"> Model Book Chile </a>
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                        <li class="active"><a href="../index.php">INICIO</a></li>
                        <li><a href="./buscador.php">BUSCADOR</a></li>
                        <li><a href="./recomendaciones.php">RECOMENDACIONES</a></li>
                        <li><a href="./salir.php">Salir</a></li>                
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
                    <a href="#name"><span class="white-text name">Model Book Chile</span></a>
                    <a href="#email"><span class="white-text email">modelbook.chile@gmail.com</span></a>
            </li></div>
            <li class="active"><a href="../index.php">INICIO</a></li>
            <li><a href="./buscador.php">BUSCADOR</a></li>
            <li><a href="./recomendaciones.php">RECOMENDACIONES</a></li>
            <li><a href="./salir.php">Salir</a></li>
        </ul>
        <!-- ========== FIN NAV MOVIL ========== --> 
		
    <!-- ========== EDITAR DATOS DE MODELO POR USUARIO ========== -->
    <br><br>
        <div class="container center grey lighten-3" 
            style=" padding-left:100px; padding-right: 100px; padding-top: 10px; padding-bottom: 10px; border-radius: 20px;">
            <h4>Edita tus datos de Modelo</h4>
            <h6><b>Bienvenido <?= $_SESSION['modelo']['nombre'] ?> <?= $_SESSION['modelo']['apellido'] ?></b></h6>
                    <form action="../controllers/ControlEditarModeloxUsuario.php" method="POST" onsubmit="return confirm('Esta Seguro?')">
                        <div class="input-field">
                            <input value="<?= $_SESSION['modelo']['celular'] ?>" name="celular" type="text" class="validate">
                            <label class="active" for="celular">Numero de celular</label>
                        </div>
                        <div class="input-field">
                            <input value="<?= $_SESSION['modelo']['direccion'] ?>" name="direccion" type="text" class="validate">
                            <label class="active" for="direccion">Direccion</label>
                        </div>
                        <div class="input-field">
                            <input value="<?= $_SESSION['modelo']['altura'] ?>" name="altura" type="text" class="validate">
                            <label class="active" for="altura">altura en cms (ejemplo: 178)</label>
                        </div>
                        <div class="input-field">
                            <input value="<?= $_SESSION['modelo']['peso'] ?>" name="peso" type="text" class="validate">
                            <label class="active" for="peso">peso en kilos (ejemplo: 70)</label>
                        </div>
                        <div class="row center" >
                            <div class="col l6 m6 s6">
                                <button name="bt_edit" value="<?= $_SESSION['modelo']['idModelo'] ?>" class="waves-effect orange btn-large">
                                    <i class="material-icons right">edit</i> Editar</button>
                            </div>
                            <div class="col l6 m6 s6">
                                <button name="bt_delete" value="<?= $_SESSION['modelo']['idModelo'] ?>" class="waves-effect red btn-large">
                                    <i class="material-icons right">delete</i>Eliminar</button>
                            </div>
                        </div>
                    </form>

                    <p class="red-text">
                        <?php
                            if(isset($_SESSION['errorEditarModelo'])){
                                echo $_SESSION['errorEditarModelo'];
                                unset ($_SESSION['errorEditarModelo']);
                            }
                        ?>
                    </p>
                    <p class="green-text">
                        <?php
                            if(isset($_SESSION['respEditarModelo'])){
                                echo $_SESSION['respEditarModelo'];
                                unset($_SESSION['respEditarModelo']);
                            }
                        ?>
                    </p>
                </div>
            </div>
        </div>
    <!-- ========== FIN EDITAR DATOS MODELO POR USUARIO ========== -->
    <?php } else { ?>
        <a href="../index.php">
            <img class="matrix responsive-img" src="../img/matrix.jpg" >
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
        $(document).ready(function() {
            M.updateTextFields();
        });
    </script>
</body>
</html>