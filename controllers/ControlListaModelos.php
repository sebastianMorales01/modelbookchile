<?php

namespace controllers;

require_once("../models/ModeloModel.php");

use models\ModeloModel as ModeloModel;

class ControlListaModelos{
    public $bt_edit;
    public $bt_delete;

    public function __construct(){
        $this->bt_edit = $_POST["bt_edit"];
        $this->bt_delete = $_POST["bt_delete"];
    }

    public function procesar(){
        if (isset($this->bt_edit)) {
            session_start();
            $_SESSION["editar"] = "ON";
            $model = new ModeloModel();
            $modelo = $model->buscarModelo($this->bt_edit);
            $_SESSION["modelo"] = $modelo[0]; 
            header("Location: ../views/pageAdmin.php");
        } else{
            $model = new ModeloModel();
            $modelo = $model->eliminarModelo2($this->bt_delete);
            header("Location: ../views/pageAdmin.php");
        }
           
    }        
}
$obj = new ControlListaModelos();
$obj->procesar();