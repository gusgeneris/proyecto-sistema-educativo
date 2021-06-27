<?php
require_once 'MySql.php';
require_once 'Modulo.php';


class Perfil{
    private $_idPerfil;
    private $_perfilNombre;
    private $_arrModulos;


    /**
     * Get the value of _idPerfil
     */ 
    public function getIdPerfil()
    {
        return $this->_idPerfil;
    }

    /**
     * Set the value of _idPerfil
     *
     * @return  self
     */ 
    public function setIdPerfil($_idPerfil)
    {
        $this->_idPerfil = $_idPerfil;

        return $this;
    }

    /**
     * Get the value of _perfilNombre
     */ 
    public function getPerfilNombre()
    {
        return $this->_perfilNombre;
    }

    /**
     * Set the value of _perfilNombre
     *
     * @return  self
     */ 
    public function setPerfilNombre($_perfilNombre)
    {
        $this->_perfilNombre = $_perfilNombre;

        return $this;
    }

        /**
     * Get the value of _arrModulos
     */ 
    public function getArrModulos()
    {
        return $this->_arrModulos;
    }

    public function insert(){
        $sql="INSERT INTO `perfil` (`perfil_nombre`) VALUES ('$this->_perfilNombre');
        ";
        $database=new Mysql();

        $database->insertarRegistro($sql);
              
    }

    public static function perfilTodos(){

        $sql="SELECT id_perfil,perfil_nombre FROM perfil";
        $database=new MySql();
        $datos = $database->consultar($sql);
        $listadoPerfil = [];

 
        if($datos->num_rows > 0){
            while ($registro = $datos->fetch_assoc()){
                $perfil=new Perfil();
                $perfil->setIdPerfil($registro['id_perfil']);
                $perfil->setPerfilNombre($registro['perfil_nombre']);
                $listadoPerfil[]=$perfil;
            }
            return $listadoPerfil;}

    }

    public static function perfilPorId($id){
        $sql = "SELECT id_perfil,perfil_nombre FROM perfil WHERE id_perfil= {$id}";

        $db = new MySql();
        $datos = $db->consultar($sql);
 
        if($datos->num_rows > 0){
                $registro=$datos->fetch_assoc();
                $perfil=new perfil();
                $perfil->setIdperfil($registro['id_perfil']);
                $perfil->setPerfilNombre($registro['perfil_nombre']);
                $perfil->_arrModulos= Modulo :: obtenerPorIdPerfil($perfil->_idPerfil);
            }
        return $perfil;}
    
        public function actualizarPerfil(){

            $database = new MySql();
            $sql = "UPDATE `perfil` SET `perfil_nombre` = '{$this->_perfilNombre}' WHERE (`id_perfil` = '{$this->_idPerfil}')";

            $database->actualizar($sql);

        }

        public function darDeBaja($idPerfil){
            $sql = "UPDATE `perfil` SET `estado` = '2' WHERE (`id_perfil` = '$idPerfil')";

            $database= new MySql();
            $datos = $database->eliminarRegistro($sql);
        }
}
?>