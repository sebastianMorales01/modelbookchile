<?php

namespace controllers;

require_once("../models/ModeloModel.php");

use models\ModeloModel as ModeloModel;

class ControlListaModelos{
    public $bt_editComentario;
    public $bt_deleteComentario;

    public function __construct(){
        $this->bt_editComentario = $_POST["bt_editComentario"];
        $this->bt_deleteComentario = $_POST["bt_deleteComentario"];
    }

    public function procesar(){
        if (isset($this->bt_editComentario)) {
            session_start();
            $_SESSION["editarComentario"] = "ON";
            $model = new ModeloModel();
            $modelo = $model->buscarComentario($this->bt_editComentario);
            $_SESSION["comentarioEdit"] = $modelo[0]; 
            header("Location: ../views/pageAdmin.php");
        } else{
            $model = new ModeloModel();
            $modelo = $model->eliminarComentario($this->bt_deleteComentario);
            header("Location: ../views/pageAdmin.php");
        }
          
    }        
}
$obj = new ControlListaModelos();
$obj->procesar();