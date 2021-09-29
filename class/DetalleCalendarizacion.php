<?php
require_once "MySql.php";
Class DetalleCalendarizacion{
    private $_idDetalleCalendarizacion;
    private $_numeroClase;
    private $_fechaClase;
    private $_actividad;
    private $_contenidoPriorizado;
    
    private $_idCalendarizacion;

    
    /**
     * Get the value of _idDetalleCalendarizacion
     */ 
    public function getIdDetalleCalendarizacion()
    {
        return $this->_idDetalleCalendarizacion;
    }

    /**
     * Set the value of _idDetalleCalendarizacion
     *
     * @return  self
     */ 
    public function setIdDetalleCalendarizacion($_idDetalleCalendarizacion)
    {
        $this->_idDetalleCalendarizacion = $_idDetalleCalendarizacion;

        return $this;
    }


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
     * Get the value of _numeroClase
     */ 
    public function getNumeroClase()
    {
        return $this->_numeroClase;
    }

    /**
     * Set the value of _numeroClase
     *
     * @return  self
     */ 
    public function setNumeroClase($_numeroClase)
    {
        $this->_numeroClase = $_numeroClase;

        return $this;
    }

    /**
     * Get the value of _fechaClase
     */ 
    public function getFechaClase()
    {
        return $this->_fechaClase;
    }

    /**
     * Set the value of _fechaClase
     *
     * @return  self
     */ 
    public function setFechaClase($_fechaClase)
    {
        $this->_fechaClase = $_fechaClase;

        return $this;
    }

    /**
     * Get the value of _actividad
     */ 
    public function getActividad()
    {
        return $this->_actividad;
    }

    /**
     * Set the value of _actividad
     *
     * @return  self
     */ 
    public function setActividad($_actividad)
    {
        $this->_actividad = $_actividad;

        return $this;
    }

    /**
     * Get the value of _contenidoPriorizado
     */ 
    public function getContenidoPriorizado()
    {
        return $this->_contenidoPriorizado;
    }

    /**
     * Set the value of _contenidoPriorizado
     *
     * @return  self
     */ 
    public function setContenidoPriorizado($_contenidoPriorizado)
    {
        $this->_contenidoPriorizado = $_contenidoPriorizado;

        return $this;
    }

    public function crearDetalle($detalle,$registro){
        $detalle->_idDetalleCalendarizacion= $registro['id_detalle_calendarizacion'];
        $detalle->_numeroClase= $registro['detalle_numero_clase'];
        $detalle->_fechaClase= $registro['detalle_fecha_clase'];
        $detalle->_actividad= $registro['detalle_actividad'];
        $detalle->_contenidoPriorizado= $registro['detalle_contenido_priorizado'];
        $detalle->_idCalendarizacion= $registro['calendarizacion_id_calendarizacion'];

        return $detalle;


    }
    
    static public function listado($idCurriculaCarrera){

        $sql="SELECT id_detalle_calendarizacion ,detalle_numero_clase, detalle_fecha_clase, detalle_actividad, detalle_contenido_priorizado, calendarizacion_id_calendarizacion from detalle_calendarizacion  
        join calendarizacion on id_calendarizacion = calendarizacion_id_calendarizacion
        join curricula_carrera on id_curricula_carrera = curricula_carrera_id_curricula_carrera
        where curricula_carrera_id_curricula_carrera = {$idCurriculaCarrera}";
      
        $db = new MySql();
        $datos = $db->consultar($sql);

        $listadoDetalle = [];

         while ($registro = $datos->fetch_assoc()){
            #if($registro['estado_id_estado']==1){
                $detalle=new DetalleCalendarizacion();
                $detalle->crearDetalle ($detalle,$registro);

                $listadoDetalle[]=$detalle;
            #}
        }
    return $listadoDetalle;
    }

    public function insert(){

        $sql="INSERT INTO `detalle_calendarizacion` (`detalle_actividad`, `detalle_contenido_priorizado`, `calendarizacion_id_calendarizacion`, `detalle_numero_clase`, `detalle_fecha_clase`) VALUES ('{$this->_actividad}', '{$this->_contenidoPriorizado}', '{$this->_idCalendarizacion}', '{$this->_numeroClase}', '{$this->_fechaClase}');
        ";
       
        $database=new Mysql();
        $database->insertarRegistro($sql);
        
    }

    static public function eliminarRegistro($IdDetalleCalendarizacion) {
		$sql = "DELETE FROM detalle_calendarizacion WHERE id_detalle_calendarizacion={$IdDetalleCalendarizacion}";

        $database = new MySQL();
        $database->eliminarRegistro($sql);
	}

    static public function listadoPorIdDetalle($idDetalleCalendarizacion){
        $sql="SELECT * FROM detalle_calendarizacion WHERE id_detalle_calendarizacion={$idDetalleCalendarizacion}";
        $db = new MySql();
        $dato=$db->consultar($sql);

        $registro=$dato->fetch_assoc();
        $detalle=new DetalleCalendarizacion();
        $detalle->_idDetalleCalendarizacion= $registro['id_detalle_calendarizacion'];
        $detalle->_idCalendarizacion= $registro['calendarizacion_id_calendarizacion'];
        $detalle->_numeroClase= $registro['detalle_numero_clase'];
        $detalle->_fechaClase= $registro['detalle_fecha_clase'];
        $detalle->_actividad= $registro['detalle_actividad'];
        $detalle->_contenidoPriorizado= $registro['detalle_contenido_priorizado'];


        return $detalle;
    }
    
    public function actualizarDetalleCalendarizacion(){

        $database = new MySql();
        $sql = "UPDATE `detalle_calendarizacion` SET `detalle_actividad` = '{$this->_actividad}',`detalle_contenido_priorizado` = '{$this->_contenidoPriorizado}', `detalle_numero_clase` ='{$this->_numeroClase}', `detalle_fecha_clase` = '{$this->_fechaClase}' WHERE (`id_detalle_calendarizacion` = '{$this->_idDetalleCalendarizacion}');";
        
        $database->actualizar($sql);


    }
}


?>