<?php
ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL); 

    //OBTENER TODOS LOS MODELOS Y TODOS LOS COMENTARIOS
    use models\ModeloModel as ModeloModel;
    require_once("../models/ModeloModel.php");
    $model = new ModeloModel();
    $modelos = $model->getAllModelos();
    $comentarios = $model->getAllComentarios();
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
    <title>Page Admin</title>
</head>
<body >
<?php
if (isset($_SESSION['admin'])) { ?>
    <!-- ========== MENU START ========== -->
    <nav class="black darken-4 padding-nav">
        <div class="nav-wrapper" style="padding-right: 20px; padding-left: 20px;">
            <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <a href="../index.php" class="brand-logo "><img class="logo" src="../img/icon.jpg"> Model Book Chile </a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li>+</li>   
                    <li class="active"><a href="../index.php">Home</a></li>
                    <li><a href="./salir.php">Salir</a></li>
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
        <li><a href="../index.php">Home</a></li>
        <li><a href="./salir.php">Salir</a></li>
		
    </ul>
    <!-- ========== FIN NAV MOVIL ========== -->

    <div class="container">
        <div class="row">
            <!-- ========== FORMULARIO EDITAR ESTADO MODELO POR ADMIN ========== -->
            <?php if(isset($_SESSION['editar'])) { ?>
                <h5 class="center">Editar Modelo</h5>
                <div class="col l6 m4 s12">
                    <form action="../controllers/ControlEditarModelo.php" method="POST">
                        <div class="input-field">
                            <input readonly id="idModelo" type="text" name="idModelo" value="<?=$_SESSION['modelo']['idModelo']?>">
                            <label for="idModelo">Id</label>
                        </div>
                        <div class="input-field">
                            <input readonly id="nombre" type="text" name="nombre" value="<?=$_SESSION['modelo']['nombre']?>">
                            <label for="nombre">Nombre</label>
                        </div>
                </div>
                <div class="col l6 m4 s12">  
                        <div class="input-field">
                            <input readonly id="apellido" type="text" name="apellido" value="<?=$_SESSION['modelo']['apellido']?>">
                            <label for="apellido">apellido</label>
                        </div>
                        <div class="input-field">
                            <select class=" browser-default " name="estado">
                                <option value=0>Inactivo</option>
                                <option value=1>Activo</option>
                            </select>
                        </div>
                               
                        <button class="btn orange ancho-100">Editar Modelo</button>
                    </form>
                </div>
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
                            if(isset($_SESSION['respuesta'])){
                                echo $_SESSION['respuesta'];
                                unset ($_SESSION['respuesta']);
                            }
                        ?>
                    </p>
            <?php 
                unset( $_SESSION['editar']);
                unset($_SESSION['modelo']);
                            
            }
            ?>  
            <!-- ========== FIN FORMULARIO EDITAR MODELO POR ADMIN ========== --> 
                
            <!-- ========== FORMULARIO EDITAR ESTADO COMENTARIO POR ADMIN ========== -->
            <?php if(isset($_SESSION['editarComentario'])) { ?>
                <h5 class="center">Editar Comentario</h5>
                <div class="col l6 m4 s12">
                    <form action="../controllers/ControlEditarComentario.php" method="POST">
                        <div class="input-field">
                            <input readonly id="idComentario" type="text" name="idComentario" 
                                value="<?=$_SESSION['comentarioEdit']['idComentario']?>">
                            <label for="idComentario">Id</label>
                        </div>
                        <div class="input-field">
                            <input readonly id="email" type="text" name="email" 
                                value="<?=$_SESSION['comentarioEdit']['email']?>">
                            <label for="email">Email</label>
                        </div>
                </div>
                <div class="col l4 m4 s12">  
                        <div class="input-field">
                            <input readonly id="nombre" type="text" name="nombre" 
                                value="<?=$_SESSION['comentarioEdit']['nombre']?>">
                            <label for="nombre">Nombre</label>
                        </div>
                        <div class="input-field">
                            <select class=" browser-default " name="estado">
                                <option value=0>Por Validar</option>
                                <option value=1>Validado</option>
                            </select>
                        </div>
                               
                        <button class="btn orange ancho-100">Editar Comentario</button>
                    </form>
                </div>
                            
            <?php 
                unset( $_SESSION['editarComentario']);
                unset($_SESSION['comentarioEdit']);
            }
            ?> 

        </div>
    </div>
        <p class="red-text center">
            <?php
                if(isset($_SESSION['errorEstado'])){
                    echo $_SESSION['errorEstado'];
                    unset ($_SESSION['errorEstado']);
                }
            ?>
        </p>
        <p class="green-text center">
            <?php
                if(isset($_SESSION['respuestaEstado'])){
                    echo $_SESSION['respuestaEstado'];
                    unset ($_SESSION['respuestaEstado']);
                }
            ?>
        </p>
        <!-- ========== FIN FORMULARIO EDITAR ESTADO COMENTARIO POR ADMIN ========== -->

    <!-- ========== TABLA MODELOS ========== -->
    <br><br>
    <div class="container">
        <div class="row">
            <h4>Listado de Modelos</h4>
            <form action="../controllers/ControlListaModelos.php" method="post">
                <table class="striped" >
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>email</th>
                        <th>fecha Nacimiento</th>
                        <th>fecha Registro</th>
                        <th>Estado</th>
                        <th>Actions</th>
                    </tr>
                    <?php foreach ($modelos as $item) {  ?>
                        <?php if($item["estado"]==0){  //para dar el color rojo cuando esta Inactivo?>
                            <tr class="red-text">
                                <td><?=$item["idModelo"]?></td>
                                <td><?=$item["nombre"]?></td>
                                <td><?=$item["apellido"]?></td>
                                <td><?=$item["email"]?></td>
                                <td><?=$item["fechaNacimiento"]?></td>
                                <td><?=$item["fechaRegistro"]?></td>
                                <td>
                                    <?php if($item["estado"]==0){?>
                                        <p class="red-text">
                                            Inactivo
                                        </p>    
                                    <?php }else { ?>
                                        <p>
                                            Activo
                                        </p>
                                    <?php } ?>
                                </td>
                        <?php } else {?>
                            <tr>
                                <td><?=$item["idModelo"]?></td>
                                <td><?=$item["nombre"]?></td>
                                <td><?=$item["apellido"]?></td>
                                <td><?=$item["email"]?></td>
                                <td><?=$item["fechaNacimiento"]?></td>
                                <td><?=$item["fechaRegistro"]?></td>
                                <td>
                                    <?php if($item["estado"]==0){?>
                                        <p>
                                            Inactivo
                                        </p>    
                                    <?php }else { ?>
                                        <p>
                                            Activo
                                        </p>
                                    <?php } ?>
                                </td>
                        <?php } ?> 
                                <td>
                                    <button name="bt_edit" value="<?=$item["idModelo"]?>" class="btn-floating waves-effect orange">
                                        <i class="material-icons">edit</i></button>
                                    <button name="bt_delete" value="<?=$item["idModelo"]?>" class="btn-floating waves-effect red">
                                        <i class="material-icons">delete</i></button>
                                </td>
                            </tr>
                                        
                    <?php } ?>
                </table> 
            </form>
        </div>
    </div>
    <!-- ========== FIN TABLA MODELOS ========== -->

    <!-- ========== TABLA COMENTARIOS ========== -->
    <br><br>
        <div class="row" style="margin: 0px 100px;">
            <h4>Listado de Comentarios</h4>
            <form action="../controllers/ControlListaComentarios.php" method="post">
                <table class="highlight" >
                    <tr>
                        <th>#</th>
                        <th>Puntaje</th>
                        <th>Email</th>
                        <th>Nombre</th>
                        <th>Comentario</th>
                        <th>Estado</th>
                        <th>Fecha Publicacion</th>
                        <th>Id Modelo</th>
                        <th>Actions</th>
                    </tr>
                    <?php foreach ($comentarios as $item) {  ?>
                        <?php if($item["estado"]==0){  //para dar el color rojo cuando esta Inactivo?>
                            <tr class="red-text">
                                <td><?=$item["idComentario"]?></td>
                                <td><?=$item["puntaje"]?></td>
                                <td><?=$item["email"]?></td>
                                <td><?=$item["nombre"]?></td>
                                <td><?=$item["comentario"]?></td>
                                <td>
                                    <?php if($item["estado"]==0){?>
                                        <p class="red-text">
                                            Por validar
                                        </p>    
                                    <?php }else { ?>
                                        <p>
                                            Validado
                                        </p>
                                    <?php } ?>
                                </td>
                                <td><?=$item["fechaPublicacion"]?></td>
                                <td><?=$item["idModelo"]?></td>
                        <?php } else {?>
                            <tr>
                                <td><?=$item["idComentario"]?></td>
                                <td><?=$item["puntaje"]?></td>
                                <td><?=$item["email"]?></td>
                                <td><?=$item["nombre"]?></td>
                                <td><?=$item["comentario"]?></td>
                                <td>
                                    <?php if($item["estado"]==0){?>
                                        <p>
                                            Por validar
                                        </p>    
                                    <?php }else { ?>
                                        <p>
                                            Validado
                                        </p>
                                    <?php } ?>
                                </td>
                                <td><?=$item["fechaPublicacion"]?></td>
                                <td><?=$item["idModelo"]?></td>
                        <?php } ?> 
                                <td>
                                    <button name="bt_editComentario" value="<?=$item["idComentario"]?>" class="btn-floating waves-effect orange">
                                        <i class="material-icons">edit</i></button>
                                    <button name="bt_deleteComentario" value="<?=$item["idComentario"]?>" class="btn-floating waves-effect red">
                                        <i class="material-icons">delete</i></button>
                                </td>
                            </tr>
                                        
                    <?php } ?>
                </table> 
            </form>
        </div>
        <!-- ========== FIN TABLA COMENTARIOS ========== -->
    
<?php } else { ?>
        <a href="../index.php">
            <img class="matrix responsive-img" src="../img/matrix.jpg" >
        </a>
<?php  } ?>


<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.sidenav');
        var instances = M.Sidenav.init(elems);
    });
</script>
</body>
</html>