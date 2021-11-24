<?php
require_once "Mysql.php";

class Especialidad{

    private $_idEspecialidad;
    private $_descripcion;
    private $_estado;

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

    /**
     * Get the value of _estado
     */ 
    public function getEstado()
    {
    return $this->_estado;
    }

    /**
     * Set the value of _estado
     *
     * @return  self
     */ 
    public function setEstado($_estado)
    {
    $this->_estado = $_estado;

    return $this;
    }

    public function crearEspecialidad($especialidad,$registro){
        $especialidad->_idEspecialidad= $registro['id_especialidad'];
        $especialidad->_descripcion= $registro['especialidad_descripcion'];
        $especialidad->_estado= $registro['estado'];
        return $especialidad;
    }



    public function insert(){
        $sql = "INSERT INTO `especialidad` (`especialidad_descripcion`) VALUES ('$this->_descripcion')";
        $database=new Mysql();

        $idEspecialidad=$database->insertarRegistro($sql);
        $this->_idEspecialidad=$idEspecialidad;
    }

    public function eliminarTodaRelacion($idDocente){
        $sql="DELETE FROM docente_especialidad WHERE docente_id_docente={$idDocente}";

        $database=new Mysql();
        $database->eliminarRegistro($sql);

    }

    public function crearRelacionconDocente($idDocente){


        $sql="INSERT INTO `docente_especialidad` (`especialidad_id_especialidad`, `docente_id_docente`) VALUES ({$this->_idEspecialidad}, {$idDocente});
        ";
        $database=new Mysql();
        $database->insertarRegistro($sql);

    }

    public static function listaTodos(){
        $sql=" SELECT id_especialidad, especialidad_descripcion,estado FROM especialidad";
        $database=new Mysql();
        $datos=$database->consultar($sql);
        $listadoEspecialidad=[];
        
        while ($registro = $datos->fetch_assoc()){

            $especialidad=new Especialidad();
            $especialidad->crearEspecialidad($especialidad,$registro);

            $listadoEspecialidad[]=$especialidad;
            
            
        }

        return $listadoEspecialidad;

    }

    public static function listaTodosActivos(){
        $sql=" SELECT id_especialidad, especialidad_descripcion,estado FROM especialidad";
        $database=new Mysql();
        $datos=$database->consultar($sql);
        $listadoEspecialidad=[];
        
        while ($registro = $datos->fetch_assoc()){
            if($registro['estado']==1){

            $especialidad=new Especialidad();
            $especialidad->crearEspecialidad($especialidad,$registro);

            $listadoEspecialidad[]=$especialidad;
            }
            
        }

        return $listadoEspecialidad;

    }

    public static function darDeBaja($idEspecialidad){
        $sql = "UPDATE `especialidad` SET `estado` = '2' WHERE (`id_especialidad` = '$idEspecialidad')";

        $database= new MySql();
        $datos = $database->actualizar($sql);
    }

    public static function darAlta($idEspecialidad){
        $sql = "UPDATE `especialidad` SET `estado` = '1' WHERE (`id_especialidad` = '$idEspecialidad')";

        $database= new MySql();
        $datos = $database->actualizar($sql);
        return true;
    }

    public static function obtenerPorId($id){
        $sql = "SELECT estado,id_especialidad,especialidad_descripcion from especialidad WHERE id_especialidad={$id};";

        $db = new MySql();
        $datos = $db->consultar($sql);
        $registro=$datos->fetch_assoc();

        $especialidad=new Especialidad();
        $especialidad->crearEspecialidad($especialidad,$registro);

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

            $listadoEspecialidades= [];
            while ($registro = $datos->fetch_assoc()){  
                $especialidad=new Especialidad();
                $especialidad->_idEspecialidad=$registro['id_especialidad'];
                $especialidad->_descripcion=$registro['especialidad_descripcion'];
                #$especialidad->_estado=$registro['estado_id_estado'];
                $listadoEspecialidades[]=$especialidad;
            }
            return $listadoEspecialidades;
    }

    public static function eliminarRelacionDocente($idEspecialidad,$idDocente){
        $sqlId="SELECT id_docente_especialidad FROM docente_especialidad WHERE docente_id_docente={$idDocente} AND especialidad_id_especialidad={$idEspecialidad};";

        $database=new Mysql();
        $dato=$database->consultar($sqlId);
        $registro=$dato->fetch_assoc();
        $idDocenteEspecialidad=$registro["id_docente_especialidad"];

        $sql="DELETE FROM `docente_especialidad` WHERE (`id_docente_especialidad` = {$idDocenteEspecialidad});";

        $database->eliminarRegistro($sql);

    }




}


?>