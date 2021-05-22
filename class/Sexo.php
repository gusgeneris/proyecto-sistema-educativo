<?php
require_once 'MySql.php';

class Sexo{
    protected $_idSexo;
    protected $_descripcion;


    /**
     * Get the value of _descripcion
     */ 
    public function get_descripcion()
    {
        return $this->_descripcion;
    }

    /**
     * Set the value of _descripcion
     *
     * @return  self
     */ 
    public function set_descripcion($_descripcion)
    {
        $this->_descripcion = $_descripcion;

        return $this;
    }

    /**
     * Get the value of _idSexo
     */ 
    public function get_idSexo()
    {
        return $this->_idSexo;
    }

    /**
     * Set the value of _idSexo
     *
     * @return  self
     */ 
    public function set_idSexo($_idSexo)
    {
        $this->_idSexo = $_idSexo;

        return $this;
    }

    public static function sexoTodos(){

        $sql="SELECT id_sexo,sexo_descripcion FROM sexo";

        $database=new MySql();
        $datos = $database->consultar($sql);
        $listadoUsuarios = [];

 
        if($datos->num_rows > 0){
            while ($registro = $datos->fetch_assoc()){
                $sexo=new Sexo();
                $sexo->set_idSexo($registro['id_sexo']);
                $sexo->set_descripcion($registro['sexo_descripcion']);
                $descripcion=$sexo->get_descripcion();
                $listadoUsuarios[]=$descripcion;
            }
            return $listadoUsuarios;}
      


    }
    


}



?>