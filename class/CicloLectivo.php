<?php

require_once "../../class/MySql.php";
require_once "../../class/Carrera.php";

class cicloLectivo{
    private $_idCicloLectivo;
    private $_anio;
    private $_estado;

    private $_arrCarrera;

    public function __toString() {
        return "{$this->_anio}";
    }

        /**
     * Get the value of _estado
     */ 
    public function getEstado()
    {
        return $this->_estado;
    }

    /**
     * Set the value of _estado
     *
     * @return  self
     */ 
    public function setEstado($_estado)
    {
        $this->_estado = $_estado;

        return $this;
    }

    
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
        $sql = "INSERT INTO `ciclo_lectivo` (`ciclo_lectivo_anio`) VALUES ('{$this->_anio}')";


        $database=new Mysql();

        $database->insertarRegistro($sql);
    }

    public static function listaTodos($filtroEstado=0,$filtroAnio=""){
        $sql= "SELECT id_ciclo_lectivo, ciclo_lectivo_anio, estado FROM ciclo_lectivo";

        
        
        $where="";

        if($filtroEstado!=0){
            $where.=" WHERE estado='$filtroEstado' ";
        };

        if($filtroAnio != ""){
            if($where!= ""){
                $where.=" AND ciclo_lectivo_anio like '%{$filtroAnio}%'";
            }else{
                $where= " WHERE ciclo_lectivo_anio like '%{$filtroAnio}%'";
            }
        }
        $sql.=$where;
        
        $database=new Mysql();
        $datos=$database->consultar($sql);
        $listadoCicloLectivo=[];
        
        while ($registro = $datos->fetch_assoc()){
            #if($registro['estado']==1){

            $cicloLectivo=new cicloLectivo();
            $cicloLectivo->crearCicloLectivo($cicloLectivo,$registro);
            $cicloLectivo->_estado= $registro['estado'];

            $listadoCicloLectivo[]=$cicloLectivo;
            
            
        }

        return $listadoCicloLectivo;

    }

    public static function darAlta($idCiclo){
        $sql="UPDATE `ciclo_lectivo` SET `estado` = '1' WHERE (`id_ciclo_lectivo` = {$idCiclo})";

        $database=new Mysql();
        $database->actualizar($sql);
        return true;
    }

    public static function darDeBaja($idCicloLectivo){
        $sql = "UPDATE `ciclo_lectivo` SET `estado` = '2' WHERE (`id_ciclo_lectivo` = '$idCicloLectivo')";

        $database= new MySql();
        $datos = $database->eliminarRegistro($sql);

    }

    public static function obtenerTodoPorId($idCicloLectivo){
        $sql = "SELECT id_ciclo_lectivo,ciclo_lectivo_anio from ciclo_lectivo WHERE id_ciclo_lectivo={$idCicloLectivo};";
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
        $sql = "UPDATE `ciclo_lectivo` SET `ciclo_lectivo_anio` = '{$this->_anio}' WHERE (`id_ciclo_lectivo` = '{$this->_idCicloLectivo}')";

        $database->actualizar($sql);


    }

    public static function obtenerIdCicloPorAnio($anio){
        $sql="SELECT id_ciclo_lectivo from ciclo_lectivo where ciclo_lectivo_anio='$anio'";
        
        $dataBase=new MySql();
        $dato=$dataBase->consultar($sql);
        $registro = $dato->fetch_assoc();
        $idCiclo=$registro["id_ciclo_lectivo"];
        
        return $idCiclo;
    }

    public static function obtenerIdCicloLectivoCarrera($idCicloLectivo,$idCarrera){
        $sql="SELECT id_ciclo_lectivo_carrera FROM ciclo_lectivo_carrera WHERE ciclo_lectivo_id_ciclo_lectivo={$idCicloLectivo} AND carrera_id_carrera={$idCarrera} ;";
        
        $database= new Mysql();
        $dato=$database->consultar($sql);
        
        $registro=$dato->fetch_assoc();

        $idCicloLectivoCarrera=$registro["id_ciclo_lectivo_carrera"];

        return $idCicloLectivoCarrera;
    }

    public static function obtenerIdCicloLectivoCarreraPorCurricula($idCurriculaCarrera){
        $sql="SELECT id_ciclo_lectivo_carrera from ciclo_lectivo_carrera ".
        "join curricula_carrera on id_ciclo_lectivo_carrera = ciclo_lectivo_carrera_id_ciclo_lectivo_carrera ".
        "where id_curricula_carrera ={$idCurriculaCarrera}";
        
        $database= new Mysql();
        $dato=$database->consultar($sql);
        
        $registro=$dato->fetch_assoc();

        $idCicloLectivoCarrera=$registro["id_ciclo_lectivo_carrera"];

        return $idCicloLectivoCarrera;
    }



}

?>