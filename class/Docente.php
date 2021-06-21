<?php

require_once "Mysql.php";
require_once "Persona.php";
require_once "Especialidad.php";

class Docente extends Persona{

    private $_idDocente;
    private $_numMatricula;
    private $_arrEspecialidad;


    /**
     * Get the value of _idDocente
     */ 
    public function getIdDocente()
    {
        return $this->_idDocente;
    }

    /**
     * Set the value of _idDocente
     *
     * @return  self
     */ 
    public function setIdDocente($_idDocente)
    {
        $this->_idDocente = $_idDocente;

        return $this;
    }

    /**
     * Get the value of _numMatricula
     */ 
    public function getNumMatricula()
    {
        return $this->_numMatricula;
    }

    /**
     * Set the value of _numMatricula
     *
     * @return  self
     */ 
    public function setNumMatricula($_numMatricula)
    {
        $this->_numMatricula = $_numMatricula;

        return $this;
    }

    static private function crear_docente($docente,$registro) {
        $docente->_idDocente= $registro['id_docente'];
        $docente->_idPersona= $registro['id_persona'];
        $docente->_nombre= $registro['persona_nombre'];
        $docente->_apellido= $registro['persona_apellido'];
        $docente->_fechaNacimiento= $registro['persona_fecha_nac'];
        $docente->_dni= $registro['persona_dni'];
        $docente->_nacionalidad= $registro['persona_nacionalidad'];
        $docente->_numMatricula= $registro['docente_num_matricula'];
        $docente->_idSexo= $registro['sexo_id_sexo'];
        $docente->_estado= $registro['estado_id_estado'];
        $docente->_arrEspecialidad=Especialidad::listarPorDocente($docente->_idDocente);

        return $docente;

    }
    public static function listadoDocente(){
        $sql = "SELECT docente.id_docente, docente.docente_num_matricula,
        persona.id_persona,persona.persona_fecha_nac, persona.persona_nombre,
        persona.persona_apellido,persona.persona_nacionalidad,persona.persona_dni,sexo_id_sexo,persona.estado_id_estado FROM docente 
        JOIN persona on persona.id_persona=docente.persona_id_persona";

    $db = new MySql();
    $datos = $db->consultar($sql);

    $listadoDocente = [];

    while ($registro = $datos->fetch_assoc()){
        if($registro['estado_id_estado']==1){
            $docente=new Docente();
            $docente->crear_docente($docente,$registro);

            $listadoDocente[]=$docente;
    }}

    return $listadoDocente;

    }

    public static function obtenerTodoPorId($id){
        $sql = "SELECT docente.id_docente, docente.docente_num_matricula,
        persona.id_persona,persona.persona_fecha_nac, persona.persona_nombre,
        persona.persona_apellido,persona.persona_nacionalidad,persona.persona_dni,sexo_id_sexo, persona.estado_id_estado FROM docente 
        JOIN persona on persona.id_persona=docente.persona_id_persona WHERE id_docente={$id}";

        $db = new MySql();
        $datos = $db->consultar($sql);

        while ($registro = $datos->fetch_assoc()){

        $docente=new Docente();
        $docente->crear_docente($docente,$registro);

        }

        return $docente;


    }

    public function insertDocente(){
        parent::insertPersona();

        $sql = "INSERT INTO `docente` (`persona_id_persona`, `docente_num_matricula`) VALUES ('{$this->_idPersona}', '{$this->_numMatricula}');";

        $database= new Mysql();

        $database->insertarRegistro($sql);


    }

    public function actualizarDocente(){

        parent::actualizarPersona();

        $database = new MySql();
        $sql = "UPDATE `docente` SET `docente_num_matricula` = '{$this->_numMatricula}' WHERE (`id_docente` = '{$this->_idDocente}');";

        $database->actualizar($sql);


    }

}

?>