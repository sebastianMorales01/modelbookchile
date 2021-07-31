<?php

namespace controllers;

require_once("../models/ModeloModel.php");

use models\ModeloModel as ModeloModel;

class ControlNuevoComentario{
    public $puntaje;
    public $email;
    public $nombre;
    public $comentario;
    public $idModelo;
    

    public function __construct()
    {
        $this->puntaje = $_POST['estrellas'];
        $this->email = $_POST['email'];
        $this->nombre = $_POST['nombre'];
        $this->comentario = $_POST['message'];
        $this->idModelo = $_POST['bt_comentar'];
        
    }

    public function ingresarComentario(){
        session_start();
        $_SESSION["perfil"] = "ON";
        
        $model = new ModeloModel();
        $modelo = $model->buscarModelo2($this->idModelo);
        $_SESSION["modelo"] = $modelo[0];

        if($this->email=="" || $this->nombre=="" || $this->comentario==""){
            $_SESSION['errorComentario']="Complete los campos..";
            header("Location:../views/perfilModelo.php");
            return;
        }
        
        $this->fechaPublicacion = date("Y/m/d");
        $data =["puntaje"=>$this->puntaje,
                "email"=>$this->email,
                "nombre"=>$this->nombre,
                "comentario"=>$this->comentario,
                "fechaPublicacion"=>$this->fechaPublicacion,
                "idModelo"=>$this->idModelo
            ];
            
        
        $count = $model->nuevoComentario($data);
        if ($count == 1) {
            $_SESSION["respComentario"] = "Comentario Creado con exito, espere validacion del Administrador...";
            header("Location:../views/perfilModelo.php");
            
        }else{
            $_SESSION["errorComentario"] = "Hubo un error a nivel de BD";
            return;
        }
        
    }

}
$obj = new ControlNuevoComentario();
$obj->ingresarComentario();