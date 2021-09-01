<?php

class Barrio{
    private $_idBarrio;
    private $_nombre;
    private $_idLocalidad;

    


    /**
     * Get the value of _idLocalidad
     */ 
    public function getIdLocalidad()
    {
        return $this->_idLocalidad;
    }

    /**
     * Set the value of _idLocalidad
     *
     * @return  self
     */ 
    public function setIdLocalidad($_idLocalidad)
    {
        $this->_idLocalidad = $_idLocalidad;

        return $this;
    }

    /**
     * Get the value of _nombre
     */ 
    public function getNombre()
    {
        return $this->_nombre;
    }

    /**
     * Set the value of _nombre
     *
     * @return  self
     */ 
    public function setNombre($_nombre)
    {
        $this->_nombre = $_nombre;

        return $this;
    }

    /**
     * Get the value of _idBarrio
     */ 
    public function getIdBarrio()
    {
        return $this->_idBarrio;
    }

    /**
     * Set the value of _idBarrio
     *
     * @return  self
     */ 
    public function setIdBarrio($_idBarrio)
    {
        $this->_idBarrio = $_idBarrio;

        return $this;
    }

    public function crearBarrio($barrio,$registro){
        $barrio->_idBarrio = $registro['id_barrio'];
        $barrio->_nombre = $registro['barrio_nombre'];
        $barrio->idLocalidad = $registro['id_localidad'];
        return $barrio;
    }

}

?>