<?php

namespace controllers;

require_once("../models/UsuarioModel.php");

use models\UsuarioModel as UsuarioModel;

class ControlLogin{
    public $email;
    public $password;

    public function __construct(){
        $this->email = $_POST['email'];
        $this->password = $_POST['clave'];
    }
    
    public function iniciarSesionAdmin(){
        session_start();
        if($this->email=="" || $this->password==""){
            $_SESSION['error2']="Complete los campos";
            header("Location:../views/login.php");
            return;
        }
        $modelo = new UsuarioModel();

        


        $array = $modelo->iniciarSesionUser($this->email,$this->password);
        
        if(count($array)==0){
            $_SESSION['error2']="Datos incorrectos, intente nuevamente";
            header("Location:../views/login.php");
            return;
        }
        $_SESSION['usuario']=$array[0];
        
        header("Location:../views/crearModelo.php");

    }
}
$obj = new ControlLogin();
$obj->iniciarSesionAdmin();