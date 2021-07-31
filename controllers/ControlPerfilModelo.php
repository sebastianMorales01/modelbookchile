<?php

namespace controllers;

require_once("../models/ModeloModel.php");

use models\ModeloModel as ModeloModel;

class ControlPerfilModelo{
    public $bt_perfil;
    

    public function __construct(){
        $this->bt_perfil = $_POST["bt_perfil"];
    }

    public function procesar(){
        if (isset($this->bt_perfil)) {
            session_start();
            $_SESSION["perfil"] = "ON";
            $model = new ModeloModel();
            $modelo = $model->buscarModelo2($this->bt_perfil);
            $_SESSION["modelo"] = $modelo[0]; 
            $comentario = $model->buscarComentarioxModelo($this->bt_perfil);
            $_SESSION["comentario"] = $comentario; 
            header("Location: ../views/perfilModelo.php");
        } 
        
    }        
}
$obj = new ControlPerfilModelo();
$obj->procesar();