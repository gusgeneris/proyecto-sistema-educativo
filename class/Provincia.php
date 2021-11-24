<?php

require_once "Mysql.php";

class Provincia{
    private $_idProvincia;
    private $_nombre;
    private $_idPais;
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
    public function setIdProvincia($_idProvincia)
    {
        $this->_idProvincia = $_idProvincia;

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
     * Get the value of _idPais
     */ 
    public function getIdPais()
    {
        return $this->_idPais;
    }

    /**
     * Set the value of _idPais
     *
     * @return  self
     */ 
    public function setIdPais($_idPais)
    {
        $this->_idPais = $_idPais;

        return $this;
    }


    public function crearProvincia($provincia,$registro){
        $provincia->_idProvincia = $registro['id_provincia'];
        $provincia->_nombre = $registro['provincia_nombre'];
        $provincia->_idPais = $registro['pais_id_pais'];
        $provincia->_estado = $registro['provincia_estado'];
        return $provincia;

    }

    static public function listado(){
        $sql="SELECT* FROM provincia";
        $database=new Mysql();
        $datos=$database->consultar($sql);
    
        $listadoProvincias=[];

        while($registro= $datos->fetch_assoc()){
    
            $provincia=new Provincia();
            $provincia->crearProvincia($provincia,$registro);
    
            $listadoProvincia[]=$provincia;
        }
        return $listadoProvincias;
    }

    static public function listadoPorPais($idPais){
        $sql="SELECT * FROM provincia WHERE pais_id_pais={$idPais}";
        
        $database=new Mysql();
        $datos=$database->consultar($sql);
    
        $listadoProvincias=[];

        while($registro= $datos->fetch_assoc()){
               
            $provincia=new Provincia();
            $provincia->crearProvincia($provincia,$registro);    
            $listadoProvincias[]=$provincia;
        }
        return $listadoProvincias;
    }

    public function insertarProvincia(){

        $sql="INSERT INTO `provincia` (`provincia_nombre`, `pais_id_pais`) VALUES ('{$this->_nombre}', '{$this->_idPais}')";

        $database=new Mysql();
        $database->insertarRegistro($sql);
        
    }

    public function insertarProvinciaPorPais(){

        $sql="INSERT INTO `provincia` (`provincia_nombre`) VALUES ('{$this->_nombre}');";

        $database=new Mysql();
        $database->insertarRegistro($sql);
        
    }

    static function eliminarProvincia($idProvincia){
        $sql="UPDATE `provincia` SET provincia_estado = '2' WHERE  (`id_provincia` = {$idProvincia});";

        $database=new Mysql();
        $database->eliminarRegistro($sql);

    }

    public static function darAlta($idProvincia){
        $sql="UPDATE `provincia` SET `provincia_estado` = '1' WHERE (`id_provincia` = {$idProvincia})";

        $database=new Mysql();
        $database->actualizar($sql);
        return true;
    }

    static public function obtenerPorIdProvincia($idProvincia){
        $sql="SELECT * FROM provincia WHERE id_provincia={$idProvincia}";
        
        $database=new Mysql();
        $datos=$database->consultar($sql);
        
        $registro=$datos->fetch_assoc();
        $provincia=new Provincia();
        $provincia->crearProvincia($provincia,$registro);

        return $provincia;

    }

    public function modificarProvincia(){
        $sql = "UPDATE `provincia` SET `provincia_nombre` = '{$this->_nombre}' WHERE (`id_provincia` = '{$this->_idProvincia}')";
        $database= new Mysql();
        $database->actualizar($sql);
    
    }

}
?> 
