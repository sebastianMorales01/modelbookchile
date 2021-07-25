<?php
//archivo q tomara todas las tareas de la base de datos y las transformara a formato JSON para asi poder ocuparlo

require_once("../models/ModeloModel.php");

use models\ModeloModel as ModeloModel;


class ModelosActivos{
    public function getAllModelosActivos(){
        $model = new ModeloModel();
        echo json_encode($model->getAllModelosActivos());  //transformar el arreglo asociativo a formato JSON
    }
}



$obj = new ModelosActivos();
$obj->getAllModelosActivos();