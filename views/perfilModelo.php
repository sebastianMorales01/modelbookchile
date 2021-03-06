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
    <title>Perfil Modelo</title>
</head>
<body style="background-image: url(../img/fondo.jpg);background-size: 100%;  ">
    <!-- ========== MENU START ==========  -->
    <nav class="black darken-4 padding-nav">
        <div class="nav-wrapper" style="padding-right: 20px; padding-left: 20px;">
            <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <a href="../index.php" class="brand-logo "><img class="logo" src="../img/icon.jpg"> Model Book Chile </a>
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
                <a href="#name"><span class="white-text name">Model Book Chile</span></a>
                <a href="#email"><span class="white-text email">modelbook.chile@gmail.com</span></a>
        </li></div>
        <li><a href="./login.php">INGRESA AQUI PARA PUBLICAR</a></li>
        <li><a href="./buscador.php">BUSCADOR</a></li>
		<li><a href="./recomendaciones.php">RECOMENDACIONES</a></li>
    </ul>
    <!-- ========== FIN NAV MOVIL ========== -->

    <!-- ==========  USER ONLINE ========== -->
    <div class="container" >
        <li class="right"><font color="00ff00">1 Online</font></li>
    </div>
		

    <!-- ========== PERFIL MODELO ========== -->
    <br><br>
    <?php if(isset($_SESSION['perfil'])) { ?>
	    <div class="container grey darken-3 " style="border-radius: 20px; height: 140px" > 
            <div class="row">
                <div class="col l6 m6 s12" style="overflow:visible;z-index:9999999999999999999999999999999999999;">
					<h2 class="wow fadeInLeftBig animated" data-wow-delay="0.3s" 
                        style="visibility: visible;-webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                        <?=$_SESSION['modelo']['nombre']?> <?=$_SESSION['modelo']['apellido']?> &nbsp;
						
						<img src="../img/sello.png" style="width:35px;">  
                    </h2>       
				</div> 

                <div class="col l3 m6 s12 porlass" align="left" style="margin-bottom:20px; "></div>	

                <div class="col l3 m6 s12 porlass"  >
                    <div class="telefono" style="margin-top: 45px;" >	
                        <a href="https://twitter.com"  class="btn" style="background-color:#4a9cf3; border-radius:5px;padding:5px; margin-left: 10px; height: max-content; " 
                            id="b" target="_blank"><span class="label" style="font-size:12px;">Twittear</span>
                        </a> 
                        <a href="https://wa.me" style="float:left">
                            <img src="../img/ws.png" style="height:40px;float:left;" >
                            <span style="font-family:Trebuchet MS;color: #009900;float: left;font-size: 30px;"> 
                                &nbsp;<?=$_SESSION['modelo']['celular']?>
                            </span>
                        </a>                     
                    </div>
                </div>      
			</div>	
        </div>

        <!-- ==========  CONTENEDOR DE FOTOS ========== -->
        <div class="container">
            <div class="row" style="margin-top: 20px;   ">
                <div class="col l3 m6 s12">
                    <img class="materialboxed"  style="height: 250px; width: 250px; object-fit: cover;" 
                    src="<?= $_SESSION['modelo']['fotoPerfil'] ?>">
                </div>
                <div class="col l3 m6 s12">
                    <img class="materialboxed"  style="height: 250px; width: 250px; object-fit: cover;" 
                    src="<?= $_SESSION['modelo']['foto2'] ?>">
                </div>
                <div class="col l3 m6 s12">
                    <img class="materialboxed" style="height: 250px; width: 250px; object-fit: cover;" 
                    src="<?= $_SESSION['modelo']['foto3'] ?>">
                </div>
                <div class="col l3 m6 s12">
                    <img class="materialboxed" style="height: 250px; width: 250px; object-fit: cover;" 
                    src="<?= $_SESSION['modelo']['foto4'] ?>">
                </div>
            </div>
        </div>
        <!-- ========== FIN CONTENEDOR DE FOTOS ========== -->

        
        <div class="container" style="border-radius: 20px;" > 
            <div class="row">
                <!-- ========== CONTENEDOR DATOS GENERALES ========== -->
                <div class="col l6 m6 s12 grey lighten-3" style=" padding: 30px; height: 480px; border-radius: 20px;">
                    <div class="center" style="font-size:18px;"><b>Datos Generales</b></div>
                    <br>
                    <table class="highlight">
                        <thead>
                        
                        </thead>

                        <tbody>
                            <tr>
                                <td><strong><b>Pais</strong></b></td>
                                <td>
                                    <span style="font-weight:strong;color:orange;"><strong><?=$_SESSION['modelo']['pais']?></strong></span>
                                </td>
                            </tr>
                            <tr>
                                <td><strong><b>Fecha Nacimiento</strong></b></td>
                                <td>
                                    <span style="font-weight:strong;color:orange;"><strong><?=$_SESSION['modelo']['fechaNacimiento']?></strong></span>
                                </td>
                            </tr>
                            <tr>
                                <td><strong><b>Celular</strong></b></td>
                                <td> <a href="https://wa.me" style="float:left">
                                        <span style="font-family:Trebuchet MS;color: #009900;float: left;">
                                            <strong><?=$_SESSION['modelo']['celular']?></strong>
                                        </span>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td><strong><b>Email</strong></b></td>
                                <td>
                                    <span style="font-weight:strong;color:orange;"><strong><?=$_SESSION['modelo']['email']?></strong></span>
                                </td>
                            </tr>
                            <tr>
                                <td><strong><b>Direccion</strong></b></td>
                                <td>
                                    <span style="font-weight:strong;color:orange;"><strong><?=$_SESSION['modelo']['direccion']?></strong></span>
                                </td>
                            </tr>
                            <tr>
                                <td><strong><b>Altura</strong></b></td>
                                <td>
                                    <span style="font-weight:strong;color:orange;"><strong><?=$_SESSION['modelo']['altura']?> kg </strong></span>
                                </td>
                            </tr>
                            <tr>
                                <td><strong><b>Peso</b></strong></td>
                                <td>
                                    <span style="font-weight:strong;color:orange;"><strong><?=$_SESSION['modelo']['peso']?> kg </strong> </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- ========== CONTENEDOR DATOS GENERALES ========== -->

                <!-- ========== CONTENEDOR INGRESAR COMENTARIOS ========== -->
                <div class="col l6 m6 s12 grey lighten-3" style="padding: 30px; height: 480px; border-radius: 20px; "> 
                    <div class="center" style="font-size:18px;"><b>Ingresar Comentario</b></div> <br>

                    <div class="row">
                        <form class="col s12" action="../controllers/ControlNuevoComentario.php" method="post">
                            <div class="row">
                                <div class="input-field" >
                                    <i class="material-icons prefix">alternate_email</i>
                                    <input id="email" type="email" name="email">
                                    <label for="email">Email</label>
                                </div>
                                <div class="input-field" >
                                    <i class="material-icons prefix">account_circle</i>
                                    <input id="nombre" type="text" name="nombre">
                                    <label for="nombre">Nombre</label>
                                </div>
                                <p class="clasificacion">
                                    <input id="radio1" type="radio" name="estrellas" value="5"><!--
                                    --><label for="radio1">???</label><!--
                                    --><input id="radio2" type="radio" name="estrellas" value="4"><!--
                                    --><label for="radio2">???</label><!--
                                    --><input id="radio3" type="radio" name="estrellas" value="3"><!--
                                    --><label for="radio3">???</label><!--
                                    --><input id="radio4" type="radio" name="estrellas" value="2"><!--
                                    --><label for="radio4">???</label><!--
                                    --><input id="radio5" type="radio" name="estrellas" value="1"><!--
                                    --><label for="radio5">???</label>
                                </p>
                                Ingresar Comentario
                                <textarea name="message" onkeyup="countChars(this);"></textarea>
                                    <p id="charNum" style="transform: translateY(-70%);" >0 characters</p> 
                                    <button class="btn black ancho-100 center" 
                                        style=" transform: translateX(25%) translateY(-50%);"
                                      name="bt_comentar" value="<?=$_SESSION['modelo']["idModelo"]?>">Comentar</button>
                            </div>
                        </form>
                        <p class="red-text center"  style="transform: translateY(-8%);">
                            <?php
                                if(isset($_SESSION['errorComentario'])){
                                    echo $_SESSION['errorComentario'];
                                    unset($_SESSION['errorComentario']);
                                }
                            ?>
                        </p>
                        <p class="green-text center" style="transform: translateY(-8%);">
                            <?php
                                if(isset($_SESSION['respComentario'])){
                                    echo $_SESSION['respComentario'];
                                    unset ($_SESSION['respComentario']);
                                }
                            ?>
                        </p>
                    </div>
                </div> 
                <!-- ========== FIN CONTENEDOR INGRESAR COMENTARIOS ========== -->
            </div>  
        </div> 

		
        <!-- ========== CONTENEDOR MOSTRAR COMENTARIOS ========== -->                        
        <div class="container blue-grey lighten-5" style="border-radius: 20px;"> 
            <div class="row ">
                <h4 class="center">Comentarios</h4>
                <?php foreach ($_SESSION['comentario'] as $item){?>
                    <div class="col s12 m12">
                        <div class="card blue-grey darken-1" style="border-radius: 20px;">
                            <div class="card-content white-text">
                                <p>Nombre: <?=$item['nombre']?></p>
                                <p>Email: <?=$item['email']?></p>
                                <p><?=$item['fechaPublicacion']?></p>
                                <p >
                                    <?php if($item['puntaje']==5){?>
                                        <p style="color: orange; font-size: 20px;">???????????????</p>   
                                    <?php } ?>
                                    <?php if($item['puntaje']==4){?>
                                        <p style="color: orange; font-size: 20px;">????????????</p>   
                                    <?php } ?>
                                    <?php if($item['puntaje']==3){?>
                                        <p style="color: orange; font-size: 20px;">?????????</p>   
                                    <?php } ?>
                                    <?php if($item['puntaje']==2){?>
                                        <p style="color: orange; font-size: 20px;">??????</p>   
                                    <?php } ?>
                                    <?php if($item['puntaje']==1){?>
                                        <p style="color: orange; font-size: 20px;">???</p>   
                                    <?php } ?>
                                    <?php if($item['puntaje']==NULL){?>
                                        <p style="color: orange; font-size: 20px;"></p>   
                                    <?php } ?>
                            </div>
                            <div class="card-action" style="border-radius: 20px;">
                                <a ><?=$item['comentario']?></a>
                            </div>
                        </div>
                    </div>   
                <?php } ?> 
            </div>
        </div>
        <!-- ========== FIN CONTENEDOR MOSTRAR COMENTARIOS ========== --> 

    <?php 
        unset( $_SESSION['perfil']);
        unset($_SESSION['modelo']);
        }
    ?>  

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.sidenav');
            var instances = M.Sidenav.init(elems);  
        }); 
    </script>
    <script src="../js/contarCaracteres.js"></script>
    <script src="../js/materialbox.js"></script>

</body>
</html>