<?php 
require_once 'MySql.php';
class Estado{

    private $_idEstado;
    private $_descripcion;

    /**
     * Get the value of _idEstado
     */ 
    public function getIdEstado()
    {
        return $this->_idEstado;
    }

    /**
     * Set the value of _idEstado
     *
     * @return  self
     */ 
    public function setIdEstado($_idEstado)
    {
        $this->_idEstado = $_idEstado;

        return $this;
    }

    /**
     * Get the value of _descripcion
     */ 
    public function getDescripcion()
    {
        return $this->_descripcion;
    }

    /**
     * Set the value of _descripcion
     *
     * @return  self
     */ 
    public function setDescripcion($_descripcion)
    {
        $this->_descripcion = $_descripcion;

        return $this;
    }

    public static function estadoTodos(){

        $sql="SELECT id_estado,estado_descripcion FROM estado";
        $database=new MySql();
        $datos = $database->consultar($sql);
        $listadoEstados = [];

 
        if($datos->num_rows > 0){
            while ($registro = $datos->fetch_assoc()){
                $estado=new estado();
                $estado->setIdEstado($registro['id_estado']);
                $estado->setDescripcion($registro['estado_descripcion']);
                $listadoEstados[]=$estado;
            }
            return $listadoEstados;}

    }
    public static function estadoPorId($idEstado){
        $sql="SELECT id_estado,estado_descripcion FROM estado WHERE id_estado={$idEstado}";
        
        
        $database=new MySql();
        $dato = $database->consultar($sql);

        $registro = $dato->fetch_assoc();

        $estado=new Estado();
        $estado->setIdEstado($registro['id_estado']);
        $estado->setDescripcion($registro['estado_descripcion']);
        return $estado;
    }



}



?>