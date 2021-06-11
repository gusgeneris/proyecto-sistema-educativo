<?php

class MySql{

    protected $_conexion;

    public function __construct(){
        $this->_conexion = new mysqli("localhost","root","","sistema_educativo");
    }

    public function getConexion(){
        return $this->_conexion;
    }

    public function consultar($sql){
        $datos=$this->_conexion->query($sql);
        return $datos;
    }
    
    public function eliminarRegistro($sql){
        $datos=$this->_conexion->query($sql);
    }

    public function insertarRegistro($sql){
        $datos=$this->_conexion->query($sql);
        return $this->_conexion->insert_id;

    }

    public function actualizar($sql){
        $datos=$this->_conexion->query($sql);
    }

    
}




?>