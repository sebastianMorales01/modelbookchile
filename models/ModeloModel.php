<?php
namespace models;
require_once("Conexion.php");

class ModeloModel{
    public function nuevoModelo($data){
        $stm = Conexion::conector()->prepare("INSERT INTO modelo 
        VALUES(NULL,:nombre,:apellido,:fechaNacimiento,:celular,:email,:direccion,:altura,
                :peso,:fechaRegistro,0,NULL,:Usuario_rut,:Pais_idPais)");

        $stm->bindParam(":nombre",$data['nombre']);
        $stm->bindParam(":apellido",$data['apellido']);
        $stm->bindParam(":fechaNacimiento",$data['fechaNacimiento']);
        $stm->bindParam(":celular",$data['celular']);
        $stm->bindParam(":email",$data['email']);
        $stm->bindParam(":direccion",$data['direccion']);
        $stm->bindParam(":altura",$data['altura']);
        $stm->bindParam(":peso",$data['peso']);
        $stm->bindParam(":fechaRegistro",$data['fechaRegistro']);
        //$stm->bindParam(":foto",$data['foto']);
        $stm->bindParam(":Usuario_rut",$data['Usuario_rut']);
        $stm->bindParam(":Pais_idPais",$data['Pais_idPais']);

        return $stm->execute();
    }

    
    public function getAllModelosActivos(){  
        $stm = Conexion::conector()->prepare("SELECT * FROM modelo WHERE estado=1");
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getAllModelosInactivos(){  
        $stm = Conexion::conector()->prepare("SELECT * FROM modelo WHERE estado=0");
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getAllModelos(){  
        $stm = Conexion::conector()->prepare("SELECT * FROM modelo");
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function eliminarModelo($idModelo){
        $stm = Conexion::conector()->prepare("DELETE FROM modelo WHERE idModelo=:A");
        $stm->bindParam(":A",$idModelo); 
        return $stm->execute();
    }

    public function editarEstado($idModelo, $data){
        $stm = Conexion::conector()->prepare("UPDATE modelo SET estado=:A WHERE idModelo=:B ");
        $stm->bindParam(":A", $data['estado']);
        $stm->bindParam(":B", $idModelo);
        return $stm->execute();
    }



    public function buscarModeloXPais($idPais){
        $sql='
            select *
            from modelo 
            where Pais_idPais = :A
        ';
        $stm = Conexion::conector()->prepare($sql);
        $stm->bindParam(":A", $idPais);
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }
    

    public function buscarModeloXPais2($idPais){
        $sql='
            select m.idModelo, m.nombre, m.apellido, m.fechaNacimiento, m.celular, m.email, m.direccion, m.altura, m.peso,
            m.fechaRegistro, m.estado, m.foto, p.nombre "pais"
            from modelo m 
            inner join pais p 
                on p.idPais=m.Pais_idPais
            where m.Pais_idPais = :A
        ';
        $stm = Conexion::conector()->prepare($sql);
        $stm->bindParam(":A", $idPais);
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }


    
    public function buscarModelo($idModelo){
        $stm = Conexion::conector()->prepare("SELECT * FROM modelo WHERE idModelo=:A");
        $stm->bindParam(":A",$idModelo); 
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    
    }
    
    public function buscarModelo2($idModelo){
        $sql='
            select m.idModelo, m.nombre, m.apellido, m.fechaNacimiento, m.celular, m.email, m.direccion, m.altura, m.peso,
            m.fechaRegistro, m.estado, m.foto, p.nombre "pais"
            from modelo m 
            inner join pais p 
                on p.idPais=m.Pais_idPais
            where m.idModelo = :A
        ';
        $stm = Conexion::conector()->prepare($sql);
        $stm->bindParam(":A",$idModelo); 
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    
    }

    public function getPais(){
        $stm = Conexion::conector()->prepare("SELECT * FROM pais");
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }




    public function nuevoComentario($data){
        $stm = Conexion::conector()->prepare("INSERT INTO comentario 
            VALUES(NULL,NULL,:email,:nombre,:comentario,0,:fechaPublicacion,:idModelo)");

        $stm->bindParam(":email",$data['email']);
        $stm->bindParam(":nombre",$data['nombre']);
        $stm->bindParam(":comentario",$data['comentario']);
        $stm->bindParam(":fechaPublicacion",$data['fechaPublicacion']);
        $stm->bindParam(":idModelo",$data['idModelo']);
        return $stm->execute();
    }

    public function getAllComentarios(){  
        $stm = Conexion::conector()->prepare("SELECT * FROM comentario");
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function eliminarComentario($idComentario){
        $stm = Conexion::conector()->prepare("DELETE FROM comentario WHERE idComentario=:A");
        $stm->bindParam(":A",$idComentario); 
        return $stm->execute();
    }

    public function editarComentario($idComentario, $data){
        $stm = Conexion::conector()->prepare("UPDATE comentario SET estado=:A WHERE idComentario=:B ");
        $stm->bindParam(":A", $data['estado']);
        $stm->bindParam(":B", $idComentario);
        return $stm->execute();
    }

    public function buscarComentario($idComentario){
        $stm = Conexion::conector()->prepare("SELECT * FROM comentario WHERE idComentario=:A");
        $stm->bindParam(":A",$idComentario); 
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    
    }

    public function buscarComentarioxModelo($idModelo){
        $sql='
            select *
            from comentario 
            where idModelo = :A && estado=1
        ';
        $stm = Conexion::conector()->prepare($sql);
        $stm->bindParam(":A",$idModelo); 
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    
    }





    //get modelos solo con foto, nombre y pais




}





?>