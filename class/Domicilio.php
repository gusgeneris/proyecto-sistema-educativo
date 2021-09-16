<?php

require_once "Mysql.php";

class Domicilio{
    private $_idDomicilio;
    private $_detalle;
    private $_idBarrio;
    private $_idPersona;


    /**
     * Get the value of _idDomicilio
     */ 
    public function getIdDomicilio()
    {
        return $this->_idDomicilio;
    }

    /**
     * Set the value of _idDomicilio
     *
     * @return  self
     */ 
    public function setIdDomicilio($_idDomicilio)
    {
        $this->_idDomicilio = $_idDomicilio;

        return $this;
    }

    /**
     * Get the value of _detalle
     */ 
    public function getDetalle()
    {
        return $this->_detalle;
    }

    /**
     * Set the value of _detalle
     *
     * @return  self
     */ 
    public function setDetalle($_detalle)
    {
        $this->_detalle = $_detalle;

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

    /**
     * Get the value of _idPersona
     */ 
    public function getIdPersona()
    {
        return $this->_idPersona;
    }

    /**
     * Set the value of _idPersona
     *
     * @return  self
     */ 
    public function setIdPersona($_idPersona)
    {
        $this->_idPersona = $_idPersona;

        return $this;
    }



public function crearDomicilio($domicilio,$registro){
    $domicilio->_idDomicilio=$registro['id_domicilio'];
    $domicilio->_detalle=$registro['domicilio_detalle'];
    $domicilio->_idBarrio=$registro['barrio_id_barrio'];
    $domicilio->_idPersona=$registro['persona_id_persona'];
    return $domicilio;
}

static public function listadoPorIdPersona($idPersona){
    $sql= "SELECT * FROM domicilio WHERE persona_id_persona={$idPersona}";
    $database=new Mysql();
    $datos=$database->consultar($sql);

    $listadoDomicilios=[];

    while($registro= $datos->fetch_assoc()){

        $domicilio=new Domicilio();
        $domicilio->crearDomicilio($domicilio,$registro);

        $listadoDomicilios[]=$domicilio;
    }
    return $listadoDomicilios;
}

public function insertarDomicilio(){
    $sql="INSERT INTO domicilio (`domicilio_detalle`, `persona_id_persona`,barrio_id_barrio) VALUES ('{$this->_detalle}', '{$this->_idPersona}','{$this->_idBarrio}')";
    $database=new Mysql();
    $database->insertarRegistro($sql);

}

static public function obtenerPorId($idDomicilio){
    $sql="SELECT * FROM domicilio WHERE id_domicilio={$idDomicilio}";
    
    $database=new Mysql();
    $datos=$database->consultar($sql);
    
    $registro=$datos->fetch_assoc();
    $domicilio=new Domicilio();
    $domicilio->crearDomicilio($domicilio,$registro);
    return $domicilio;

}

public function modificarDomicilio(){
    $sql = "UPDATE `domicilio` SET `domicilio_detalle` = '{$this->_detalle}' WHERE (`id_domicilio` = '{$this->_idDomicilio}')";
    
    $database= new Mysql();
    $database->actualizar($sql);

}

static public function eliminarRegistro($idDomicilio){
    $sql="DELETE FROM `domicilio` WHERE (`id_domicilio` = '{$idDomicilio}')";

    $database=new Mysql();
    $database->eliminarRegistro($sql);

}


}


?>