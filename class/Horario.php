<?php

require_once "MySql.php";

class Horario{
    private $_idHorario;
    private $_numero;
    private $_horaInicio;
    private $_horaFin;
    private $_idDia;
    private $_estado;

    
    /**
     * Get the value of _idHorario
     */ 
    public function getIdHorario()
    {
        return $this->_idHorario;
    }

    /**
     * Set the value of _idHorario
     *
     * @return  self
     */ 
    public function setIdHorario($_idHorario)
    {
        $this->_idHorario = $_idHorario;

        return $this;
    }


    /**
     * Get the value of _numero
     */ 
    public function getNumero()
    {
        return $this->_numero;
    }

    /**
     * Set the value of _numero
     *
     * @return  self
     */ 
    public function setNumero($_numero)
    {
        $this->_numero = $_numero;

        return $this;
    }

    /**
     * Get the value of _horaInicio
     */ 
    public function getHoraInicio()
    {
        return $this->_horaInicio;
    }

    /**
     * Set the value of _horaInicio
     *
     * @return  self
     */ 
    public function setHoraInicio($_horaInicio)
    {
        $this->_horaInicio = $_horaInicio;

        return $this;
    }

    /**
     * Get the value of _horaFin
     */ 
    public function getHoraFin()
    {
        return $this->_horaFin;
    }

    /**
     * Set the value of _horaFin
     *
     * @return  self
     */ 
    public function setHoraFin($_horaFin)
    {
        $this->_horaFin = $_horaFin;

        return $this;
    }

    /**
     * Get the value of _idDia
     */ 
    public function getIdDia()
    {
        return $this->_idDia;
    }

