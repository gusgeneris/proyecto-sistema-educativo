<?php

require_once "Mysql.php";
require_once "DetalleCalendarizacion.php";

Class Calendarizacion{
    private $_idCalendarizacion;
    private $_idCurriculaCarreraCiclo;


    /**
     * Get the value of _idCalendarizacion
     */ 
    public function getIdCalendarizacion()
    {
        return $this->_idCalendarizacion;
    }

    /**
     * Set the value of _idCalendarizacion
     *
     * @return  self
     */ 
    public function setIdCalendarizacion($_idCalendarizacion)
    {
        $this->_idCalendarizacion = $_idCalendarizacion;

        return $this;
    }

    /**
     * Get the value of _idCurriculaCarreraCiclo
     */ 
    public function getIdCurriculaCarreraCiclo()
    {
        return $this->_idCurriculaCarreraCiclo;
    }

    /**
     * Set the value of _idCurriculaCarreraCiclo
     *
     * @return  self
     */ 

    public function crearCalendarizacion($calendarizacion,$registro){
        $calendarizacion->_idcalendarizacion = $registro['id_calendarizacion'];
        $calendarizacion->_idCurriculaCarreraCiclo = $registro['localidad_id_localidad'];
        return $calendarizacion;
    }


    public function setIdCurriculaCarreraCiclo($_idCurriculaCarreraCiclo)
    {
        $this->_idCurriculaCarreraCiclo = $_idCurriculaCarreraCiclo;

        return $this;
    }

    static public function existenciaRelacion($idCurricula){
        $sql="SELECT id_calendarizacion from calendarizacion join curricula_carrera on id_curricula_carrera=curricula_carrera_id_curricula_carrera where id_curricula_carrera = {$idCurricula}";

        $database=new Mysql();
        $dato=$database->consultar($sql);
        $registro=$dato->fetch_assoc();

        if($dato->num_rows == 0){
            return 0;
        }else{
            return 1;
        }
    }

    public function insert(){

        $sql="INSERT INTO `sistema_educativo`.`calendarizacion` (`curricula_carrera_id_curricula_carrera`) VALUES ({$this->_idCurriculaCarreraCiclo})";
       
        $database=new Mysql();
        $idCalendarizacion=$database->insertarRegistro($sql);
        return $idCalendarizacion;
        
    }

    static public function obtenerIdCalendarizacion($idCurricula){
        $sql="SELECT id_calendarizacion from calendarizacion join curricula_carrera on id_curricula_carrera=curricula_carrera_id_curricula_carrera where id_curricula_carrera = {$idCurricula}";

        $database=new Mysql();
        $dato=$database->consultar($sql);
        $registro=$dato->fetch_assoc();
        $id=$registro['id_calendarizacion'];
        
        return $id;
    }



}


?>