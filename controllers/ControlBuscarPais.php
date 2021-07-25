<?php

namespace controllers;

require_once("../models/ModeloModel.php");

use models\ModeloModel as ModeloModel;


class ModelosxPais{

    public $Pais_idPais;
    
    public function __construct(){
        $this->Pais_idPais = $_POST['Pais_idPais'];
    }

    public function getAllModelosxPais(){
        session_start();

        if($this->Pais_idPais==""){
            $_SESSION['errorBuscador']="Seleccione un Pais";
            header("Location:../views/buscador.php");
            return;
        }

        $_SESSION["buscar"] = "ON";
        $model = new ModeloModel();
        $arr = $model->buscarModeloXPais($this->Pais_idPais); 

        $_SESSION["modelo"] = $arr; 
        header("Location: ../views/buscador.php");

    }
}

$obj = new ModelosxPais();
$obj->getAllModelosxPais();