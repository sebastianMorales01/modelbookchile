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

    }

    public function ingresarModelo(){
        session_start();
        if (isset($_SESSION['usuario'])) {
            $usr = $_SESSION['usuario'];
            $this->email = $usr['email'];
            $this->Usuario_rut = $usr['rut']; 
            $this->fechaRegistro = date("Y/m/d");

            //FOTO PERFIL
            $nombre_foto1 = $_FILES['fotoPerfil']['name'];
            $temp1 = $_FILES['fotoPerfil']['tmp_name'];
            $tmp1 = explode('.', $nombre_foto1);
            $extension1 = end($tmp1);

            $nombre_foto1 = $this->email  . 'img1'. date('YmdHis',time()).".".$extension1;

            if(is_uploaded_file($temp1)) {
                move_uploaded_file($temp1,'../uploads/'.$nombre_foto1);
                $foto1 = 'http://localhost:8080/modelbookchile/uploads/' . $nombre_foto1;

            }else {
                $foto1 = '';
            }

            //FOTO2
            $nombre_foto2 = $_FILES['foto2']['name'];
            $temp2 = $_FILES['foto2']['tmp_name'];
            $tmp2 = explode('.', $nombre_foto2);
            $extension2 = end($tmp2);

            $nombre_foto2 = $this->email . 'img2'. date('YmdHis',time()).".".$extension2;

            if(is_uploaded_file($temp2)) {
                move_uploaded_file($temp2,'../uploads/'.$nombre_foto2);
                $foto2 = 'http://localhost:8080/modelbookchile/uploads/' . $nombre_foto2;

            }else {
                $foto2 = '';
            }
            //FOTO3
            $nombre_foto3 = $_FILES['foto3']['name'];
            $temp3 = $_FILES['foto3']['tmp_name'];
            $tmp3 = explode('.', $nombre_foto3);
            $extension3 = end($tmp3);

            $nombre_foto3 = $this->email . 'img3'. date('YmdHis',time()).".".$extension3;

            if(is_uploaded_file($temp3)) {
                move_uploaded_file($temp3,'../uploads/'.$nombre_foto3);
                $foto3 = 'http://localhost:8080/modelbookchile/uploads/' . $nombre_foto3;

            }else {
                $foto3 = '';
            }
            //FOTO4
            $nombre_foto4 = $_FILES['foto4']['name'];
            $temp4 = $_FILES['foto4']['tmp_name'];
            $tmp4 = explode('.', $nombre_foto4);
            $extension4 = end($tmp4);

            $nombre_foto4 = $this->email . 'img4'. date('YmdHis',time()).".".$extension4;

            if(is_uploaded_file($temp4)) {
                move_uploaded_file($temp4,'../uploads/'.$nombre_foto4);
                $foto4 = 'http://localhost:8080/modelbookchile/uploads/' . $nombre_foto4;

            }else {
                $foto4 = '';
            }




            if($this->nombre=="" || $this->apellido=="" || $this->fechaNacimiento=="" || $this->celular==""
                || $this->direccion=="" || $this->altura=="" || $this->peso=="" || $this->Pais_idPais==""){
                $_SESSION['errorCrearModelo']="Complete todos los campos";
                header("Location:../views/crearModelo.php");
                return;
            }


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
                    "fotoPerfil"=>$foto1,
                    "foto2"=>$foto2,
                    "foto3"=>$foto3,
                    "foto4"=>$foto4,
                    "Usuario_rut"=>$this->Usuario_rut,
                    "Pais_idPais"=>$this->Pais_idPais];

            $count = $model->nuevoModelo($data);
            if ($count == 1) {
                $_SESSION["respCrearModelo"] = "Modelo Creado con exito, espere validacion del Administrador...";
                header("Location:../index.php");
            }else{
                $_SESSION["errorCrearModelo"] = "Hubo un error a nivel de BD";
                return;
            }
        } else {
            $_SESSION["errorCrearModelo"] = "Sesion no iniciada";
            
        }
    }
}
$obj = new ControlNuevoModelo();
$obj->ingresarModelo(); 