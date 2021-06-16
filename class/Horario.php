<?php

require_once "../../class/MySql.php";

class Horario{
    private $_idHorario;
    private $_numero;
    private $_horaInicio;
    private $_horaFin;

    
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

    public function crearHorario($horario,$registro){
        $horario->_idHorario= $registro['id_horario_modulo'];
        $horario->_horaInicio= $registro['hora_inicio'];
        $horario->_horaFin= $registro['hora_fin'];
        $horario->_numero= $registro['numero'];

        return $horario;
    }

    
    
    public function insert(){
        $sql = "INSERT INTO `horario_modulo` (`hora_inicio`, `hora_fin`, `numero`) VALUES ('$this->_horaInicio', '$this->_horaFin', '$this->_numero')";
        $database=new Mysql();

        $database->insertarRegistro($sql);
        
    }

    public static function listaTodos(){
        $sql=" SELECT id_horario_modulo, hora_inicio,hora_fin,numero,estado FROM horario_modulo";
        $database=new Mysql();
        $datos=$database->consultar($sql);
        $listadoHorario=[];
        
        while ($registro = $datos->fetch_assoc()){
            if($registro['estado']==1){

            $horario=new Horario();
            $horario->crearHorario($horario,$registro);

            $listadoHorario[]=$horario;
            }
            
        }

        return $listadoHorario;

    }

    public static function darDeBaja($idHorario){
        $sql = "UPDATE `horario_modulo` SET `estado` = '2' WHERE (`id_horario_modulo` = '$idHorario')";

        $database= new MySql();
        $datos = $database->eliminarRegistro($sql);

    }

    public static function obtenerTodoPorId($id){
        $sql = "SELECT id_horario_modulo,hora_inicio,hora_fin,numero from horario_modulo WHERE id_horario_modulo={$id};";

        $db = new MySql();
        $datos = $db->consultar($sql);

        while ($registro = $datos->fetch_assoc()){

        $horario=new Horario();
        $horario->crearHorario($horario,$registro);

        }

        return $horario;


    }

    public function actualizarHorario(){

        $database = new MySql();
        $sql = "UPDATE `horario_modulo` SET `numero` = '{$this->_numero}',`hora_inicio` = '{$this->_horaInicio}',`hora_fin` = '{$this->_horaFin}' WHERE (`id_horario_modulo` = '{$this->_idHorario}');";

        $database->actualizar($sql);


    }


}



?>