    /**
     * Set the value of _idDia
     *
     * @return  self
     */ 
    public function setIdDia($_idDia)
    {
        $this->_idDia = $_idDia;

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

    public function crearHorario($horario,$registro){
        $horario->_idHorario= $registro['id_horario'];
        $horario->_horaInicio= $registro['hora_inicio'];
        $horario->_horaFin= $registro['hora_fin'];
        $horario->_numero= $registro['numero'];
        $horario->_idDia= $registro['dia_id_dia'];
        $horario->_estado= $registro['estado'];

        return $horario;
    }

    
    
    public function insert(){

        $sql="SELECT * FROM horario where numero={$this->_numero} and dia_id_dia={$this->_idDia}";
        

        $database=new Mysql();

        $dato=$database->consultar($sql); 

        $existencia1=$dato->num_rows;

        $sql="SELECT * FROM horario where hora_fin='{$this->_horaFin}' and hora_inicio='{$this->_horaInicio}' and dia_id_dia={$this->_idDia}"; 
 

        $database=new Mysql();

        $dato=$database->consultar($sql); 

        $existencia2=$dato->num_rows;
        

        if($existencia1==0){
            if($existencia2==0){

                $database = new MySql();
            $sql = "INSERT INTO `horario` (`hora_inicio`, `hora_fin`, `numero`, `dia_id_dia`) VALUES ('$this->_horaInicio', '$this->_horaFin', '$this->_numero','$this->_idDia')";
                
            $database=new Mysql();

            $database->insertarRegistro($sql);

            return  1;}

        }else{
            return  0;
        }
        
        
    }

    public static function listaTodos(){
        $sql=" SELECT id_horario, hora_inicio,hora_fin,numero,estado,dia_id_dia FROM horario";
        $database=new Mysql();
        $datos=$database->consultar($sql);
        $listadoHorario=[];
        
        while ($registro = $datos->fetch_assoc()){
            #if($registro['estado']==1){

            $horario=new Horario();
            $horario->crearHorario($horario,$registro);

            $listadoHorario[]=$horario;
            #}
            
        }

        return $listadoHorario;

    }

    public static function darDeBaja($idHorario){
        $sql = "UPDATE `horario` SET `estado` = '2' WHERE (`id_horario` = '$idHorario')";

        $database= new MySql();
        $datos = $database->eliminarRegistro($sql);

    }

    public static function darAlta($idHorario){
        $sql = "UPDATE `horario` SET `estado` = '1' WHERE (`id_horario` = '$idHorario')";

        $database= new MySql();
        $datos = $database->eliminarRegistro($sql);

        return true;

    }

    public static function obtenerTodoPorId($id){
        $sql = "SELECT estado,id_horario,hora_inicio,hora_fin,numero,dia_id_dia from horario WHERE id_horario={$id};";

        $db = new MySql();
        $datos = $db->consultar($sql);

        while ($registro = $datos->fetch_assoc()){

        $horario=new Horario();
        $horario->crearHorario($horario,$registro);

        }

        return $horario;


    }

    public function actualizarHorario(){

        $sql="SELECT * FROM horario where numero={$this->_numero} and dia_id_dia={$this->_idDia}";
        

        $database=new Mysql();

        $dato=$database->consultar($sql); 

        $existencia1=$dato->num_rows;

        $sql="SELECT * FROM horario where hora_fin={$this->_horaFin} and hora_inicio={$this->_horaInicio}"; 

        $database=new Mysql();

        $dato=$database->consultar($sql); 

        $existencia2=$dato->num_rows;
        

        if($existencia1==0){
            if($existencia2==0){

                $database = new MySql();
                $sql = "UPDATE `horario` SET `numero` = '{$this->_numero}',`hora_inicio` = '{$this->_horaInicio}',`hora_fin` = '{$this->_horaFin}',dia_id_dia = '{$this->_idDia}' WHERE (`id_horario` = '{$this->_idHorario}');";

                $database->actualizar($sql);
                return 1;
            }
        }
        else{
            return 0;
        }

    }

    public static function listadoHorario(){

        $database = new MySql();
        $sql = "SELECT distinct (numero) as numero_modulo,hora_inicio,hora_fin from horario";
        
        $db = new MySql();
        $datos = $db->consultar($sql);
        $listaHoraInicio=[];

        while ($registro = $datos->fetch_assoc()){

        $horario=new Horario();
        $horario->setNumero($registro['numero_modulo']);
        $horario->setHoraInicio($registro['hora_inicio']);
        $horario->setHoraFin($registro['hora_fin']);
        $listaHoraInicio[]=$horario;
        }

        return $listaHoraInicio;

    }

    public static function listadoHorarioPorDia($idDia){

        $database = new MySql();
        $sql = "SELECT distinct (numero) as numero_modulo,hora_inicio,hora_fin from horario where dia_id_dia={$idDia}";
        
        $db = new MySql();
        $datos = $db->consultar($sql);
        $listaHoraInicio=[];

        while ($registro = $datos->fetch_assoc()){

        $horario=new Horario();
        $horario->setNumero($registro['numero_modulo']);
        $horario->setHoraInicio($registro['hora_inicio']);
        $horario->setHoraFin($registro['hora_fin']);
        $listaHoraInicio[]=$horario;
        }

        return $listaHoraInicio;

    }

    public static function obtenerIdHorario($idDia,$numero){

        $database = new MySql();
        $sql = "SELECT id_horario from horario where dia_id_dia={$idDia} and numero={$numero}";
        
        $db = new MySql();
        $dato = $db->consultar($sql);
        
        $registro=$dato->fetch_assoc();
        $idHorario=$registro['id_horario'];

        return $idHorario;

    }

    public static function asignarHorarioACurriculaCarrera($idHorario,$idCurriculaCarrera){
        $sql = "INSERT INTO `horario_curricula_carrera` (`horario_id_horario`, `curricula_carrera_id_curricula_carrera`) ". 
            "VALUES ('{$idHorario}', '{$idCurriculaCarrera}');
        ";
        $database=new Mysql();

        $database->insertarRegistro($sql);
        
    }

    public static function listadoHorariosPorIdCarrera($idCurriculaCarrera){

        $sql = "SELECT id_dia,materia_nombre,numero from horario ".
            "join dia on dia_id_dia = id_dia ".
            "join horario_curricula_carrera on id_horario=horario_id_horario ".
            "join curricula_carrera on id_curricula_carrera = curricula_carrera_id_curricula_carrera ".
            "join materia on id_materia = materia_id_materia ".
            "where id_curricula_carrera={$idCurriculaCarrera}";
        
        $db = new MySql();
        $datos = $db->consultar($sql);

        $listado=array();
                
        while ($registro = $datos->fetch_assoc()){

            $dia=$registro['id_dia'];
            $materia=$registro['materia_nombre'];
            $numero=$registro['numero'];
            array_push($listado,array($dia,$materia,$numero));

        }
            
        return $listado;

    }

    public static function listadoHorariosPorIdCicloLectivoCarrera($idCicloLectivoCarrera,$filtroAnio,$filtroPeriodo){

        $sql = "SELECT id_dia,materia_nombre,numero from horario ".
            "join dia on dia_id_dia = id_dia ".
            "join horario_curricula_carrera on id_horario=horario_id_horario ".
            "join curricula_carrera on id_curricula_carrera = curricula_carrera_id_curricula_carrera ".
            "join ciclo_lectivo_carrera on id_ciclo_lectivo_carrera = ciclo_lectivo_carrera_id_ciclo_lectivo_carrera ".
            "join materia on id_materia = materia_id_materia ".
            "where id_ciclo_lectivo_carrera={$idCicloLectivoCarrera}";
        
        
        $and="";

        if($filtroAnio !=""){
            $and.=" and anio_desarrollo_id_anios_desarrollo='$filtroAnio' ";
        };

        if($filtroPeriodo != ""){
            $and.=" AND periodo_desarrollo_id_periodo_desarrollo ='$filtroPeriodo'";
           
        }
        $sql.=$and;


        $db = new MySql();
        $datos = $db->consultar($sql);

        $listado=array();
                
        while ($registro = $datos->fetch_assoc()){

            $dia=$registro['id_dia'];
            $materia=$registro['materia_nombre'];
            $numero=$registro['numero'];
            array_push($listado,array($dia,$materia,$numero));

        }
            
        return $listado;

    }

    public static function listadoHorariosPorIdDocente($idDocente,$periodo){

        $sql = "SELECT distinct(id_horario_curricula_carrera),carrera_nombre,id_dia,materia_nombre,numero from horario ".
            "join dia on dia_id_dia = id_dia ".
            "join horario_curricula_carrera on id_horario=horario_id_horario ".
            "join curricula_carrera on id_curricula_carrera = curricula_carrera_id_curricula_carrera ".
            "join periodo_desarrollo on id_periodo_desarrollo=periodo_desarrollo_id_periodo_desarrollo ".
            "join ciclo_lectivo_carrera on id_ciclo_lectivo_carrera = ciclo_lectivo_carrera_id_ciclo_lectivo_carrera ".
            "join materia on id_materia = materia_id_materia ".
            "join docente_materia on id_curricula_carrera=docente_materia.curricula_carrera_id_curricula_carrera ".
            "join docente_carrera on docente_carrera.ciclo_lectivo_carrera_id_ciclo_lectivo_carrera=ciclo_lectivo_carrera.id_ciclo_lectivo_carrera ".
            "join docente on id_docente = docente_carrera.docente_id_docente ".
            "join carrera on id_carrera = carrera_id_carrera ".
            "where  docente_carrera.docente_id_docente={$idDocente} and docente_materia.docente_id_docente={$idDocente} ".
            "or docente_materia_estado=1 and docente_carrera_estado=1 and detalle_periodo like '%{$periodo}%'";
            
        $db = new MySql();
        $datos = $db->consultar($sql);

        $listado=array();
                
        while ($registro = $datos->fetch_assoc()){

            $dia=$registro['id_dia'];
            $materia=$registro['materia_nombre'];
            $numero=$registro['numero'];
            $carrera=$registro['carrera_nombre'];
            array_push($listado,array($dia,$materia,$numero,$carrera));

        }
            
        return $listado;

    }



}



?>