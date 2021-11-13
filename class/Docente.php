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
    public static function listadoDocente($filtroEstado=0,$filtroApellido=""){
        $sql = "SELECT estado_id_estado,docente.id_docente, docente.docente_num_matricula,
        persona.id_persona,persona.persona_fecha_nac, persona.persona_nombre,
        persona.persona_apellido,persona.persona_nacionalidad,persona.persona_dni,sexo_id_sexo,persona.estado_id_estado FROM docente 
        JOIN persona on persona.id_persona=docente.persona_id_persona";

        $where="";

        if($filtroEstado!=0){
            $where.=" WHERE estado_id_estado='$filtroEstado' ";
        };

        if($filtroApellido != ""){
            if($where!= ""){
                $where.=" AND persona_apellido like '%{$filtroApellido}%'";
            }else{
                $where= " WHERE persona_apellido like '%{$filtroApellido}%'";
            }
        }
        $sql.=$where;

        $db = new MySql();
        $datos = $db->consultar($sql);

        $listadoDocente = [];

        while ($registro = $datos->fetch_assoc()){
            #if($registro['estado_id_estado']==1){
                $docente=new Docente();
                $docente->crear_docente($docente,$registro);

                $listadoDocente[]=$docente;
        }

        return $listadoDocente;

    }

    public static function darAlta($idPersona){
        $sql="UPDATE `persona` SET `estado_id_estado` = '1' WHERE (`id_persona` = {$idPersona})";

        $database=new Mysql();
        $database->actualizar($sql);
        return true;
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

        return ;


    }


    public function actualizarDocente(){

        parent::actualizarPersona();

        $database = new MySql();
        $sql = "UPDATE `docente` SET `docente_num_matricula` = '{$this->_numMatricula}' WHERE (`id_docente` = '{$this->_idDocente}');";

        $database->actualizar($sql);


    }

    public static function listadoPorDocenteMateria($idCicloLectivoCarrera,$idMateria){

        $sql="SELECT id_curricula_carrera from curricula_carrera where materia_id_materia={$idMateria} and ciclo_lectivo_carrera_id_ciclo_lectivo_carrera={$idCicloLectivoCarrera};";

        $db = new MySql();
        $dato = $db->consultar($sql);

        $registro=$dato->fetch_assoc();

        $idCurriculaCarrera=$registro["id_curricula_carrera"];


        $sql="SELECT docente.id_docente, docente.docente_num_matricula,
        persona.id_persona,persona.persona_fecha_nac, persona.persona_nombre,
        persona.persona_apellido,persona.persona_nacionalidad,persona.persona_dni,sexo_id_sexo,persona.estado_id_estado,docente_materia.docente_materia_estado, docente_carrera.docente_carrera_estado FROM docente JOIN persona ON persona.id_persona=docente.persona_id_persona JOIN docente_materia ON docente_materia.docente_id_docente=docente.id_docente JOIN curricula_carrera ON docente_materia.curricula_carrera_id_curricula_carrera=id_curricula_carrera JOIN docente_carrera ON docente_carrera.docente_id_docente=docente.id_docente JOIN ciclo_lectivo_carrera ON ciclo_lectivo_carrera.id_ciclo_lectivo_carrera=docente_carrera.ciclo_lectivo_carrera_id_ciclo_lectivo_carrera WHERE curricula_carrera_id_curricula_carrera={$idCurriculaCarrera} AND ciclo_lectivo_carrera.id_ciclo_lectivo_carrera={$idCicloLectivoCarrera}";

        $db = new MySql();
        $datos = $db->consultar($sql);
    
        $listadoDocente = [];
    
        while ($registro = $datos->fetch_assoc()){
            #if($registro['docente_materia_estado']==1 & $registro['docente_carrera_estado']==1  ){
                $docente=new Docente();
                $docente->crear_docente($docente,$registro);
    
                $listadoDocente[]=$docente;
        }#}
    
        return $listadoDocente;
    

    }

    public function asignarCarrera($idDocente,$idCicloLectivoCarrera){
        $consultaExistencia= "SELECT * FROM docente_carrera WHERE docente_id_docente={$idDocente} AND ciclo_lectivo_carrera_id_ciclo_lectivo_carrera={$idCicloLectivoCarrera}";
        
        $database =new Mysql();
        $dato=$database->consultar($consultaExistencia);

        if (($dato->num_rows)==0){
            $sql="INSERT INTO `docente_carrera` (`docente_id_docente`, `ciclo_lectivo_carrera_id_ciclo_lectivo_carrera`) VALUES ({$idDocente}, {$idCicloLectivoCarrera});";
            $datos=$database->insertarRegistro($sql);
        } else{
            return 1;
        }

        
    }

    public function asignarMateria($idDocente,$idCurriculaCarrera){

        $consultaExistencia= "SELECT * FROM docente_materia WHERE docente_id_docente={$idDocente} AND curricula_carrera_id_curricula_carrera={$idCurriculaCarrera}";
        
        $database =new Mysql();
        $dato=$database->consultar($consultaExistencia);
        
        if (($dato->num_rows)==0){
            $sql="INSERT INTO `docente_materia` (`docente_id_docente`, `curricula_carrera_id_curricula_carrera`) VALUES ({$idDocente}, {$idCurriculaCarrera})";
            
            $database->insertarRegistro($sql);
        }else{
            return 1;
        }
        

    }

    public static function eliminarRelacionDocenteMateria($idDocente,$idCurriculaCarrera){
        $sqlId="SELECT id_docente_materia FROM docente_materia WHERE docente_id_docente={$idDocente} AND curricula_carrera_id_curricula_carrera={$idCurriculaCarrera}";

        $database =new Mysql();
        $dato=$database->consultar($sqlId);
        $registro=$dato->fetch_assoc();
        $idDocenteMateria=$registro["id_docente_materia"];

        $sql="UPDATE docente_materia SET `docente_materia_estado` = '2' WHERE (`id_docente_materia` = {$idDocenteMateria})";
        $database->eliminarRegistro($sql);
    }

    public static function eliminarRelacionDocenteCarrera($idDocente,$idCicloLectivoCarrera){
        $sqlId="SELECT id_docente_carrera FROM docente_carrera WHERE docente_id_docente={$idDocente} AND ciclo_lectivo_carrera_id_ciclo_lectivo_carrera={$idCicloLectivoCarrera}";

        $database =new Mysql();
        $dato=$database->consultar($sqlId);
        $registro=$dato->fetch_assoc();
        $idDocenteCarrera=$registro["id_docente_carrera"];
        $sql="UPDATE docente_carrera SET `docente_carrera_estado` = '2' WHERE (`id_docente_carrera` = {$idDocenteCarrera} )";
        $database->eliminarRegistro($sql);
    }

    public static function obtenerPorIdPersona($idPersona){
        $sql="SELECT id_docente from docente "
        ."join persona on id_persona = persona_id_persona "
        ."where id_persona={$idPersona};";
        

        $dataBase=new MySql();
        $dato=$dataBase->consultar($sql);
        $registro = $dato->fetch_assoc();
        $idDocente=$registro["id_docente"];
        
        return $idDocente;
    }

    public static function estadoDocenteCarrera($idDocente,$idCicloLectivoCarrera){
        $sql="SELECT docente_carrera_estado from docente_carrera where docente_id_docente={$idDocente} and ciclo_lectivo_carrera_id_ciclo_lectivo_carrera={$idCicloLectivoCarrera}";

        $dataBase=new MySql();
        $dato=$dataBase->consultar($sql);
        $registro = $dato->fetch_assoc();
        $estado=$registro["docente_carrera_estado"];
        
        return $estado;

    }
    
    public static function estadoDocenteMateria($idDocente,$idCurriculaCarrera){
        $sql="SELECT docente_materia_estado from docente_materia where docente_id_docente={$idDocente} and curricula_carrera_id_curricula_carrera={$idCurriculaCarrera}";

        $dataBase=new MySql();
        $dato=$dataBase->consultar($sql);
        $registro = $dato->fetch_assoc();
        $estado=$registro['docente_materia_estado'];
        
        return $estado;

    }

    public static function idDocenteCarrera($idDocente,$idCicloLectivoCarrera){
        $sql="SELECT id_docente_carrera from docente_carrera where docente_id_docente={$idDocente} and ciclo_lectivo_carrera_id_ciclo_lectivo_carrera={$idCicloLectivoCarrera}";


        $dataBase=new MySql();
        $dato=$dataBase->consultar($sql);
        $registro = $dato->fetch_assoc();
        $estado=$registro['id_docente_carrera'];
        
        return $estado;

    }
    public static function idDocenteMateria($idDocente,$idCurriculaCarrera){
        $sql="SELECT id_docente_materia from docente_materia where docente_id_docente={$idDocente} and curricula_carrera_id_curricula_carrera={$idCurriculaCarrera}";

        

        $dataBase=new MySql();
        $dato=$dataBase->consultar($sql);
        $registro = $dato->fetch_assoc();
        $estado=$registro['id_docente_materia'];
        
        return $estado;

    }

    
    public static function darAltaDocenteCarrera($idDocente,$idCicloLectivoCarrera){
        $sql="UPDATE `docente_carrera` SET `docente_carrera_estado` = '1' WHERE (`docente_id_docente` = {$idDocente}) and  (`ciclo_lectico_carrera_id_ciclo_lectivo_carrera` = {$idCicloLectivoCarrera})";

        

        $database=new Mysql();
        $database->actualizar($sql);
        return true;
    }

    public static function darAltaDocenteMateria($idDocente,$idCurriculaCarrera){
        $sql="UPDATE `docente_materia` SET `docente_materia_estado` = '1' WHERE (`docente_id_docente` = {$idDocente}) and  (`curricula_carrera_id_curricula_carrera` = {$idCurriculaCarrera})";

        $database=new Mysql();
        $database->actualizar($sql);
        return true;
    }

}

?>