<?php
require_once "Mysql.php";

class Especialidad{

private $_idEspecialidad;
private $_descripcion;

/**
 * Get the value of _idEspecialidad
 */ 
public function getIdEspecialidad()
{
return $this->_idEspecialidad;
}

/**
 * Set the value of _idEspecialidad
 *
 * @return  self
 */ 
public function setIdEspecialidad($_idEspecialidad)
{
$this->_idEspecialidad = $_idEspecialidad;

return $this;
}

/**
 * Get the value of _descripcion
 */ 
public function getDescripcion()
{
return $this->_descripcion;
}

/**
 * Set the value of _descripcion
 *
 * @return  self
 */ 
public function setDescripcion($_descripcion)
{
$this->_descripcion = $_descripcion;

return $this;
}

public function crearEspecialidad($especialidad,$registro){
    $especialidad->_idEspecialidad= $registro['id_especialidad'];
    $especialidad->_descripcion= $registro['especialidad_descripcion'];
    return $especialidad;
}



public function insert(){
    $sql = "INSERT INTO `especialidad` (`especialidad_descripcion`) VALUES ('$this->_descripcion', '$this->_horaFin', '$this->_numero)";
    $database=new Mysql();

    $database->insertarRegistro($sql);
    
}

public static function listaTodos(){
    $sql=" SELECT id_especialidad, especialidad_descripcion,estado FROM especialidad";
    $database=new Mysql();
    $datos=$database->consultar($sql);
    $listadoEspecialidad=[];
    
    while ($registro = $datos->fetch_assoc()){
        if($registro['estado']==1){

        $Especialidad=new Especialidad();
        $Especialidad->crearEspecialidad($Especialidad,$registro);

        $listadoEspecialidad[]=$Especialidad;
        }
        
    }

    return $listadoEspecialidad;

}

public static function darDeBaja($idEspecialidad){
    $sql = "UPDATE `especialidad` SET `estado` = '2' WHERE (`id_especialidad` = '$idEspecialidad')";

    $database= new MySql();
    $datos = $database->eliminarRegistro($sql);
}

public static function obtenerTodoPorId($id){
    $sql = "SELECT id_especialidad,especialidad_descripcion from especialidad WHERE id_especialidad={$id};";

    $db = new MySql();
    $datos = $db->consultar($sql);

    while ($registro = $datos->fetch_assoc()){

        $especialidad=new Especialidad();
        $especialidad->crearEspecialidad($especialidad,$registro);
    }

    return $especialidad;
}


public function actualizarEspecialidad(){

    $database = new MySql();
    $sql = "UPDATE `especialidad` SET `especialidad_descripcion` = '{$this->_descripcion}' WHERE (`id_especialidad` = '{$this->_idEspecialidad}');";

    $database->actualizar($sql);


}

public static function listarPorDocente($idDocente){
    $sql="SELECT id_especialidad, especialidad_descripcion from especialidad 
        JOIN docente_especialidad on docente_especialidad.especialidad_id_especialidad=especialidad.id_especialidad
        JOIN docente on docente_especialidad.docente_id_docente = docente.id_docente 
        WHERE id_docente={$idDocente}; ";
        $database=new Mysql();
        $datos=$database->consultar($sql);

        $especialidad=new Especialidad();
        $listadoEspecialidades= [];
        while ($registro = $datos->fetch_assoc()){
            $especialidad->_idEspecialidad=$registro['id_especialidad'];
            $especialidad->_descripcion=$registro['especialidad_descripcion'];
            #$especialidad->_estado=$registro['estado_id_estado'];
            $listadoEspecialidades[]=$especialidad;
        }
        return $listadoEspecialidades;
}


}


?>