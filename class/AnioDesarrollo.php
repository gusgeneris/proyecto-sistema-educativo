<?php
require_once "../../class/MySql.php";

class AnioDesarrollo{

    private $_idAnioDesarrollo;
    private $_detalleAnio;
    private $_estado;

        /**
     * Get the value of _idAnioDesarrollo
     */ 
    public function getIdAnioDesarrollo()
    {
        return $this->_idAnioDesarrollo;
    }

    /**
     * Set the value of _idAnioDesarrollo
     *
     * @return  self
     */ 
    public function setIdAnioDesarrollo($_idAnioDesarrollo)
    {
        $this->_idAnioDesarrollo = $_idAnioDesarrollo;

        return $this;
    }

    /**
     * Get the value of _detalleAnio
     */ 
    public function getDetalleAnio()
    {
        return $this->_detalleAnio;
    }

    /**
     * Set the value of _detalleAnio
     *
     * @return  self
     */ 
    public function setDetalleAnio($_detalleAnio)
    {
        $this->_detalleAnio = $_detalleAnio;

        return $this;
    }

  

    public function crearAnioDesarrollo($anioDesarrollo,$registro){
        $anioDesarrollo->_idAnioDesarrollo= $registro['id_anio_desarrollo'];
        $anioDesarrollo->_detalleAnio= $registro['detalle_anio'];
        $anioDesarrollo->_estado= $registro['estado'];
        return $anioDesarrollo;
    }

    
    
    public function insert(){
        $sql = "INSERT INTO `anio_desarrollo` (`detalle_anio`) VALUES ('{$this->_detalleAnio}')";

        
        $database=new Mysql();

        $database->insertarRegistro($sql);
    }

    public static function listaTodos(){
        $sql= "SELECT id_anio_desarrollo, detalle_anio, estado FROM anio_desarrollo";
        
        $database=new Mysql();
        $datos=$database->consultar($sql);
        $listadoAnioDesarrollo=[];
        
        while ($registro = $datos->fetch_assoc()){
            if($registro['estado']==1){

            $anioDesarrollo=new AnioDesarrollo();
            $anioDesarrollo->crearAnioDesarrollo($anioDesarrollo,$registro);

            $listadoAnioDesarrollo[]=$anioDesarrollo;
            }
            
        }

        return $listadoAnioDesarrollo;

    }

    public static function darDeBaja($idAnioDesarrollo){
        $sql = "UPDATE `anio_desarrollo` SET `estado` = '2' WHERE (`id_anio_desarrollo` = '$idAnioDesarrollo')";

        $database= new MySql();
        $datos = $database->eliminarRegistro($sql);

    }

    public static function obtenerTodoPorId($idAnioDesarrollo){
        $sql = "SELECT id_anio_desarrollo, detalle_anio, estado from anio_desarrollo WHERE id_anio_desarrollo={$idAnioDesarrollo};";
        $db = new MySql();
        $datos = $db->consultar($sql);

        while ($registro = $datos->fetch_assoc()){

        $anioDesarrollo=new AnioDesarrollo();
        $anioDesarrollo->crearAnioDesarrollo($anioDesarrollo,$registro);

        }

        return $anioDesarrollo;


    }


    public function actualizarAnioDesarrollo(){
        $sql = "UPDATE `anio_desarrollo` SET `detalle_anio` = '{$this->_detalleAnio}' WHERE (`id_anio_desarrollo` = '{$this->_idAnioDesarrollo}')";
        
        $database = new MySql();
        $database->actualizar($sql);

        
    }



}

 

?>