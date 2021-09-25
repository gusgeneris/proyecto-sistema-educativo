<?php
Class Calendarizacion{
    private $_idCalendarizacion;
    private $_idCurriculaCarreraCiclo;
    private $_numeroClase;
    private $_fechaClase;
    private $_actividad;
    private $_contenidoPriorizado;

    


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
     * Get the value of _idCurriculaCarreraCiclo
     */ 
    public function get_idCurriculaCarreraCiclo()
    {
        return $this->_idCurriculaCarreraCiclo;
    }

    /**
     * Set the value of _idCurriculaCarreraCiclo
     *
     * @return  self
     */ 
    public function set_idCurriculaCarreraCiclo($_idCurriculaCarreraCiclo)
    {
        $this->_idCurriculaCarreraCiclo = $_idCurriculaCarreraCiclo;

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
}


?>