<?php
require_once "MySql.php";
class Modulo{
    private $_idModulo;
    private $_nombre;
    private $_directorio;

        /**
     * Get the value of _idModulo
     */ 
    public function getIdModulo()
    {
        return $this->_idModulo;
    }

    /**
     * Set the value of _idModulo
     *
     * @return  self
     */ 
    public function setIdModulo($_idModulo)
    {
        $this->_idModulo = $_idModulo;

        return $this;
    }
        /**
     * Get the value of _nombre
     */ 
    public function getNombre()
    {
        return $this->_nombre;
    }

        /**
     * Set the value of _nombre
     *
     * @return  self
     */ 
    public function setNombre($_nombre)
    {
        $this->_nombre = $_nombre;

        return $this;
    }

        /**
     * Get the value of _directorio
     */ 
    public function getDirectorio()
    {
        return $this->_directorio;
    }

        /**
     * Set the value of _directorio
     *
     * @return  self
     */ 
    public function setDirectorio($_directorio)
    {
        $this->_directorio = $_directorio;

        return $this;
    }

    public function insert(){
        $sql="INSERT INTO `modulo` (`modulo_descripcion`, `modulo_directorio`) VALUES ('{$this->_nombre}', '{$this->_directorio}')";

        $database =new Mysql();
        $database->insertarRegistro($sql);

    }


    public static function obtenerPorIdPerfil($idPerfil){
        $sql="SELECT id_modulo, modulo_descripcion, modulo_directorio FROM modulo
            JOIN perfil_modulo on perfil_modulo.modulo_id_modulo=modulo.id_modulo
            JOIN perfil on perfil_modulo.perfil_id_perfil=perfil.id_perfil 
            WHERE perfil.id_perfil={$idPerfil}  order by modulo_descripcion;";
        $database =new Mysql();
        $datos=$database->consultar($sql);
        $listadoModulos=[];

        if($datos->num_rows > 0){
            while ($registro=$datos->fetch_assoc()){
                $modulo=new Modulo();
                $modulo->_idModulo=$registro['id_modulo'];
                $modulo->_nombre=$registro['modulo_descripcion'];
                $modulo->_directorio=$registro['modulo_directorio'];
                $listadoModulos[]=$modulo;
            }
        }
    return $listadoModulos;}

    public static function obtenerTodos(){
        $sql="SELECT id_modulo,modulo_descripcion,modulo_directorio,modulo_estado FROM modulo order by modulo_descripcion;";
        $database =new Mysql();
        $datos=$database->consultar($sql);
        $listadoModulos=[];

        if($datos->num_rows > 0){
            while ($registro=$datos->fetch_assoc()){
                if($registro['modulo_estado'] ==  1){
                    $modulo=new Modulo();
                    $modulo->_idModulo=$registro['id_modulo'];
                    $modulo->_nombre=$registro['modulo_descripcion'];
                    $modulo->_directorio=$registro['modulo_directorio'];
                    $listadoModulos[]=$modulo;
                }
            }
        }
    return $listadoModulos;
    }

    public function asignarModuloAPerfil($idPerfil){
        $sql="INSERT INTO `perfil_modulo` (`perfil_id_perfil`, `modulo_id_modulo`) VALUES ({$idPerfil},$this->_idModulo);
        ";
        $database =new Mysql();
        $datos=$database->insertarRegistro($sql);
    }

    public static function eliminarRelacionModuloPerfil($idPerfil, $idModulo){
        $sqlId="SELECT id_perfil_modulo FROM perfil_modulo WHERE perfil_id_perfil={$idPerfil} and modulo_id_modulo= {$idModulo}";
        $database=new Mysql();
        $dato=$database->consultar($sqlId);
        $registro=$dato->fetch_assoc();
        $idPerfilModulo=$registro["id_perfil_modulo"];

        $sql="DELETE FROM `perfil_modulo` WHERE (`id_perfil_modulo` = {$idPerfilModulo});";
    
        $database->eliminarRegistro($sql);

    }

    public function eliminarTodaRelacionPerfiles($idPerfil){
        $sql="DELETE FROM perfil_modulo WHERE perfil_id_perfil={$idPerfil}";
    
        $database=new Mysql();
        $database->eliminarRegistro($sql);
    
    }

    public static function eliminar($idModulo){
        $sql="UPDATE `modulo` SET `modulo_estado` = '2' WHERE (`id_modulo` = '{$idModulo}');" ;
    
        $database=new Mysql();
        $database->actualizar($sql);
    
    }

    public static function obtenerPorId($idModulo){
        $sql="SELECT id_modulo, modulo_descripcion, modulo_directorio FROM modulo WHERE id_modulo={$idModulo};";

        $database =new Mysql();
        $datos=$database->consultar($sql);

        if($datos->num_rows > 0){
            $registro=$datos->fetch_assoc();
            $modulo=new Modulo();
            $modulo->_idModulo=$registro['id_modulo'];
            $modulo->_nombre=$registro['modulo_descripcion'];
            $modulo->_directorio=$registro['modulo_directorio'];
            }
        
        return $modulo;
    }

    public function actualizarModulo(){
        $sql="UPDATE `modulo` SET `modulo_descripcion` = '{$this->_nombre}', `modulo_directorio` = '{$this->_directorio}' WHERE (`id_modulo` = '{$this->_idModulo}');" ;
        
        $database=new Mysql();

        $database->actualizar($sql);
    
    }
    










}

?>