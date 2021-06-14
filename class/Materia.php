<?php
require_once "Mysql.php";

Class Materia{
    private $_idMateria;
    private $_nombre;
    private $_estado;

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
        return $materia;

    }
    public function insert(){

        $sql = "INSERT INTO `sistema_educativo`.`materia` (`materia_nombre`) VALUES ('{$this->nombre}');";
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








}

?>

