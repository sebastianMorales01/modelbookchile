<?php

namespace controllers;

require_once("../models/UsuarioModel.php");

use models\UsuarioModel as UsuarioModel;

class ControlLoginAdmin{
    public $email;
    public $password;

    public function __construct(){
        $this->email = $_POST['email'];
        $this->password = $_POST['clave'];
    }
    
    public function iniciarSesionAdmin(){
        session_start();
        if($this->email=="" || $this->password==""){
            $_SESSION['errorLoginAdmin']="Complete los campos";
            header("Location:../views/pageAdmin.php");
            return;
        }
        $modelo = new UsuarioModel();
        $array = $modelo->iniciarSesionAdmin($this->email,$this->password);
        
        if(count($array)==0){
            $_SESSION['errorLoginAdmin']="Datos incorrectos, intente nuevamente";
            header("Location:../views/pageAdmin.php");
            return;
        }
        
        $_SESSION['admin']=$array[0];
        header("Location:../views/pageAdmin.php");

    }
}
$obj = new ControlLoginAdmin();
$obj->iniciarSesionAdmin();