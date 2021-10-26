<?php
require_once "MySql.php";

Class Clase{

    private $_idClase;
    private $_numeroClase;
    private $_fechaClase;
    private $_tipoClase;  
    private $_idCurrriculaCarrera; 


    /**
     * Get the value of _idClase
     */ 
    public function getIdClase()
    {
        return $this->_idClase;
    }

    /**
     * Set the value of _idClase
     *
     * @return  self
     */ 
    public function setIdClase($_idClase)
    {
        $this->_idClase = $_idClase;

        return $this;
    }

    /**
     * Get the value of _numeroClase
     */ 
    public function getNumeroClase()
    {
        return $this->_numeroClase;
    }

    /**
     * Set the value of _numeroClase
     *
     * @return  self
     */ 
    public function setNumeroClase($_numeroClase)
    {
        $this->_numeroClase = $_numeroClase;

        return $this;
    }

    /**
     * Get the value of _fechaClase
     */ 
    public function getFechaClase()
    {
        return $this->_fechaClase;
    }

    /**
     * Set the value of _fechaClase
     *
     * @return  self
     */ 
    public function setFechaClase($_fechaClase)
    {
        $this->_fechaClase = $_fechaClase;

        return $this;
    }
    
    /**
     * Get the value of _tipoClase
     */ 
    public function getTipoClase()
    {
        return $this->_tipoClase;
    }

    /**
     * Set the value of _tipoClase
     *
     * @return  self
     */ 
    public function setTipoClase($_tipoClase)
    {
        $this->_tipoClase = $_tipoClase;

        return $this;
    }

    private function crearClase($clase,$registro){
        $clase->setIdClase($registro['id_clase']);
        $clase->setNumeroClase($registro['clase_numero']);
        $clase->setFechaClase($registro['clase_fecha']);
        $clase->setTipoClase($registro['tipo_detalle']);
    }

    public function insert($idCurriculaCarrera){
        $sql="INSERT INTO `clase` (`clase_numero`, `clase_fecha`, `tipo_clase_id_tipo_clase`,`curricula_carrera_id_curricula_carrera`) VALUES ('{$this->_numeroClase}', '{$this->_fechaClase}', '{$this->_tipoClase}','{$idCurriculaCarrera}');";
        
        $dataBase=new MySql();
        $idClase=$dataBase->insertarRegistro($sql);
        $this->_idClase = $idClase;
        
        
    }

    public static function numeroClase($id_ciclo_lectivo,$id_carrera,$id_materia){
        $sql="SELECT max(clase_numero) as clase_maxima FROM clase ".
        "join curricula_carrera on curricula_carrera_id_curricula_carrera = id_curricula_carrera ".
        "join ciclo_lectivo_carrera on id_ciclo_lectivo_carrera=ciclo_lectivo_carrera_id_ciclo_lectivo_carrera ".
        "join carrera on id_carrera = carrera_id_carrera ".
        "join ciclo_lectivo on id_ciclo_lectivo = ciclo_lectivo_id_ciclo_lectivo ".
        "join materia on id_materia=materia_id_materia ".
        "where id_ciclo_lectivo={$id_ciclo_lectivo} and id_carrera={$id_carrera} and id_materia={$id_materia}; ";

        

        $database=new MySql();
        $dato=$database->consultar($sql);
        $registro=$dato->fetch_assoc();
        $numeroClase=$registro['clase_maxima'];
        $claseMaxima=$numeroClase+'1';
        return $claseMaxima;
    }

    public static function mostrarPorId($idClase){
        $sql="SELECT id_clase, clase_numero, clase_fecha, tipo_detalle FROM clase JOIN tipo_clase on id_tipo_clase=tipo_clase_id_tipo_clase WHERE id_clase={$idClase};";
        
        $dataBase=new MySql();
        $dato=$dataBase->consultar($sql);
        $registro=$dato->fetch_assoc();
        $clase=new Clase;
        $clase->crearClase($clase,$registro);

        return $clase;
    }
    
    public static function obtenerIdCurriculaCarreraPorIdClase($idClase){
        $sql="SELECT id_curricula_carrera FROM clase ".
            "JOIN curricula_carrera on id_curricula_carrera=curricula_carrera_id_curricula_carrera ".
            "where id_clase= {$idClase}";
       

        $dataBase=new MySql();
        $dato=$dataBase->consultar($sql);
        $registro=$dato->fetch_assoc();
        $idCurriculaCarrera=$registro['id_curricula_carrera'];
        
        return $idCurriculaCarrera;
    }

    public static function listadoPorIdCurriculaCarrera($idCurriculaCarrera){
        $sql= "SELECT id_clase, clase_numero, clase_fecha,tipo_detalle from clase ".
            "join tipo_clase on id_tipo_clase=tipo_clase_id_tipo_clase ". 
            "where curricula_carrera_id_curricula_carrera= {$idCurriculaCarrera}";
            
            
        $dataBase=new MySql();
        $datos=$dataBase->consultar($sql);

        $listadoClases=[];

        while ($registro = $datos->fetch_assoc()){
            $clase= new Clase();
            $clase->crearClase($clase,$registro);
            $listadoClases[]=$clase;
        }

        return $listadoClases;
    }

    public static function detalleNumeroFechaClase($idClase) {
        $sql="SELECT clase_numero,clase_fecha from clase where id_clase= {$idClase}";

        $database=new MySql();
        $dato=$database->consultar($sql);
        $registro=$dato->fetch_assoc();

        $clase= new Clase;
        $clase->setNumeroClase($registro['clase_numero']);
        $clase->setFechaClase($registro['clase_fecha']);

        return $clase;

    }

}
?>