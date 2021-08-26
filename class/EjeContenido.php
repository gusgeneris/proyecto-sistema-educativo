<?php

require_once "../../class/MySql.php";

class EjeContenido{
    private $_idEjeContenido;
    private $_numero;
    private $_descripcion;

    
    /**
     * Get the value of _idejeContenido
     */ 
    public function getIdEjeContenido()
    {
        return $this->_idEjeContenido;
    }

    /**
     * Set the value of _idejeContenido
     *
     * @return  self
     */ 
    public function setIdEjeContenido($_idEjeContenido)
    {
        $this->_idEjeContenido = $_idEjeContenido;

        return $this;
    }


    /**
     * Get the value of _eje_numero
     */ 
    public function getNumero()
    {
        return $this->_numero;
    }

    /**
     * Set the value of _eje_numero
     *
     * @return  self
     */ 
    public function setNumero($_numero)
    {
        $this->_numero = $_numero;

        return $this;
    }

    /**
     * Get the value of _Descripcion
     */ 
    public function getDescripcion()
    {
        return $this->_descripcion;
    }

    /**
     * Set the value of _Descripcion
     *
     * @return  self
     */ 
    public function setDescripcion($_descripcion)
    {
        $this->_descripcion = $_descripcion;

        return $this;
    }


    public function crearEjeContenido($ejeContenido,$registro){
        $ejeContenido->_idEjeContenido= $registro['id_eje_contenido'];
        $ejeContenido->_descripcion= $registro['eje_descripcion'];
        $ejeContenido->_numero= $registro['eje_numero'];

        return $ejeContenido;
    }

    
    
    public function insert(){
        $sql = "INSERT INTO `eje_contenido` (`eje_descripcion`, `eje_numero`) VALUES ('$this->_descripcion', '$this->_numero')";
        $database=new Mysql();

        $idEjeContenido=$database->insertarRegistro($sql);
        $this->_idEjeContenido=$idEjeContenido;
        
    }

    public function  crearRelacionConCurriculaCarrera($idCarrera,$idMateria,$idCicloLectivo){
        $idCicloLectivoCarrera="SELECT id_ciclo_lectivo_carrera from ciclo_lectivo_carrera where ciclo_lectivo_id_ciclo_lectivo={$idCicloLectivo} and carrera_id_carrera={$idCarrera}";


        $database=new Mysql();
        $resultado=($database->consultar($idCicloLectivoCarrera))->fetch_assoc();
        $idCicloLectivoCarrera=$resultado['id_ciclo_lectivo_carrera'];

        $idCurriculaCarrera="SELECT id_curricula_carrera from curricula_carrera where materia_id_materia={$idMateria} and ciclo_lectivo_carrera_id_ciclo_lectivo_carrera={$idCicloLectivoCarrera}";
        
        $resultado=($database->consultar($idCurriculaCarrera))->fetch_assoc();
        $idCurriculaCarrera = $resultado['id_curricula_carrera'];

        $sql = "INSERT INTO `curricula_carrera_contenido` (`eje_contenido_id_eje_contenido`, `curricula_carrera_id_curricula_carrera`) VALUES ('$this->_idEjeContenido', $idCurriculaCarrera);";

        $database->insertarRegistro($sql);
        
    }

    public function consultaId($idCarrera,$idMateria){
        $sql="SELECT id_curricula_carrera from curricula_carrera where materia_id_materia={$idMateria} and carrera_id_carrera={$idCarrera};";
        $database= new Mysql();
        $id=$database->consultar($sql);

    }

    public static function listaTodos(){
        $sql=" SELECT id_eje_contenido, eje_descripcion,eje_numero,estado FROM eje_contenido";
        $database=new Mysql();
        $datos=$database->consultar($sql);
        $listadoEjeContenido=[];
        
        while ($registro = $datos->fetch_assoc()){
            if($registro['estado']==1){

            $ejeContenido=new EjeContenido();
            $ejeContenido->crearEjeContenido($ejeContenido,$registro);

            $listadoEjeContenido[]=$ejeContenido;
            }
            
        }

        return $listadoEjeContenido;

    }

    public static function darDeBaja($idejeContenido){
        $sql = "UPDATE `eje_contenido` SET `estado` = '2' WHERE (`id_eje_contenido` = '$idejeContenido')";

        $database= new MySql();
        $datos = $database->eliminarRegistro($sql);

    }

    public static function obtenerTodoPorId($id){
        $sql = "SELECT id_eje_contenido,eje_descripcion,eje_numero from eje_contenido WHERE id_eje_contenido={$id};";

        $db = new MySql();
        $datos = $db->consultar($sql);

        while ($registro = $datos->fetch_assoc()){

            $ejeContenido=new EjeContenido();
            $ejeContenido->crearEjeContenido($ejeContenido,$registro);
        }

        return $ejeContenido;

    }

    public function actualizarEjeContenido(){

        $database = new MySql();
        $sql = "UPDATE `eje_contenido` SET `eje_numero` = '{$this->_numero}',`eje_descripcion` = '{$this->_descripcion}' WHERE (`id_eje_contenido` = '{$this->_idEjeContenido}');";

        $database->actualizar($sql);


    }

    public static function obtenerPorIdMateria($idMateria,$idCarrera){
        $sql = /*"SELECT eje_contenido.id_eje_contenido,eje_contenido.eje_numero, eje_contenido.eje_descripcion, materia.materia_nombre 
        from curricula_carrera_contenido 
        join curricula_carrera on curricula_carrera.id_curricula_carrera = curricula_carrera_contenido.curricula_carrera_id_curricula_carrera 
        join eje_contenido on eje_contenido.id_eje_contenido=curricula_carrera_contenido.eje_contenido_id_eje_contenido 
        join materia on curricula_carrera.materia_id_materia = materia.id_materia 
        join carrera on curricula_carrera.carrera_id_carrera=carrera.id_carrera */
        "SELECT eje_contenido.id_eje_contenido,eje_contenido.eje_numero, eje_contenido.eje_descripcion, materia.materia_nombre from curricula_carrera_contenido 
        join curricula_carrera on curricula_carrera.id_curricula_carrera = curricula_carrera_contenido.curricula_carrera_id_curricula_carrera 
        join ciclo_lectivo_carrera on curricula_carrera.ciclo_lectivo_carrera_id_ciclo_lectivo_carrera = ciclo_lectivo_carrera.id_ciclo_lectivo_carrera
        join eje_contenido on eje_contenido.id_eje_contenido=curricula_carrera_contenido.eje_contenido_id_eje_contenido 
        join materia on curricula_carrera.materia_id_materia = materia.id_materia 
        join carrera on ciclo_lectivo_carrera.carrera_id_carrera=carrera.id_carrera 
        where materia.id_materia={$idMateria} and carrera.id_carrera={$idCarrera}";

        $db = new MySql();  
        $datos = $db->consultar($sql);

        $listadoEjeContenido=[];

        while ($registro = $datos->fetch_assoc()){

            $ejeContenido=new EjeContenido();
            $ejeContenido->crearEjeContenido($ejeContenido,$registro);
            $listadoEjeContenido[]=$ejeContenido;
        }

        return $listadoEjeContenido;


    }


}



?>