<?php

namespace controllers;

require_once("../models/ModeloModel.php");

use models\ModeloModel as ModeloModel;

class ControlEditarComentario{
    public $idComentario;
    public $email;
    public $nombre;
    public $estado;

    public function __construct(){
        $this->idComentario = $_POST["idComentario"];
        $this->email = $_POST["email"];
        $this->nombre = $_POST["nombre"];
        $this->estado = $_POST["estado"];
    }

    public function editar(){
        session_start();
        
        $data=['idComentario'=>$this->idComentario, 'email'=>$this->email, 'nombre'=>$this->nombre, 'estado'=>$this->estado];
        $model = new ModeloModel();
        $count = $model->editarComentario($this->idComentario, $data);
        
        if ($count == 1) {
            $_SESSION["respuestaEstado"] = "Estado Actualizado";
        } else {
            $_SESSION["errorEstado"] = "Error en la BD";
        }
        header("Location: ../views/pageAdmin.php");
    }
}

$obj = new ControlEditarComentario();
$obj->editar();