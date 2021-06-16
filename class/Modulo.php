<?php
class Modulo{
    private $_idModulo;
    private $_nombre;
    private $_directorio;

        /**
     * Get the value of _nombre
     */ 
    public function getNombre()
    {
        return $this->_nombre;
    }

        /**
     * Get the value of _directorio
     */ 
    public function getDirectorio()
    {
        return $this->_directorio;
    }

    public static function obtenerPorIdPerfil   ($idPerfil){
        $sql="SELECT id_modulo, modulo_descripcion, modulo_directorio FROM modulo
            JOIN perfil_modulo on perfil_modulo.modulo_id_modulo=modulo.id_modulo
            JOIN perfil on perfil_modulo.perfil_id_perfil=perfil.id_perfil 
            WHERE perfil.id_perfil={$idPerfil};";
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





}

?>