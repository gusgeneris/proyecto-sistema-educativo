<?php

require_once "Mysql.php";
require_once "Persona.php";

class Alumno extends Persona{
    private $_idAlumno;
    private $_numLegajo;

    /**
     * Get the value of _idAlumno
     */ 
    public function getIdAlumno()
    {
        return $this->_idAlumno;
    }

    /**
     * Set the value of _idAlumno
     *
     * @return  self
     */ 
    public function setIdAlumno($_idAlumno)
    {
        $this->_idAlumno = $_idAlumno;

        return $this;
    }

    /**
     * Get the value of _numeroLegajo
     */ 
    public function getNumLegajo()
    {
        return $this->_numLegajo;
    }

    /**
     * Set the value of _numeroLegajo
     *
     * @return  self
     */ 
    public function setNumeroLegajo($_numLegajo)
    {
        $this->_numLegajo = $_numLegajo;

        return $this;
    }
    static private function crear_alumno($alumno,$registro) {
        $alumno->_idAlumno= $registro['id_alumno'];
        $alumno->_idPersona= $registro['id_persona'];
        $alumno->_nombre= $registro['persona_nombre'];
        $alumno->_apellido= $registro['persona_apellido'];
        $alumno->_fechaNacimiento= $registro['persona_fecha_nac'];
        $alumno->_dni= $registro['persona_dni'];
        $alumno->_nacionalidad= $registro['persona_nacionalidad'];
        $alumno->_numLegajo= $registro['alumno_num_legajo'];
        $alumno->_idSexo= $registro['sexo_id_sexo'];

        return $alumno;

    }

    public static function listadoAlumnos(){
        $sql = "SELECT alumno.id_alumno,alumno.alumno_num_legajo,
        persona.id_persona,persona.persona_fecha_nac, persona.persona_nombre,
        persona.persona_apellido,persona.persona_nacionalidad,persona.persona_dni,sexo_id_sexo,persona.estado_id_estado FROM alumno 
        JOIN persona on persona.id_persona=alumno.persona_id_persona";

    $db = new MySql();
    $datos = $db->consultar($sql);

    $listadoAlumnos = [];

    while ($registro = $datos->fetch_assoc()){
        if($registro['estado_id_estado']==1){
            $alumno=new Alumno();
            $alumno->crear_alumno($alumno,$registro);

            $listadoAlumnos[]=$alumno;
    }}

    return $listadoAlumnos;

    }

    public static function obtenerTodoPorId($id){
        $sql = "SELECT alumno.id_alumno,alumno.alumno_num_legajo,
        persona.id_persona,persona.persona_fecha_nac, persona.persona_nombre,
        persona.persona_apellido,persona.persona_nacionalidad,persona.persona_dni,sexo_id_sexo FROM alumno 
        JOIN persona on persona.id_persona=alumno.persona_id_persona WHERE id_alumno={$id}";

        $db = new MySql();
        $datos = $db->consultar($sql);

        while ($registro = $datos->fetch_assoc()){

        $alumno=new Alumno();
        $alumno->crear_alumno($alumno,$registro);

        $listadoAlumnos[]=$alumno;
        }

        return $listadoAlumnos;

    }

    public function insertAlumno(){
        parent::insertPersona();

        $sql = "INSERT INTO `alumno` (`persona_id_persona`, `alumno_num_legajo`) VALUES ('{$this->_idPersona}', '{$this->_numLegajo}');";

        $database= new Mysql();

        $database->insertarRegistro($sql);


    }

    public function actualizarAlumno(){

        parent::actualizarPersona();

        $database = new MySql();
        $sql = "UPDATE `alumno` SET `alumno_num_legajo` = '{$this->_numLegajo}' WHERE (`id_alumno` = '{$this->_idAlumno}');";

        $database->actualizar($sql);


    }

    public static function eliminarPorId($idAlumno){
        $sql="SELECT persona_id_persona FROM alumno WHERE id_alumno={$idAlumno}";
        $db = new MySql();
        $id=$db->consultar($sql);
      
    }
}


?>