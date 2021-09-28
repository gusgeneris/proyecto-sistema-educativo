<?php
Class DetalleCalendarizacion{
    private $_idDetalleCalendarizacion;
    private $_numeroClase;
    private $_fechaClase;
    private $_actividad;
    private $_contenidoPriorizado;
    
    private $_idCalendarizacion;

    


    /**
     * Get the value of _idCalendarizacion
     */ 
    public function get_idCalendarizacion()
    {
        return $this->_idCalendarizacion;
    }

    /**
     * Set the value of _idCalendarizacion
     *
     * @return  self
     */ 
    public function set_idCalendarizacion($_idCalendarizacion)
    {
        $this->_idCalendarizacion = $_idCalendarizacion;

        return $this;
    }


    /**
     * Get the value of _numeroClase
     */ 
    public function get_numeroClase()
    {
        return $this->_numeroClase;
    }

    /**
     * Set the value of _numeroClase
     *
     * @return  self
     */ 
    public function set_numeroClase($_numeroClase)
    {
        $this->_numeroClase = $_numeroClase;

        return $this;
    }

    /**
     * Get the value of _fechaClase
     */ 
    public function get_fechaClase()
    {
        return $this->_fechaClase;
    }

    /**
     * Set the value of _fechaClase
     *
     * @return  self
     */ 
    public function set_fechaClase($_fechaClase)
    {
        $this->_fechaClase = $_fechaClase;

        return $this;
    }

    /**
     * Get the value of _actividad
     */ 
    public function get_actividad()
    {
        return $this->_actividad;
    }

    /**
     * Set the value of _actividad
     *
     * @return  self
     */ 
    public function set_actividad($_actividad)
    {
        $this->_actividad = $_actividad;

        return $this;
    }

    /**
     * Get the value of _contenidoPriorizado
     */ 
    public function get_contenidoPriorizado()
    {
        return $this->_contenidoPriorizado;
    }

    /**
     * Set the value of _contenidoPriorizado
     *
     * @return  self
     */ 
    public function set_contenidoPriorizado($_contenidoPriorizado)
    {
        $this->_contenidoPriorizado = $_contenidoPriorizado;

        return $this;
    }

    public function crearDetalle($detalle,$registro){
        $detalle->_iddetalle= $registro['id_detalle_calendarizacion'];
        $detalle->_numeroClase= $registro['detalle_numero_clase'];
        $detalle->_fechaClase= $registro['detalle_fecha_clase'];
        $detalle->_actividad= $registro['detalle_actividad'];
        $detalle->_contenidoPriorizado= $registro['detalle_contenido_priorizado'];

        return $detalle;


    }
    
    static public function listado($idCurriculaCarrera){

        $sql="SELECT id_detalle_calendarizacion ,detalle_numero_clase, detalle_fecha_clase, detalle_actividad, detalle_contenido_priorizado from detalle_calendarizacion  
        join calendarizacion on id_calendarizacion = calendarizacion_id_calendarizacion
        join curricula_carrera on id_curricula_carrera = curricula_carrera_id_curricula_carrera
        where curricula_carrera_id_curricula_carrera = {$idCurriculaCarrera}";

        $db = new MySql();
        $datos = $db->consultar($sql);

        $listadoDetalle = [];

         while ($registro = $datos->fetch_assoc()){
            if($registro['estado_id_estado']==1){
                $detalle=new DetalleCalendarizacion();
                $detalle->crearDetalle ($detalle,$registro);

                $listadoDetalle[]=$detalle;
            }
        }

    return $listadoDetalle;



    }
}


?>