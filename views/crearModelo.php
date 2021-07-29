<?php
ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL); 

    // importar la funcion del ModeloModel
    use models\ModeloModel as ModeloModel;
    require_once("../models/ModeloModel.php");
    $model = new ModeloModel();
    $paises = $model->getPais();
    

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
    <?php
    if (isset($_SESSION['usuario'])) { ?>
        <!-- ========== MENU START ========== -->
        <nav class="black darken-4 padding-nav">
            <div class="nav-wrapper" style="padding-right: 20px; padding-left: 20px;">
                <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <a href="../index.php" class="brand-logo "> Model Book Chile </a>
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                        <li class="active"><a href="../index.php">INICIO</a></li>
                        <li><a href="./buscador.php">BUSCADOR</a></li>
                        <li><a href="./recomendaciones.php">RECOMENDACIONES</a></li>
                        <li><a href="./salir.php">Salir</a></li>                
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
            <li class="active"><a href="../index.php">INICIO</a></li>
            <li><a href="./buscador.php">BUSCADOR</a></li>
            <li><a href="./recomendaciones.php">RECOMENDACIONES</a></li>
            <li><a href="./salir.php">Salir</a></li>
        </ul>
        <!-- FIN Nav movil --> 
		
    <!-- ========== MENU END ========== -->
    <br><br>
        <div class="container center grey lighten-3" 
            style=" padding-left:50px; padding-right: 50px; padding-top: 10px; padding-bottom: 10px; border-radius: 20px;">
            <h4>Ingresa tus datos de Modelo</h4>
            <h6><b>Bienvenido <?= $_SESSION['usuario']['email'] ?></b></h6>
                    <form action="../controllers/ControlNuevoModelo.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col l6 m6 s12" >
                                <div class="input-field">
                                    <input id="nombre" type="text" name="nombre">
                                    <label for="nombre">Nombre</label>
                                </div>
                                <div class="input-field">
                                    <input id="apellido" type="text" name="apellido">
                                    <label for="apellido">Apellido</label>
                                </div>
                                <div class="input-field">
                                    <input id="fechaNacimiento" type="text" name="fechaNacimiento" class="datepicker">
                                    <label for="fechaNacimiento">Fecha Nacimiento</label>
                                </div>
                                <div class="input-field">
                                    <input id="celular" type="text" name="celular">
                                    <label for="celular">Numero de celular</label>
                                </div>
                            </div>

                            <div class="col l6 m6 s12">
                                <div class="input-field">
                                    <input id="direccion" type="text" name="direccion">
                                    <label for="direccion">Direccion</label>
                                </div>
                                <div class="input-field">
                                    <input id="altura" type="number" name="altura">
                                    <label for="altura">altura en cms (ejemplo: 178)</label>
                                </div>
                                <div class="input-field">
                                    <input id="peso" type="number" name="peso">
                                    <label for="peso">peso en kilos (ejemplo: 70)</label>
                                </div>
                                
                                <div class="input-field">
                                    <select class=" browser-default " name="Pais_idPais">
                                        <option>seleccione un pais</option>
                                        <?php foreach ($paises as $paises){?>
                                            <option value="<?=$paises['idPais']?>" ><?=$paises['nombre']?></option>
                                        <?php } ?> 
                                    </select>     
                                </div>

                            </div>
                        </div>
                        <div class="input-field">
                                    Foto Perfil
                                    <input type="file" name="fotoPerfil" accept="image/*">
                                    <label for="fotoPerfil"></label>
                                </div>
                                <div class="input-field">
                                    foto2
                                    <input type="file" name="foto2" accept="image/*">
                                    <label for="foto2"></label>
                                </div>
                                <div class="input-field">
                                    foto3
                                    <input type="file" name="foto3" accept="image/*">
                                    <label for="foto3"></label>
                                </div>
                                <div class="input-field">
                                    foto4
                                    <input type="file" name="foto4" accept="image/*">
                                    <label for="foto4"></label>
                                </div>
                        

                        <button class="btn black ancho-100">Crear</button>
                    </form>
                    <p class="red-text">
                        <?php
                            if(isset($_SESSION['errorCrearModelo'])){
                                echo $_SESSION['errorCrearModelo'];
                                unset ($_SESSION['errorCrearModelo']);
                            }
                        ?>
                    </p>
                    <p class="green-text">
                        <?php
                            if(isset($_SESSION['respCrearModelo'])){
                                echo $_SESSION['respCrearModelo'];
                                unset($_SESSION['respCrearModelo']);
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