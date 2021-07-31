<?php

namespace controllers;

require_once("../models/UsuarioModel.php");

use LengthException;
use models\UsuarioModel as UsuarioModel;

class ControlNuevoUsuario{
    public $rut;
    public $email;
    public $password;

    public function __construct() {
        $this->rut = $_POST["rut"];
        $this->email = $_POST["email"];
        $this->password = $_POST["password"];
    }
    
    public function guardarUsuario(){
        session_start();
        if ($this->rut=="" || $this->email=="" || $this->password=="") {
            $_SESSION["error"] = "campos vacios";
            header("Location: ../views/login.php");
            return;
        }

        $model = new UsuarioModel();  
        
        $buscaRut = $model->buscarUsuarioRut($this->rut);
        $buscaEmail = $model->buscarUsuarioEmail($this->email);
        $largo = count(explode(" ", $this->password));

    
        if($buscaRut == null && $buscaEmail == null){
            //if($largo >= 5){
                $count = $model->nuevoUsuario(
                    ["rut"=>$this->rut,"email"=>$this->email,"password"=>$this->password]
                );
                if ($count == 1) {
                    $_SESSION["respuesta"] = "Usuario Creado con exito";
                }else{
                    $_SESSION["error"] = "Hubo un error a nivel de BD";
                }
            //}else{
               // $_SESSION["error"] = "la contrase;a debe tener minimo 6 caracteres";
           // }
            
        }else{
            $_SESSION["error"] = "Usuario ya registrado";
        }
        header("Location: ../views/login.php");
    
    }

}

$obj = new ControlNuevoUsuario();
$obj->guardarUsuario();