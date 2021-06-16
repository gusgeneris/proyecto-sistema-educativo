<?php
require_once "Mysql.php";
require_once "Materia.php";

Class Carrera{
    private $_idCarrera;
    private $_nombre;
    private $_duracionAnios;
    private $_estado;
    private $_arrMateria;
    

    /**
     * Get the value of _idCarrera
     */ 
    public function getIdCarrera()
    {
        return $this->_idCarrera;
    }

    /**
     * Set the value of _idCarrera
     *
     * @return  self
     */ 
    public function setIdCarrera($_idCarrera)
    {
        $this->_idCarrera = $_idCarrera;

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
     * Get the value of _duracionAnios
     */ 
    public function getDuracionAnios()
    {
        return $this->_duracionAnios;
    }

    /**
     * Set the value of _duracionAnios
     *
     * @return  self
     */ 
    public function setDuracionAnios($_duracionAnios)
    {
        $this->_duracionAnios = $_duracionAnios;

        return $this;
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

    public function insert(){

        $sql="INSERT INTO `carrera` ( `carrera_nombre`, `carrera_duracion_anios`) VALUES ( '{$this->_nombre}', '{$this->_duracionAnios}');";
        $database=new Mysql();
        $database->insertarRegistro($sql);

    }

    public function listadoCarreras(){

        $sql="SELECT id_carrera, carrera_nombre, carrera_duracion_anios, estado_id_estado FROM carrera;";
        $database=new Mysql();
        $datos=$database->consultar($sql);
        $listadoCarreras=[];
        
        while ($registro = $datos->fetch_assoc()){
            if ($registro['estado_id_estado']==1){
                $carrera=new Carrera();
                $carrera->crearCarrera($registro,$carrera);

                $listadoCarreras[]=$carrera;}
        }
        return $listadoCarreras;
        
    }

    public static function listadoPorId($idCarrera){
        $sql="SELECT id_carrera, carrera_nombre, carrera_duracion_anios, estado_id_estado FROM carrera WHERE id_carrera= {$idCarrera};";
        $database=new Mysql();
        $datos=$database->consultar($sql);

        $carrera=new Carrera();
        $registro=$datos->fetch_assoc();
        $carrera->crearCarrera($registro,$carrera);
        return $carrera;
    }

    public function modificar(){
        $sql="UPDATE `carrera` SET `carrera_nombre` = '{$this->_nombre}', `carrera_duracion_anios` = '{$this->_duracionAnios}' WHERE (`id_carrera` = '{$this->_idCarrera}');";

        $database=new Mysql();
        $database->actualizar($sql);
    }

    public static function darDeBaja($idCarrera){
        $sql="UPDATE `carrera` SET `estado_id_estado` = '2' WHERE (`id_carrera` = '{$idCarrera}');";
        $database=new Mysql();
        $database->actualizar($sql);
    }

    private function crearCarrera($registro,$carrera){
        
        $carrera->setIdCarrera($registro['id_carrera']);
        $carrera->setNombre($registro['carrera_nombre']);
        $carrera->setDuracionAnios($registro['carrera_duracion_anios']);
        $carrera->setEstado($registro['estado_id_estado']);
        $carrera->_arrMateria = Materia:: listadoPorIdCarrera($carrera->_idCarrera);
    
        return $carrera;

    }

}

?>