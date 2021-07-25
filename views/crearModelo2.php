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
                <a href="../index.php" class="brand-logo "> <img class="logo" src="img/ojo.png"> Model Book Chile </a>
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                        <li class="active"><a href="../index.php">INICIO</a></li>
                        <li><a href="buscador.php">BUSCADOR</a></li>
                        <li><a href="#">RECOMENDACIONES</a></li>
                        <li><a href="#">F.A.Q.</a></li>
                        <li><a href="salir.php">Salir</a></li>                
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
            <li><a href="buscador.php">BUSCADOR</a></li>
            <li><a href="#">RECOMENDACIONES</a></li>
            <li><a href="#">F.A.Q.</a></li>
            <li><a href="salir.php">Salir</a></li>
        </ul>
        <!-- FIN Nav movil --> 
		
    <!-- ========== MENU END ========== -->
        <div class="container center" style="border: 1px solid red; padding-left:100px; padding-right: 100px;">
            <h4>Ingresa tus datos de Modelo</h4>
            <h6>Bienvenido <?= $_SESSION['usuario']['email'] ?></h6>
                    <form action="../controllers/ControlNuevoModelo2.php" method="POST" enctype="multipart/form-data">
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

                        <div class="input-field">
                            <input id="foto" type="file" name="foto" accept="image/*" >
                            <label for="foto"></label>
                        </div>

                        <button class="btn black ancho-100">Crear</button>
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