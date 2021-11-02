<?php
require_once "MySql.php";

Class LibroTemas{

    private $_idLibroTemas;
    private $_idCurriculaCarrera;


    /**
     * Get the value of _idLibroTemas
     */ 
    public function getIdLibroTemas()
    {
        return $this->_idLibroTemas;
    }

    /**
     * Set the value of _idLibroTemas
     *
     * @return  self
     */ 
    public function setIdLibroTemas($_idLibroTemas)
    {
        $this->_idLibroTemas = $_idLibroTemas;

        return $this;
    }

    /**
     * Get the value of _idCurriculaCarrera
     */ 
    public function getIdCurriculaCarrera()
    {
        return $this->_idCurriculaCarrera;
    }

    /**
     * Set the value of _idCurriculaCarrera
     *
     * @return  self
     */ 
    public function setIdCurriculaCarrera($_idCurriculaCarrera)
    {
        $this->_idCurriculaCarrera = $_idCurriculaCarrera;

        return $this;
    }



    public static function comprobarExistencia($idCurricula){
        $sql="SELECT id_libro_temas from libro_temas join curricula_carrera on id_curricula_carrera=curricula_carrera_id_curricula_carrera where id_curricula_carrera = {$idCurricula}";

        $database=new Mysql();
        $dato=$database->consultar($sql);
        $registro=$dato->fetch_assoc();

        if($dato->num_rows == 0){
            return 0;
        }else{
            return 1;
        }
    }

    public function insert(){

        $sql="INSERT INTO `sistema_educativo`.`libro_temas` (`curricula_carrera_id_curricula_carrera`) VALUES ({$this->_idCurriculaCarrera})";

       
        $database=new Mysql();
        $database->insertarRegistro($sql);
        
    }

    static public function obtenerIdLibroTemas($idCurricula){
        $sql="SELECT id_libro_temas from libro_temas join curricula_carrera on id_curricula_carrera=curricula_carrera_id_curricula_carrera where id_curricula_carrera = {$idCurricula}";

        $database=new Mysql();
        $dato=$database->consultar($sql);
        $registro=$dato->fetch_assoc();
        $id=$registro['id_libro_temas'];
        
        return $id;
    }

}
?>