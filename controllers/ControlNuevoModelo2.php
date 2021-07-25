<?php

namespace controllers;

require_once("../models/ModeloModel.php");

use models\ModeloModel as ModeloModel;

class ControlNuevoModelo{

    public $nombre;
    public $apellido;
    public $fechaNacimiento;
    public $celular;
    public $email;
    public $direccion;
    public $altura;
    public $peso;
    public $fechaRegistro;
    public $Usuario_rut;
    public $Pais_idPais;
    
    public $foto;

    public function __construct()
    {
        $this->nombre = $_POST['nombre'];
        $this->apellido = $_POST['apellido'];
        $this->fechaNacimiento = $_POST['fechaNacimiento'];
        $this->celular = $_POST['celular'];
        $this->direccion = $_POST['direccion'];
        $this->altura = $_POST['altura'];
        $this->peso = $_POST['peso'];
        $this->Pais_idPais = $_POST['Pais_idPais'];
        $this->foto = $_FILES['foto'];
        
    }

    public function ingresarModelo(){
        session_start();
        if (isset($_SESSION['usuario'])) {
            $usr = $_SESSION['usuario'];
            $this->email = $usr['email'];
            $this->Usuario_rut = $usr['rut']; 
            $this->fechaRegistro = date("Y/m/d");

            


            $model = new ModeloModel();
            $data =["nombre"=>$this->nombre,
                    "apellido"=>$this->apellido,
                    "fechaNacimiento"=>$this->fechaNacimiento,
                    "celular"=>$this->celular,
                    "email"=>$this->email,
                    "direccion"=>$this->direccion,
                    "altura"=>$this->altura,
                    "peso"=>$this->peso,
                    "fechaRegistro"=>$this->fechaRegistro,
                    "foto"=>$this->foto,
                    "Usuario_rut"=>$this->Usuario_rut,
                    "Pais_idPais"=>$this->Pais_idPais];
            
            $count = $model->nuevoModelo($data);
            if ($count == 1) {
                $_SESSION["resp"] = "Modelo Creado con exito";
                header("Location:../views/subirFotos.php");
            }else{
                $_SESSION["error"] = "Hubo un error a nivel de BD";
            }


        } else {
            $_SESSION["error"] = "Sesion no iniciada";
        }

    }



}
$obj = new ControlNuevoModelo();
$obj->ingresarModelo();