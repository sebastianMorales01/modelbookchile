<?php

namespace controllers;

require_once("../models/ModeloModel.php");

use models\ModeloModel as ModeloModel;

class ControlListaModelos{
    public $bt_edit;
    public $bt_delete;

    public $celular;
    public $direccion;
    public $altura;
    public $peso;

    public function __construct(){
        $this->bt_edit = $_POST["bt_edit"];
        $this->bt_delete = $_POST["bt_delete"];

        $this->celular = $_POST["celular"];
        $this->direccion = $_POST["direccion"];
        $this->altura = $_POST["altura"];
        $this->peso = $_POST["peso"];
    }

    public function procesar(){
        if (isset($this->bt_edit)) {
            session_start();
            
            $data=['celular'=>$this->celular, 'direccion'=>$this->direccion, 'altura'=>$this->altura, 'peso'=>$this->peso];
            $model = new ModeloModel();
            $count = $model->editarModeloxUsuario($this->bt_edit, $data);
        
            if ($count == 1) {
                $arr = $model->buscarModelo($this->bt_edit);
                $_SESSION['modelo']=$arr[0];
                $_SESSION["respEditarModelo"] = "Modelo Actualizado";
                
            } else {
                $_SESSION["errorEditarModelo"] = "Error en la BD";
            }
            header("Location: ../views/editarModelo.php");

        }else{
            $model = new ModeloModel();
            //$model->eliminarModelo($this->bt_delete);
            $model->eliminarModelo2($this->bt_delete);
            header("Location: ../views/login.php");
        }
        
        
    }        
}
$obj = new ControlListaModelos();
$obj->procesar();