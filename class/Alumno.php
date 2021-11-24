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


    static private function crearAlumno ($alumno,$registro) {
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

    public static function listadoAlumnos($filtroEstado=0,$filtroApellido=""){
        $sql = "SELECT estado_id_estado,alumno.id_alumno,alumno.alumno_num_legajo,
        persona.id_persona,persona.persona_fecha_nac, persona.persona_nombre,
        persona.persona_apellido,persona.persona_nacionalidad,persona.persona_dni,sexo_id_sexo,persona.estado_id_estado FROM alumno 
        JOIN persona on persona.id_persona=alumno.persona_id_persona";

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

        $listadoAlumnos = [];

        while ($registro = $datos->fetch_assoc()){
            #if($registro['estado_id_estado']==1){
                $alumno=new Alumno();
                $alumno->crearAlumno ($alumno,$registro);
                
                $alumno->_estado= $registro['estado_id_estado'];

                $listadoAlumnos[]=$alumno;
        }

        return $listadoAlumnos;

    }

    public static function listadoAlumnosActivos(){
        $sql = "SELECT estado_id_estado,alumno.id_alumno,alumno.alumno_num_legajo,
        persona.id_persona,persona.persona_fecha_nac, persona.persona_nombre,
        persona.persona_apellido,persona.persona_nacionalidad,persona.persona_dni,sexo_id_sexo,persona.estado_id_estado FROM alumno 
        JOIN persona on persona.id_persona=alumno.persona_id_persona";

        $db = new MySql();
        $datos = $db->consultar($sql);

        $listadoAlumnos = [];

        while ($registro = $datos->fetch_assoc()){
            if($registro['estado_id_estado']==1){
                $alumno=new Alumno();
                $alumno->crearAlumno ($alumno,$registro);
                
                $alumno->_estado= $registro['estado_id_estado'];

                $listadoAlumnos[]=$alumno;}
        }

        return $listadoAlumnos;

    }

    public static function darAlta($idPersona){
        $sql="UPDATE `persona` SET `estado_id_estado` = '1' WHERE (`id_persona` = {$idPersona})";

        $database=new Mysql();
        $database->actualizar($sql);
        return true;
    }

    public static function obtenerTodoPorId($id){
        $sql = "SELECT estado_id_estado,alumno.id_alumno,alumno.alumno_num_legajo,
        persona.id_persona,persona.persona_fecha_nac, persona.persona_nombre,
        persona.persona_apellido,persona.persona_nacionalidad,persona.persona_dni,sexo_id_sexo FROM alumno 
        JOIN persona on persona.id_persona=alumno.persona_id_persona WHERE id_alumno={$id}";
        
        $db = new MySql();
        $datos = $db->consultar($sql);

        while ($registro = $datos->fetch_assoc()){

        $alumno=new Alumno();
        $alumno->crearAlumno ($alumno,$registro);
        }

        return $alumno;

    }

    public function insertAlumno(){
        parent::insertPersona();

        $sql = "INSERT INTO `alumno` (`persona_id_persona`, `alumno_num_legajo`) VALUES ('{$this->_idPersona}', '{$this->_numLegajo}');";

        
        $database= new Mysql();

        $database->insertarRegistro($sql);
        
        return true;
    }

    static public function asignarCicloLectivoCarrera($idAlumno,$idCicloLectivoCarrera){
        $sql="SELECT * FROM ciclo_lectivo_carrera_alumno where alumno_id_alumno='{$idAlumno}' and ciclo_lectivo_carrera_id_ciclo_lectivo_carrera='{$idCicloLectivoCarrera}' ";

        $database= new Mysql();

        $dato=$database->consultar($sql);
        
        if($dato->num_rows==0){

            $sql="INSERT INTO `ciclo_lectivo_carrera_alumno` (`alumno_id_alumno`, `ciclo_lectivo_carrera_id_ciclo_lectivo_carrera`) VALUES ('{$idAlumno}','{$idCicloLectivoCarrera}')";
            
            $database= new Mysql();

            $database->insertarRegistro($sql);
            return 1;
        }
        else{
            return 0;
        }
    
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

    static public function eliminarRelacionCicloLectivoCarreraAlumno($idCicloLectivoCarreraAlumno){
        $sql="DELETE FROM `ciclo_lectivo_carrera_alumno` WHERE (`id_ciclo_lectivo_carrera_alumno` = '{$idCicloLectivoCarreraAlumno}')";
        $database = new Mysql();
        $database->eliminarRegistro($sql);
    
    }  
    
    
    static public function listadoAlumnosAsignados($idCicloLectivoCarrera){
        $sql="SELECT id_alumno,id_persona, persona_nombre, persona_apellido, persona_fecha_nac, persona_dni, persona_nacionalidad, alumno_num_legajo, sexo_id_sexo, persona.estado_id_estado 
        from persona join alumno on id_persona=persona_id_persona 
        join ciclo_lectivo_carrera_alumno on id_alumno = alumno_id_alumno 
        join ciclo_lectivo_carrera on id_ciclo_lectivo_carrera = ciclo_lectivo_carrera_id_ciclo_lectivo_carrera 
        where id_ciclo_lectivo_carrera={$idCicloLectivoCarrera}";

   
        
        $db = new MySql();
        $datos = $db->consultar($sql);

        $listadoAlumnos = [];

        while ($registro = $datos->fetch_assoc()){
            if($registro['estado_id_estado']==1){
                $alumno=new Alumno();
                $alumno->crearAlumno ($alumno,$registro);

                $listadoAlumnos[]=$alumno;
        }}

        return $listadoAlumnos;      
        
    }

    static public function eliminarTodaRelacionCicloLecticoCarrera($idCicloLectivoCarrera,$idAlumno){
        $sql="DELETE FROM `ciclo_lectivo_carrera_alumno` WHERE `ciclo_lectivo_carrera_id_ciclo_lectivo_carrera` = '{$idCicloLectivoCarrera}' and alumno_id_alumno='{$idAlumno}'";
        
        $database = new Mysql();
        $database->eliminarRegistro($sql);
    
    }

    public static function listadoPorIdCurriculaCarrera($idCicloLectivoCarrera,$idMateria){
        $sql="SELECT id_alumno, persona_nombre, persona_apellido, persona_dni from persona ". 
        "join alumno on id_persona = persona_id_persona ".
        "join alumno_materia on alumno_id_alumno= id_alumno ".
        "join curricula_carrera on id_curricula_carrera = curricula_carrera_id_curricula_carrera ".
        "join materia on id_materia=materia_id_materia ".
        "join ciclo_lectivo_carrera on curricula_carrera.ciclo_lectivo_carrera_id_ciclo_lectivo_carrera = id_ciclo_lectivo_carrera ".
        "where id_materia={$idMateria} and id_ciclo_lectivo_carrera={$idCicloLectivoCarrera};";

       

        $dataBase= new MySql();
        $datos= $dataBase->consultar($sql);

        $listadoAlumnos = [];

        while ($registro = $datos->fetch_assoc()){
            $alumno=new Alumno();
            $alumno->setIdAlumno($registro['id_alumno']);
            $alumno->setNombre($registro['persona_nombre']);
            $alumno->setApellido($registro['persona_apellido']);
            $alumno->setDni($registro['persona_dni']);

            $listadoAlumnos[]=$alumno;
        }
        return $listadoAlumnos;

    }  

    public static function listadoPorIdCurricula($idCurriculaCarrera){
        $sql="SELECT id_alumno, persona_nombre, persona_apellido, persona_dni from persona ". 
        "join alumno on id_persona = persona_id_persona ".
        "join alumno_materia on alumno_id_alumno= id_alumno ".
        "join curricula_carrera on id_curricula_carrera = curricula_carrera_id_curricula_carrera ".
        "join materia on id_materia=materia_id_materia ".
        "join ciclo_lectivo_carrera on curricula_carrera.ciclo_lectivo_carrera_id_ciclo_lectivo_carrera = id_ciclo_lectivo_carrera ".
        "where id_curricula_carrera={$idCurriculaCarrera};";

       

        $dataBase= new MySql();
        $datos= $dataBase->consultar($sql);

        $listadoAlumnos = [];

        while ($registro = $datos->fetch_assoc()){
            $alumno=new Alumno();
            $alumno->setIdAlumno($registro['id_alumno']);
            $alumno->setNombre($registro['persona_nombre']);
            $alumno->setApellido($registro['persona_apellido']);
            $alumno->setDni($registro['persona_dni']);

            $listadoAlumnos[]=$alumno;
        }
        return $listadoAlumnos;

    }  


    public static function listadoPorIdClase($idClase){
        $sql="SELECT id_alumno,estado_asistencia_detalle, persona_nombre, persona_apellido, persona_dni from asistencia ".
            "join alumno on id_alumno = alumno_id_alumno ".
            "join persona on id_persona = persona_id_persona ".
            "join clase on id_clase = clase_id_clase ".
            "join estado_asistencia on id_estado_asistencia = estado_asistencia_id_estado_asistencia ".
            "where id_clase={$idClase} order by persona_apellido;";
            

        $dataBase= new MySql();
        $datos= $dataBase->consultar($sql);

        $listadoAlumnos = [];

        while ($registro = $datos->fetch_assoc()){
            $alumno=new Alumno();
            $alumno->setIdAlumno($registro['id_alumno']);
            $alumno->setNombre($registro['persona_nombre']);
            $alumno->setApellido($registro['persona_apellido']);
            $alumno->setDni($registro['persona_dni']);
            $listadoAlumnos[]=$alumno;
        }
        return $listadoAlumnos;
        
    }

    
    public static function obtenerGroupSexo(){
        $sql="SELECT sexo_descripcion,count(sexo_descripcion) as cantidad from sexo ".
            "join persona on id_sexo = sexo_id_sexo ".
            "join alumno on id_persona=persona_id_persona ".
            "group by sexo_descripcion;";

        $dataBase=new MySql();

        $datos=$dataBase->consultar($sql);

        $listadoSexoPersonas=[];

        while($registro= $datos->fetch_assoc()){
            $sexoDescipcion=$registro['sexo_descripcion'];
            $cantidad= $registro['cantidad'];
            array_push($listadoSexoPersonas,array($sexoDescipcion,$cantidad));
        }
        return $listadoSexoPersonas;

    }

    public static function cantidadTotalAlumnos(){
        $sql="SELECT count(id_alumno) as cantidad from alumno;";

        $dataBase=new MySql();

        $dato=$dataBase->consultar($sql);

        $registro= $dato->fetch_assoc();
            $cantidad= $registro['cantidad'];
        
        return $cantidad;

    }

    public static function cantidadAlumnoPorCarrera(){
        $anio=date("Y");

        $sql="SELECT carrera_nombre, count(id_alumno) as cantidad from ciclo_lectivo_carrera ".
            "join ciclo_lectivo_carrera_alumno on id_ciclo_lectivo_carrera =ciclo_lectivo_carrera_id_ciclo_lectivo_carrera ".
            "join ciclo_lectivo on id_ciclo_lectivo =ciclo_lectivo_id_ciclo_lectivo ".
            "join carrera on id_carrera = carrera_id_carrera ".
            "join alumno on id_alumno=alumno_id_alumno where ciclo_lectivo_anio=$anio group by carrera_nombre ";

        $dataBase=new MySql();

        $datos=$dataBase->consultar($sql);

        $listado=[];

        while($registro= $datos->fetch_assoc()){
            $nombreCarrera= $registro['carrera_nombre'];
            $cantidad= $registro['cantidad'];
            array_push($listado,array($nombreCarrera,$cantidad));
        }

        return $listado;

    }

    public static function busquedaPorApellido($apellido){
        $sql="SELECT id_alumno,id_persona, persona_nombre, persona_apellido, persona_fecha_nac, persona_dni, persona_nacionalidad, alumno_num_legajo, sexo_id_sexo, persona.estado_id_estado 
        from persona join alumno on id_persona=persona_id_persona 
        where persona_apellido like'%{$apellido}%'";

        $dataBase=new MySql();

        $datos=$dataBase->consultar($sql);

        $listadoAlumnos = [];

        while ($registro = $datos->fetch_assoc()){
            if($registro['estado_id_estado']==1){
                $alumno=new Alumno();
                $alumno->crearAlumno ($alumno,$registro);

                $listadoAlumnos[]=$alumno;
        }}

        return $listadoAlumnos;      
    }
    

}


?>