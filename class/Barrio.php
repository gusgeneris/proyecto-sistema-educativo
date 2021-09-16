<?php

require_once "Mysql.php";

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
        $barrio->_idLocalidad = $registro['localidad_id_localidad'];
        return $barrio;
    }

    static public function listado(){
        $sql="SELECT* FROM barrio";
        $database=new Mysql();
        $datos=$database->consultar($sql);
    
        $listadoBarrios=[];

        while($registro= $datos->fetch_assoc()){
    
            $barrio=new Barrio();
            $barrio->crearBarrio($barrio,$registro);
    
            $listadoBarrios[]=$barrio;
        }
        return $listadoBarrios;
    }

    static public function listadoPorLocalidad($idLocalidad){
        $sql="SELECT * FROM barrio WHERE localidad_id_localidad={$idLocalidad}";

        
        $database=new Mysql();
        $datos=$database->consultar($sql);
    
        $listadoBarrrios=[];

        while($registro= $datos->fetch_assoc()){
               
            $barrio=new barrio();
            $barrio->crearbarrio($barrio,$registro);    
            $listadoBarrrios[]=$barrio;
        }
        return $listadoBarrrios;
    }
    
    static public function obtenerBarrioPorIdLocalidad($idLocalidad){
        $sql="SELECT * FROM barrio WHERE localidad_id_localidad={$idLocalidad}";

        
        $database=new Mysql();
        $datos=$database->consultar($sql);

        while($registro= $datos->fetch_assoc()){
               
            $barrio=new barrio();
            $barrio->crearbarrio($barrio,$registro);  
        }
        return $barrio;
    }



    public function insertarBarrio(){

        $sql="INSERT INTO `barrio` (`barrio_nombre`, `localidad_id_localidad`) VALUES ('{$this->_nombre}', '{$this->_idLocalidad}')";
       
        $database=new Mysql();
        $database->insertarRegistro($sql);
        
    }

    static function eliminarBarrio($idbarrio){
        $sql="DELETE FROM `barrio` WHERE (`id_barrio` = {$idbarrio});";

        $database=new Mysql();
        $database->eliminarRegistro($sql);

    }

    static public function obtenerPorIdBarrio($idBarrio){
        $sql="SELECT * FROM barrio WHERE id_barrio={$idBarrio}";
        
        $database=new Mysql();
        $datos=$database->consultar($sql);
        
        $registro=$datos->fetch_assoc();
        $barrio=new barrio();
        $barrio->crearbarrio($barrio,$registro);

        return $barrio;

    }


    public function modificarBarrio(){
        $sql = "UPDATE `barrio` SET `barrio_nombre` = '{$this->_nombre}' WHERE (`id_barrio` = '{$this->_idBarrio}')";
 
        $database= new Mysql();
        $database->actualizar($sql);
    
    }



}

?>