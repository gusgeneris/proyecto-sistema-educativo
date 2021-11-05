<?php

require_once "MySql.php";

class Dia{
    private $_idDia;
    private $_descripcion;


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

    public static function obtenerTodo(){
        $sql="SELECT id_dia, dia_nombre from dia";
        $database=new Mysql();
        $datos=$database->consultar($sql);

        $listadoDias=[];

        while ($registro = $datos->fetch_assoc()){
            
        $dia=new Dia();
        $dia->setIdDia($registro['id_dia']);
        $dia->setDescripcion($registro['dia_nombre']);

        $listadoDias[]=$dia;

        }
        return $listadoDias;
    }

    public static function obtenerPorId($idDia){
        $sql="SELECT id_dia, dia_nombre from dia WHERE id_dia={$idDia}";
        $database=new Mysql();
        $datos=$database->consultar($sql);
        $registro = $datos->fetch_assoc();

        $dia=new Dia();
        $dia->setIdDia($registro['id_dia']);
        $dia->setDescripcion($registro['dia_nombre']);

        return $dia;
    }

}
?>