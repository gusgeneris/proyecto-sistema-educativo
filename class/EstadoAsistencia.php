<?php
require_once 'MySql.php';

class EstadoAsistencia{
    protected $_idEstadoAsistencia;
    protected $_descripcion;


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

    }

    /**
     * Get the value of _idEstadoAsistencia
     */ 
    public function getIdEstadoAsistencia()
    {
        return $this->_idEstadoAsistencia;
    }

    /**
     * Set the value of _idEstadoAsistencia
     *
     * @return  self
     */ 
    public function setIdEstadoAsistencia($_idEstadoAsistencia)
    {
        $this->_idEstadoAsistencia = $_idEstadoAsistencia;

    }

    
    public static function descripcionEstadoAsistencia($idClase,$idAlumno){
        $sql="SELECT estado_asistencia_detalle from estado_asistencia ".
        "join asistencia on id_estado_asistencia = estado_asistencia_id_estado_asistencia ".
        "join clase on id_clase = clase_id_clase ".
        "where id_clase = {$idClase} and alumno_id_alumno={$idAlumno}";


        $dataBase= new Mysql();
        $dato=$dataBase->consultar($sql);
        $registro = $dato->fetch_assoc();
        $estadoAsistencia= new EstadoAsistencia();
        $estadoAsistencia->setDescripcion($registro['estado_asistencia_detalle']);
        
        return $estadoAsistencia;

    }

}

   
    





?>