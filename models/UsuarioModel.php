<?php
namespace models;
require_once("Conexion.php");

class UsuarioModel{
    public function nuevoUsuario($data){
        $stm = Conexion::conector()->prepare("INSERT INTO usuario VALUES(:A,:B,md5(:C),'usuario')");   //admin@gmail.com  -- administrador
        $stm->bindParam(":A",$data['rut']);
        $stm->bindParam(":B",$data['email']);
        $stm->bindParam(":C",$data['password']);
        return $stm->execute();
    }

    public function buscarUsuarioRut($rut){
        $stm = Conexion::conector()->prepare("SELECT * FROM usuario WHERE rut=:A");
        $stm->bindParam(":A",$rut); 
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function buscarUsuarioEmail($email){
        $stm = Conexion::conector()->prepare("SELECT * FROM usuario WHERE email=:A");
        $stm->bindParam(":A",$email); 
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function iniciarSesionUser($email,$password){
        $stm = Conexion::conector()->prepare("SELECT * FROM usuario WHERE email=:A AND password=:B AND rol='usuario'");
        $stm->bindParam(":A",$email);
        $stm->bindParam(":B",md5($password));
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }



     //para el admin
    public function iniciarSesionAdmin($email,$password){
        $stm = Conexion::conector()->prepare("SELECT * FROM usuario WHERE email=:A AND password=:B AND rol='administrador'");
        $stm->bindParam(":A",$email);
        $stm->bindParam(":B",md5($password));
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getAllUser(){  
        $stm = Conexion::conector()->prepare("SELECT * FROM usuario WHERE rol='usuario'");
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function eliminarUsuario($rut){
        $stm = Conexion::conector()->prepare("DELETE FROM usuario WHERE rut=:A");
        $stm->bindParam(":A",$rut); 
        return $stm->execute();
    }



}

?>