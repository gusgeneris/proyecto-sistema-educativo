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
        #$materia->_arrEjeContenido=EjeContenido::obtenerTodoPorId(1);

        return $materia;
    }
    
    public function insert(){

        $sql = "INSERT INTO `materia` (`materia_nombre`) VALUES ('{$this->_nombre}');";
        $database= new Mysql();
        $idMateria=$database->insertarRegistro($sql);
        $this->_idMateria=$idMateria;

    }

    public static function crearRelacionConCarrera($idMateria,$idCarrera,$idCicloLectivo,$periodoDesarrollo,$anioDesarrollo){

        $sqlIdCicloLectivoCarrera="SELECT id_ciclo_lectivo_carrera FROM ciclo_lectivo_carrera WHERE ciclo_lectivo_id_ciclo_lectivo={$idCicloLectivo} AND carrera_id_carrera={$idCarrera} ;";

        $database= new Mysql();
        $dato=$database->consultar($sqlIdCicloLectivoCarrera);
        $registro=$dato->fetch_assoc();
        $idCicloLectivoCarrera=$registro['id_ciclo_lectivo_carrera'];

        $sql="INSERT INTO `curricula_carrera` (`materia_id_materia`, `ciclo_lectivo_carrera_id_ciclo_lectivo_carrera`,`periodo_desarrollo_id_periodo_desarrollo`,`anio_desarrollo_id_anios_desarrollo`) VALUES ($idMateria, {$idCicloLectivoCarrera},{$periodoDesarrollo},{$anioDesarrollo})";

        $database->insertarRegistro($sql);
        return true;
    }

    public static function listadoMaterias($filtroEstado=0,$filtroNombre=""){
        $sql= "SELECT id_materia,materia_nombre, estado_id_estado FROM materia ";
        
        $where="";

        if($filtroEstado!=0){
            $where.="WHERE materia.estado_id_estado=$filtroEstado ";
        };

        if($filtroNombre != ""){
            if($where!= ""){
                $where.="AND materia.materia_nombre like '%{$filtroNombre}%'";
            }else{
                $where= "WHERE materia.materia_nombre like '%{$filtroNombre}%'";
            }
        }
        $sql.=$where;

    

        $database= new Mysql();
        $datos = $database->consultar($sql);


        $listadoMaterias=[];
        
        while ($registro = $datos->fetch_assoc()){
            #if ($registro['estado_id_estado']==1){
                $materia=new Materia();
                $materia->crearMateria($registro,$materia);

                $listadoMaterias[]=$materia;}
        
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
    public static function listadoPorIdCarrera($idCicloLectivo,$idCarrera){
        /*$sql="SELECT id_materia, materia_nombre, materia.estado_id_estado, curricula_carrera.curricula_carrera_estado FROM materia 
        JOIN curricula_carrera on curricula_carrera.materia_id_materia=materia.id_materia
        JOIN carrera ON carrera.id_carrera=curricula_carrera.carrera_id_carrera
        JOIN ciclo_lectivo_carrera on carrera.id_carrera=ciclo_lectivo_carrera.carrera_id_carrera
        JOIN ciclo_lectivo on ciclo_lectivo.id_ciclo_lectivo=ciclo_lectivo_carrera.ciclo_lectivo_id_ciclo_lectivo
        WHERE carrera.id_carrera={$idCarrera} AND ciclo_lectivo.id_ciclo_lectivo={$idCicloLectivo}";*/

        $sql="SELECT id_materia, materia_nombre, materia.estado_id_estado, curricula_carrera.curricula_carrera_estado 
        FROM curricula_carrera 
        JOIN materia on curricula_carrera.materia_id_materia=materia.id_materia 
        JOIN ciclo_lectivo_carrera on curricula_carrera.ciclo_lectivo_carrera_id_ciclo_lectivo_carrera=ciclo_lectivo_carrera.id_ciclo_lectivo_carrera 
        WHERE ciclo_lectivo_carrera.carrera_id_carrera={$idCarrera} AND ciclo_lectivo_carrera.ciclo_lectivo_id_ciclo_lectivo={$idCicloLectivo}";
        
       
        $database=new Mysql();
        $datos=$database->consultar($sql);

        $listadoMaterias= [];

        #if($datos->num_rows > 0){
 
            while ($registro = $datos->fetch_assoc()){
                if ($registro['curricula_carrera_estado']==1){
                    $materia=new Materia();
                    $materia->_idMateria=$registro['id_materia'];
                    $materia->_nombre=$registro['materia_nombre'];
                    $materia->_estado=$registro['estado_id_estado'];
                    #$materia->_arrEjeContenido=EjeContenido::obtenerPorIdMateria($materia->_idMateria,$idCarrera);
                    $listadoMaterias[]=$materia;}
                
            }
        

        return $listadoMaterias;
    }

    public static function eliminarRelacionCarrera($idMateria,$idCarrera){
        $sqlId="SELECT id_curricula_carrera FROM curricula_carrera 
        join ciclo_lectivo_carrera on curricula_carrera.ciclo_lectivo_carrera_id_ciclo_lectivo_carrera = ciclo_lectivo_carrera.id_ciclo_lectivo_carrera 
        join carrera on carrera.id_carrera=ciclo_lectivo_carrera.carrera_id_carrera
        WHERE materia_id_materia=$idMateria AND carrera_id_carrera=$idCarrera";/*SELECT id_curricula_carrera FROM curricula_carrera WHERE materia_id_materia={$idMateria} AND carrera_id_carrera={$idCarrera}";
        */
        $database =new Mysql();
        $dato=$database->consultar($sqlId);
        $registro=$dato->fetch_assoc();
        $idCurriculaCarrera=$registro["id_curricula_carrera"];
        $sql="UPDATE curricula_carrera SET `curricula_carrera_estado` = '2' WHERE (`id_curricula_carrera` = {$idCurriculaCarrera})";
        
        $database->eliminarRegistro($sql);
    }

    public function __toString(){

        return "{$this->_nombre}";

    }

    static public function listadoMateriasParaMatricularAlumno($idCicloLectivoCarrera){
        $sql="SELECT materia_nombre , id_materia, detalle_periodo, detalle_anio from ciclo_lectivo_carrera
        join curricula_carrera on id_ciclo_lectivo_carrera=ciclo_lectivo_carrera_id_ciclo_lectivo_carrera
        join materia on materia_id_materia = id_materia
        join anio_desarrollo on id_anio_desarrollo = curricula_carrera.anio_desarrollo_id_anios_desarrollo
        join periodo_desarrollo on id_periodo_desarrollo = curricula_carrera.periodo_desarrollo_id_periodo_desarrollo
        where id_ciclo_lectivo_carrera={$idCicloLectivoCarrera}";
    

        $database =new Mysql();
        $datos=$database->consultar($sql);

        $listado=array();
        
        while ($registro = $datos->fetch_assoc()){
            
                $idMateria=$registro['id_materia']; 
                $nombreMateria=$registro['materia_nombre'];
                $periodoDetalle=$registro['detalle_periodo'];
                $anioDetalle=$registro['detalle_anio'];
                array_push($listado,array($idMateria,$nombreMateria,$periodoDetalle,$anioDetalle));
        }
        return $listado;
    }
    
    
    public function eliminarTodaRelacion($idAlumno){
        $sql="DELETE FROM alumno_materia WHERE alumno_id_alumno={$idAlumno}";
    
        $database=new Mysql();
        $database->eliminarRegistro($sql);
    
    }
    
    public static function eliminarRelacionMateria($idMateria,$idAlumno){
        $sqlId="SELECT id_alumno_materia FROM alumno_materia WHERE alumno_id_alumno={$idAlumno} AND materia_id_materia={$idMateria};";
    
        $database=new Mysql();
        $dato=$database->consultar($sqlId);
        $registro=$dato->fetch_assoc();
        $idAlumnoMateria=$registro["id_alumno_materia"];
    
        $sql="DELETE FROM `alumno_materia` WHERE (`id_alumno_materia` = {$idAlumnoMateria});";
    
        $database->eliminarRegistro($sql);
    
    }

    static public function listadoPorAlumno($idAlumno){
        $sql="SELECT id_materia from materia join alumno_materia on id_materia=materia_id_materia join alumno on id_alumno = alumno_id_alumno where id_alumno= $idAlumno";
        
        $database= new Mysql();
        $datos=$database->consultar($sql);

        $listadoMatriculas= [];
        while ($registro = $datos->fetch_assoc()){  
            $matricula=new Materia();
            $matricula->_idMateria=$registro['id_materia'];
            #$especialidad->_estado=$registro['estado_id_estado'];
            $listadoMatriculas[]=$matricula;
        }
        return $listadoMatriculas;

    }


    public function matricularAlumno($idAlumno){
        $sql="INSERT INTO `alumno_materia` (`alumno_id_alumno`, `materia_id_materia`) VALUES ($idAlumno, {$this->_idMateria})";
        $database= new Mysql();
        $database->insertarRegistro($sql);
    }









}

?>

