<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL); 

    // OBTENER PAISES PARA EL COMBOBOX
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <title>Buscador</title>
</head>
<body style="background-image: url(../img/fondo.jpg);background-size: 100%;  ">
    <!-- ========== MENU START ========== -->
    <nav class="black darken-4 padding-nav">
        <div class="nav-wrapper" style="padding-right: 20px; padding-left: 20px;">
            <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <a href="../index.php" class="brand-logo "> <img class="logo" src="../img/icon.jpg"> Model Book Chile </a>
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
        <li><a href="./login.php">INGRESA AQUI PARA PUBLICAR</a></li>
        <li><a href="./buscador.php">BUSCADOR</a></li>
		<li><a href="./recomendaciones.php">RECOMENDACIONES</a></li>
    </ul>
    <!-- ========== FIN NAV MOVIL ========== -->

    
    <!-- ========== BUSCADOR POR PAIS ========== -->
    <div class="container center" >
        <div class="row center">
            <div class="col l2 m4 s12" style=" margin: 20px;"></div>

            <div class="col l6 m6 s12 grey lighten-2" style=" margin: 20px;">
                <h4 class="center">Buscardor</h4>
                <form action="../controllers/ControlBuscarPais.php" method="post">
                    <div class="input-field">
                        <select class="browser-default" name="Pais_idPais">
                            <option value="">seleccione un pais</option>
                            <?php foreach ($paises as $paises){?>
                                <option value=<?=$paises['idPais']?> data-icon="<?=$paises['bandera']?>"> <?=$paises['nombre']?></option>
                            <?php } ?> 
                        </select>     
                    </div>        
                    <button class="btn black ancho-100">Buscar</button>
                </form>
                <p class="red-text">
                    <?php
                        if(isset($_SESSION['errorBuscador'])){
                            echo $_SESSION['errorBuscador'];
                            unset($_SESSION['errorBuscador']);
                        }
                    ?>
                </p>
            </div>                 
        </div>               
    </div>
    <!-- ========== BUSCADOR POR PAIS ========== -->
    <br><br>

    <!-- ========== CARDS MODELOS ========== -->   
    <?php if(isset($_SESSION['buscar'])) { ?>
    <div class="container">
        <div class="row">
            <form action="../controllers/ControlPerfilModelo.php" method="post">
                <?php foreach ($_SESSION['modelo'] as $item){?>
                    <div class="col l3 m3 s12">
                        <div class="card">
                            <div class="card-image">
                                <img src="<?=$item['fotoPerfil']?>" style="height: 200px; width: 100%; object-fit: cover;" >
                                    <span style="font-size:25px;color:orange; margin-left: 10px;"><?=$item['nombre']?></span> <br>
                                    <span style="font-size:25px;color:orange; margin-left: 10px;"> <?=$item['apellido']?></span>
                            </div>
                            
                            <div class="card-action grey lighten-2">
                                <button name="bt_perfil" value="<?=$item["idModelo"]?>"  class="black" >
                                    <a class="waves-effect waves-teal btn-flat">ir al perfil</a>
                                </button>
                            </div>
                        </div>
                    </div>
                <?php } ?> 
            </form> 
        </div>
    </div>

    <?php 
        unset( $_SESSION['buscar']);
        }
    ?>
	<!-- ========== CARDS MODELOS ========== --> 

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
      
<script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
<script src="../js/buscarPais.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.sidenav');
        var instances = M.Sidenav.init(elems);
    });
    document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems, options);
  });

</script>
</body>
</html>















