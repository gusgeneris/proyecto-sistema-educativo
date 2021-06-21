<?php
require_once "Mysql.php";
require_once "EjeContenido.php";

Class Materia{
    private $_idMateria;
    private $_nombre;
    private $_estado;
    private $_arrEjeContenido;

        /**
     * Get the value of _idMateria
     */ 
    public function getIdMateria()
    {
        return $this->_idMateria;
    }

    /**
     * Set the value of _idMateria
     *
     * @return  self
     */ 
    public function setIdMateria($_idMateria)
    {
        $this->_idMateria = $_idMateria;

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


    private function crearMateria($registro,$materia){
        $materia->setIdMateria($registro['id_materia']);
        $materia->setNombre($registro['materia_nombre']);
        $materia->_arrEjeContenido=EjeContenido::obtenerTodoPorId(1);

        return $materia;
    }
    
    public function insert(){

        $sql = "INSERT INTO `materia` (`materia_nombre`) VALUES ('{$this->_nombre}');";
        $database= new Mysql();
        $idMateria=$database->insertarRegistro($sql);
        $this->_idMateria=$idMateria;

    }

    public function crearRelacionConCarrera($idCarrera){
        $sql="INSERT INTO `curricula_carrera` (`materia_id_materia`, `carrera_id_carrera`) VALUES ({$this->_idMateria}, {$idCarrera})";
        $database= new Mysql();
        $database->insertarRegistro($sql);

    }

    public static function listadoMaterias(){
        $sql= "SELECT id_materia,materia_nombre, estado_id_estado FROM materia";
        $database= new Mysql();
        $datos = $database->consultar($sql);

        $listadoMaterias=[];
        
        while ($registro = $datos->fetch_assoc()){
            if ($registro['estado_id_estado']==1){
                $materia=new Materia();
                $materia->crearMateria($registro,$materia);

                $listadoMaterias[]=$materia;}
        }
        return $listadoMaterias;
    }

    public static function listadoPorId($idMateria){
        $sql="SELECT id_materia, materia_nombre FROM materia WHERE id_materia= {$idMateria};";
        $database=new Mysql();
        $datos=$database->consultar($sql);
        
        $materia=new Materia();
        $registro=$datos->fetch_assoc();
        $materia->crearMateria($registro,$materia);
        return $materia;
    }

    public static function darDeBaja($idMateria){
        $sql="UPDATE `materia` SET `estado_id_estado` = '2' WHERE (`id_materia` = '{$idMateria}');";
        $database=new Mysql();
        $database->actualizar($sql);
    }

    public function modificar(){
        $sql="UPDATE `materia` SET `materia_nombre` = '{$this->_nombre}' WHERE (`id_materia` = '{$this->_idMateria}');";

        $database=new Mysql();
        $database->actualizar($sql);
    }
    public static function listadoPorIdCarrera($idCarrera){
        $sql="SELECT id_materia, materia_nombre, materia.estado_id_estado from materia 
        JOIN curricula_carrera on curricula_carrera.materia_id_materia=materia.id_materia
        JOIN carrera on curricula_carrera.carrera_id_carrera = carrera.id_carrera 
        WHERE id_carrera={$idCarrera}; ";
        $database=new Mysql();
        $datos=$database->consultar($sql);

        $listadoMaterias= [];
        while ($registro = $datos->fetch_assoc()){
            $materia=new Materia();
            $materia->_idMateria=$registro['id_materia'];
            $materia->_nombre=$registro['materia_nombre'];
            $materia->_estado=$registro['estado_id_estado'];
            $materia->_arrEjeContenido=EjeContenido::obtenerPorIdMateria($materia->_idMateria,$idCarrera);
            $listadoMaterias[]=$materia;
        }
        return $listadoMaterias;
    }

    










}

?>

