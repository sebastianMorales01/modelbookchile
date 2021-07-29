<?php

namespace controllers;

require_once("../models/ModeloModel.php");

use models\ModeloModel as ModeloModel;

class ControlEditarModelo{
    public $idModelo;
    public $nombre;
    public $apellido;
    public $estado;

    public function __construct(){
        $this->idModelo = $_POST["idModelo"];
        $this->nombre = $_POST["nombre"];
        $this->nombre = $_POST["apellido"];
        $this->estado = $_POST["estado"];
    }

    public function editar(){
        session_start();
        
        $data=['idModelo'=>$this->idModelo, 'nombre'=>$this->nombre, 'apellido'=>$this->apellido, 'estado'=>$this->estado];
        $model = new ModeloModel();
        $count = $model->editarEstado($this->idModelo, $data);
        
        if ($count == 1) {
            $_SESSION["respuestaEstado"] = "Estado Actualizado";
        } else {
            $_SESSION["errorEstado"] = "Error en la BD";
        }
        header("Location: ../views/pageAdmin.php");
    }
}

$obj = new ControlEditarModelo();
$obj->editar();