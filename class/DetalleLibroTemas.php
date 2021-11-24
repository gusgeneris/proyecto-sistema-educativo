<?php

require_once "Mysql.php";

Class DetalleLibroTemas{
    private $_idDetalleLibroTemas;
    private $_idLibroTemas;
    private $_temaDia;
    private $_observaciones;
    private $_idClase;

    /**
     * Get the value of _observaciones
     */ 
    public function getObservaciones()
    {
        return $this->_observaciones;
    }

    /**
     * Set the value of _observaciones
     *
     * @return  self
     */ 
    public function setObservaciones($_observaciones)
    {
        $this->_observaciones = $_observaciones;

        return $this;
    }

    /**
     * Get the value of _idDetalleLibroTemas
     */ 
    public function getIdDetalleLibroTemas()
    {
        return $this->_idDetalleLibroTemas;
    }

    /**
     * Set the value of _idDetalleLibroTemas
     *
     * @return  self
     */ 
    public function setIdDetalleLibroTemas($_idDetalleLibroTemas)
    {
        $this->_idDetalleLibroTemas = $_idDetalleLibroTemas;

        return $this;
    }

    /**
     * Get the value of _temaDia
     */ 
    public function getTemaDia()
    {
        return $this->_temaDia;
    }

    /**
     * Set the value of _temaDia
     *
     * @return  self
     */ 
    public function setTemaDia($_temaDia)
    {
        $this->_temaDia = $_temaDia;

        return $this;
    }

    /**
     * Get the value of _idClase
     */ 
    public function getIdClase()
    {
        return $this->_idClase;
    }

    /**
     * Set the value of _idClase
     *
     * @return  self
     */ 
    public function setIdClase($_idClase)
    {
        $this->_idClase = $_idClase;

        return $this;
    }

    
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

    

    public function crearDetalle($detalle,$registro){
        $detalle->_idDetalleLibroTemas= $registro['id_detalle_libro_temas'];
        $detalle->_temaDia= $registro['detalle_libro_tema_del_dia'];
        $detalle->_observaciones= $registro['detalle_libro_tema_observaciones'];
        $detalle->_idClase= $registro['clase_id_clase'];
        $detalle->_idLibroTemas= $registro['libro_temas_id_libro_temas'];

        return $detalle;
    }

    public function insert(){

        $sql="INSERT INTO `detalle_libro_temas` (`detalle_libro_tema_del_dia`, `detalle_libro_tema_observaciones`, `clase_id_clase`, `libro_temas_id_libro_temas`) VALUES ('{$this->_temaDia}', '{$this->_observaciones}', '{$this->_idClase}', '{$this->_idLibroTemas}');";
        
        $database=new Mysql();
        $database->insertarRegistro($sql);
        
    }

    public static function detallePorIdCurriculaIdClase($idCurriculaCarrera,$idClase){
        $sql="SELECT id_detalle_libro_temas, detalle_libro_tema_del_dia, detalle_libro_tema_observaciones,clase_id_clase, libro_temas_id_libro_temas from detalle_libro_temas
        join libro_temas on id_libro_temas = libro_temas_id_libro_temas
        join curricula_carrera on id_curricula_carrera=curricula_carrera_id_curricula_carrera
        join clase on id_clase = clase_id_clase
        where id_curricula_carrera = {$idCurriculaCarrera} and id_clase={$idClase};";

        $db = new MySql();
        $datos = $db->consultar($sql);

        $listaDetalle=[];

        while($registro = $datos->fetch_assoc()){

            $detalle=new DetalleLibroTemas();
            $detalle->crearDetalle($detalle,$registro);

            $listaDetalle[]=$detalle;
        }

        return $listaDetalle;      

    }

    public static function detalleLibroPorClase($idClase){
        $sql="SELECT id_detalle_libro_temas,detalle_libro_tema_del_dia, detalle_libro_tema_observaciones, clase_id_clase, libro_temas_id_libro_temas from detalle_libro_temas where clase_id_clase={$idClase}";
        
        $db = new MySql();
        $datos = $db->consultar($sql);

        $listadoDetalle=[];

        while ($registro = $datos->fetch_assoc()){

            $detalle=new DetalleLibroTemas();
            $detalle->crearDetalle($detalle,$registro);
            $listadoDetalle []= $detalle;

        }
        
        return $listadoDetalle;      
    }

    public static function detalleLibroPorCurriculaCarrera($idCurriculaCarrera){
        $sql="SELECT clase_numero,id_detalle_libro_temas,detalle_libro_tema_del_dia, detalle_libro_tema_observaciones, clase_id_clase,libro_temas_id_libro_temas ".
            "from detalle_libro_temas ".
            "join libro_temas on libro_temas_id_libro_temas=id_libro_temas ".
            "join curricula_carrera on id_curricula_carrera = curricula_carrera_id_curricula_carrera ".
            "join clase on clase_id_clase = id_clase ".
            "where id_curricula_carrera={$idCurriculaCarrera}";
        
           
        
        $db = new MySql();
        $datos = $db->consultar($sql);

        $listadoDetalle=[];
        while ($registro = $datos->fetch_assoc()){
 
            $detalle=new DetalleLibroTemas();
            $detalle->crearDetalle($detalle,$registro);
            
            $listadoDetalle []= $detalle;

        }
        
        return $listadoDetalle;    

    }

    public function modificar(){
        $sql="UPDATE `detalle_libro_temas` SET `detalle_libro_tema_del_dia` = '{$this->_temaDia}', `detalle_libro_tema_observaciones` = '{$this->_observaciones}' WHERE (`id_detalle_libro_temas` = '{$this->_idDetalleLibroTemas}');
        ";

        $db= new MySql();
        $db->actualizar($sql);

    }


    public static function obtenerPorId($idDetalleLibroTemas){
        $sql="SELECT id_detalle_libro_temas,detalle_libro_tema_del_dia, detalle_libro_tema_observaciones, clase_id_clase,libro_temas_id_libro_temas FROM detalle_libro_temas ".
            "WHERE id_detalle_libro_temas={$idDetalleLibroTemas}";
        
        $db= new MySql();
        $datos =$db->consultar($sql);

        $registro = $datos->fetch_assoc();
        $detalle=new DetalleLibroTemas();
        $detalle->crearDetalle($detalle,$registro);
            
        return $detalle;

    }



}










?>