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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <title>Recomendaciones</title>
</head>
<body style="background-image: url(../img/fondo.jpg);background-size: 100%;  ">
    <!-- ========== MENU START ========== -->
    <nav class="black darken-4 padding-nav">
        <div class="nav-wrapper" style="padding-right: 20px; padding-left: 20px;">
            <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <a href="../index.php" class="brand-logo "><img class="logo" src="../img/icon.jpg">  Model Book Chile </a>
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
    <!-- ========== NAV MOVIL ONLINE ========== -->
    <ul id="slide-out" class="sidenav">
        <li><div class="user-view">
                <div class="background" >
                    <img width="300"src="../img/icon2.jpg"> 
                </div>
                <a href="#user"><img class="circle" src="../img/icon.jpg"></a>
                <a href="../index.php"><span class="white-text name">Model Book Chile</span></a>
                <a href="#email"><span class="white-text email">modelbook.chile@gmail.com</span></a>
        </li></div>
        <li><a href="./login.php">INGRESA AQUI PARA PUBLICAR</a></li>
        <li><a href="./buscador.php">BUSCADOR</a></li>
		<li><a href="./recomendaciones.php">RECOMENDACIONES</a></li>
    </ul>
    <!-- ========== FIN NAV MOVIL ONLINE ========== -->

    <!-- ==========  USER ONLINE ========== -->
    <div class="container">
        <li class="right"><font color="00ff00">1 Online</font></li>
    </div>
		


    <!-- ==========  RECOMENDACIONES ========== -->
    <br><br>
    <div class="container" >
        <div class="row grey lighten-2" style="padding: 10px;">
            <div class="col-md-12 text-center">
				<h3 class="center">RECOMENDACIONES</h3>
				<h5>LEER ATENTAMENTE</h5>
				<div class="divider black"><i class="fa fa-book"></i></div>
			</div>

            <div class="col-sm-12" >
				<h4 class="entry-title">Recomendaciones</h4>
							
				<p></p>
                <p>
                    <strong>Estas recomendaciones están destinadas a los clientes que buscan los servicios 
                            de los modelos que aquí se publicitan.
                    </strong>
                </p>
                <p>
                    <em><strong>MODEL BOOK CHILE no es una agencia</strong></em> 
                        por lo tanto no guarda ninguna relación con los anunciantes. 
                        Las personas que publican son todas, absolutamente todas independientes. 
                        &nbsp;
                </p>
                <p> ModelBook Chile no se responsabiliza de los contenidos publicados por terceros en el sitio. 
                    ModelBook Chile no es una agencia, ni promueve nada, sólo actúa como prestador de servicios de 
                    publicidad. Los modelos que se publican en este sitio, no tienen ninguna relación directa 
                    con ModelBook Chile, excepto el de la publicación y promoción independiente.
                </p>
                <p>
                    <strong>IMPORTANTE:</strong> lo que acredita la certificación, es que las fotos con rostro pertenecen
                    a la persona, no las medidas, peso, altura, etc. Esos datos el modelo los puede modificar en cualquier
                    momento sin que el sitio se entere.
                </p>			
			</div>
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