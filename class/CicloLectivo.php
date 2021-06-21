<?php

require_once "../../class/MySql.php";
require_once "../../class/Carrera.php";

class cicloLectivo{
    private $_idCicloLectivo;
    private $_anio;

    private $_arrCarrera;


    
    /**
     * Get the value of _idCicloLectivo
     */ 
    public function getIdCicloLectivo()
    {
        return $this->_idCicloLectivo;
    }

    /**
     * Set the value of _idCicloLectivo
     *
     * @return  self
     */ 
    public function setIdCicloLectivo($_idCicloLectivo)
    {
        $this->_idCicloLectivo = $_idCicloLectivo;

        return $this;
    }


    /**
     * Get the value of _anio
     */ 
    public function getAnio()
    {
        return $this->_anio;
    }

    /**
     * Set the value of _anio
     *
     * @return  self
     */ 
    public function setAnio($_anio)
    {
        $this->_anio = $_anio;

        return $this;
    }

    

    public function crearCicloLectivo($cicloLectivo,$registro){
        $cicloLectivo->_idCicloLectivo= $registro['id_ciclo_lectivo'];
        $cicloLectivo->_anio= $registro['ciclo_lectivo_anio'];
        $cicloLectivo->_arrCarrera= Carrera::listadoCarrerasPorCicloLectivo($cicloLectivo->_idCicloLectivo);
        return $cicloLectivo;
    }

    
    
    public function insert(){
        $sql = "INSERT INTO `ciclo_lectivo` (`ciclo_lectivo_anio`) VALUES ('$this->_anio')";
        $database=new Mysql();

        $database->insertarRegistro($sql);
        
    }

    public static function listaTodos(){
        $sql=" SELECT id_ciclo_lectivo, ciclo_lectivo_anio, estado FROM ciclo_lectivo";
        $database=new Mysql();
        $datos=$database->consultar($sql);
        $listadoCicloLectivo=[];
        
        while ($registro = $datos->fetch_assoc()){
            if($registro['estado']==1){

            $cicloLectivo=new cicloLectivo();
            $cicloLectivo->crearCicloLectivo($cicloLectivo,$registro);

            $listadoCicloLectivo[]=$cicloLectivo;
            }
            
        }

        return $listadoCicloLectivo;

    }

    public static function darDeBaja($idCicloLectivo){
        $sql = "UPDATE `ciclo_lectivo` SET `estado` = '2' WHERE (`id_ciclo_lectivo` = '$idCicloLectivo')";

        $database= new MySql();
        $datos = $database->eliminarRegistro($sql);

    }

    public static function obtenerTodoPorId($id){
        $sql = "SELECT id_ciclo_lectivo,ciclo_lectivo_anio from ciclo_lectivo WHERE id_ciclo_lectivo={$id};";

        $db = new MySql();
        $datos = $db->consultar($sql);

        while ($registro = $datos->fetch_assoc()){

        $cicloLectivo=new cicloLectivo();
        $cicloLectivo->crearCicloLectivo($cicloLectivo,$registro);

        }

        return $cicloLectivo;


    }

    public function actualizarCicloLectivo(){

        $database = new MySql();
        $sql = "UPDATE `ciclo_lectivo` SET `ciclo_lectivo_anio` = '{$this->_anio}'WHERE (`id_ciclo_lectivo` = '{$this->_idCicloLectivo}')";

        $database->actualizar($sql);


    }
}

?>