<?php

require_once "Mysql.php";

class Localidad{
    private $_idLocalidad;
    private $_nombre;
    private $_idProvincia;
    private $_estado;

    /**
     * Get the value of _idPais
     */ 
    public function getEstado()
    {
        return $this->_estado;
    }

    /**
     * Set the value of _idPais
     *
     * @return  self
     */ 
    public function setEstado($_estado)
    {
        $this->_estado = $_estado;

        return $this;
    }



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
    public function setIdLocalidad($idLocalidad)
    {
        $this->_idLocalidad = $idLocalidad;

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
    public function setNombre($nombre)
    {
        $this->_nombre = $nombre;

        return $this;
    }

        /**
     * Get the value of _idProvincia
     */ 
    public function getIdProvincia()
    {
        return $this->_idProvincia;
    }

    /**
     * Set the value of _idProvincia
     *
     * @return  self
     */ 
    public function setIdProvincia($idProvincia)
    {
        $this->_idProvincia = $idProvincia;

        return $this;
    }


    public function crearLocalidad($localidad,$registro){
        $localidad->_idLocalidad = $registro['id_localidad'];
        $localidad->_nombre = $registro['localidad_nombre'];
        $localidad->_idProvincia = $registro['provincia_id_provincia'];
        $localidad->_estado = $registro['localidad_estado'];
        return $localidad;

    }

    static public function listado(){
        $sql="SELECT* FROM localidad";
        $database=new Mysql();
        $datos=$database->consultar($sql);
    
        $listadoLocalidades=[];

        while($registro= $datos->fetch_assoc()){
    
            $localidad=new Localidad();
            $localidad->crearLocalidad($localidad,$registro);
    
            $listadoLocalidad[]=$localidad;
        }
        return $listadoLocalidades;
    }

    static public function listadoPorProvincia($idProvincia){
        $sql="SELECT * FROM localidad WHERE provincia_id_provincia={$idProvincia}";

        
        $database=new Mysql();
        $datos=$database->consultar($sql);
    
        $listadoLocalidades=[];

        while($registro= $datos->fetch_assoc()){
               
            $localidad=new Localidad();
            $localidad->crearLocalidad($localidad,$registro);    
            $listadoLocalidades[]=$localidad;
        }
        return $listadoLocalidades;
    }

    public function insertarLocalidad(){

        $sql="INSERT INTO `Localidad` (`localidad_nombre`, `provincia_id_provincia`) VALUES ('{$this->_nombre}', '{$this->_idProvincia}')";

        $database=new Mysql();
        $database->insertarRegistro($sql);
        
    }

    public function insertarLocalidadPorPais(){

        $sql="INSERT INTO `localidad` (`localidad_nombre`) VALUES ('{$this->_nombre}');";

        $database=new Mysql();
        $database->insertarRegistro($sql);
        
    }

    static function eliminarLocalidad($idLocalidad){
        $sql="UPDATE `localidad` SET localidad_estado = '2' WHERE  (`id_localidad` = {$idLocalidad});";

        $database=new Mysql();
        $database->eliminarRegistro($sql);

    }

    public static function darAlta($idLocalidad){
        $sql="UPDATE `localidad` SET `localidad_estado` = '1' WHERE (`id_localidad` = {$idLocalidad})";

        $database=new Mysql();
        $database->actualizar($sql);
        return true;
    }

    static public function obtenerPorIdLocalidad($idLocalidad){
        $sql="SELECT * FROM localidad WHERE id_localidad={$idLocalidad}";
        
        $database=new Mysql();
        $datos=$database->consultar($sql);
        
        $registro=$datos->fetch_assoc();
        $localidad=new Localidad();
        $localidad->crearLocalidad($localidad,$registro);

        return $localidad;

    }

    public function modificarLocalidad(){
        $sql = "UPDATE `localidad` SET `localidad_nombre` = '{$this->_nombre}' WHERE (`id_localidad` = '{$this->_idLocalidad}')";

        $database= new Mysql();
        $database->actualizar($sql);
    
    }

}
?> 