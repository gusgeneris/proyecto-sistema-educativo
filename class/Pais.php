<?php

require_once "Mysql.php";

class Pais{
    private $_idPais;
    private $_nombre;


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

    public function crearPais($pais,$registro){
        $pais->_idPais = $registro['id_pais'];
        $pais->_nombre = $registro['pais_nombre'];
        return $pais;
    }

    static public function listado(){
        $sql="SELECT * FROM pais";
        
        $database=new Mysql();
        $datos=$database->consultar($sql);
    
        $listadoPais=[];

        while($registro= $datos->fetch_assoc()){
    
            $pais=new Pais();
            $pais->crearPais($pais,$registro);
    
            $listadoPais[]=$pais;
        }
        return $listadoPais;
    }

    public function insertarPais(){

        $sql="INSERT INTO `pais` (`pais_nombre`) VALUES ('$this->_nombre');";

        $database=new Mysql();
        $database->insertarRegistro($sql);
        
    }

    static function eliminarPais($idPais){
        $sql="DELETE FROM `pais` WHERE (`id_pais` = {$idPais});";

        $database=new Mysql();
        $database->eliminarRegistro($sql);

    }

    static public function obtenerPorIdPais($idPais){
        $sql="SELECT * FROM pais WHERE id_pais={$idPais}";
        
        $database=new Mysql();
        $datos=$database->consultar($sql);
        
        $registro=$datos->fetch_assoc();
        $pais=new pais();
        $pais->crearpais($pais,$registro);

        return $pais;

    }

    public function modificarPais(){
        $sql = "UPDATE `pais` SET `pais_nombre` = '{$this->_nombre}' WHERE (`id_pais` = '{$this->_idPais}')";
        
        $database= new Mysql();
        $database->actualizar($sql);
    
    }


}


?>