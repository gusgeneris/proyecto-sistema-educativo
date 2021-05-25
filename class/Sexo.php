<?php
require_once 'MySql.php';

class Sexo{
    protected $_idSexo;
    protected $_descripcion;


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

    }

    /**
     * Get the value of _idSexo
     */ 
    public function getIdSexo()
    {
        return $this->_idSexo;
    }

    /**
     * Set the value of _idSexo
     *
     * @return  self
     */ 
    public function setIdSexo($_idSexo)
    {
        $this->_idSexo = $_idSexo;

    }

    public static function sexoTodos(){

        $sql="SELECT id_sexo,sexo_descripcion FROM sexo";

        $database=new MySql();
        $datos = $database->consultar($sql);
        $listado = [];

 
        if($datos->num_rows > 0){
            while ($registro = $datos->fetch_assoc()){
                $sexo=new Sexo();
                $sexo->setIdSexo($registro['id_sexo']);
                $sexo->setDescripcion($registro['sexo_descripcion']);
                $descripcion=$sexo->getDescripcion();
                $listado[]=$descripcion;
            }
        return $listado;}
      
    }

    public static function sexoTodoPorId($id){
        $sql = "SELECT id_sexo,sexo_descripcion FROM sexo WHERE id_sexo= {$id}";

        $db = new MySql();
        $datos = $db->consultar($sql);
 
        if($datos->num_rows > 0){
                $registro=$datos->fetch_assoc();
                $sexo=new Sexo();
                $sexo->setIdSexo($registro['id_sexo']);
                $sexo->setDescripcion($registro['sexo_descripcion']);
                $lista[]=$sexo;
            }
        return $sexo;}

    }
    





?>