<?php
require_once "Mysql.php";
require_once "Materia.php";

Class Carrera{
    private $_idCarrera;
    private $_nombre;
    private $_duracionAnios;
    private $_estado;
    private $_arrMateria;

    public function __toString() {
        return "{$this->_nombre}";
    }
    

    /**
     * Get the value of _idCarrera
     */ 
    public function getIdCarrera()
    {
        return $this->_idCarrera;
    }

    /**
     * Set the value of _idCarrera
     *
     * @return  self
     */ 
    public function setIdCarrera($_idCarrera)
    {
        $this->_idCarrera = $_idCarrera;

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
     * Get the value of _duracionAnios
     */ 
    public function getDuracionAnios()
    {
        return $this->_duracionAnios;
    }

    /**
     * Set the value of _duracionAnios
     *
     * @return  self
     */ 
    public function setDuracionAnios($_duracionAnios)
    {
        $this->_duracionAnios = $_duracionAnios;

        return $this;
    }

    
    /**
     * Get the value of _estado
     */ 
    public function getEstado()
    {
        return $this->_estado;
    }

    /**
     * Set the value of _estado
     *
     * @return  self
     */ 
    public function setEstado($_estado)
    {
        $this->_estado = $_estado;

        return $this;
    }

    public function insert(){

        $sql="INSERT INTO `carrera` ( `carrera_nombre`, `carrera_duracion_anios`) VALUES ( '{$this->_nombre}', '{$this->_duracionAnios}');";
        $database=new Mysql();
        $idCarrera=$database->insertarRegistro($sql);
        $this->_idCarrera=$idCarrera;
    }

    public function asignarCiclo($idCicloLectivo,$idCarrera){
        $sql="INSERT INTO `ciclo_lectivo_carrera` (`ciclo_lectivo_id_ciclo_lectivo`, `carrera_id_carrera`) VALUES ($idCicloLectivo,$idCarrera);
        ";
        $database=new Mysql();
        $database->insertarRegistro($sql);

    }

    public function listadoCarreras($filtroEstado=0,$filtroNombre=""){

        $sql="SELECT id_carrera, carrera_nombre, carrera_duracion_anios, estado_id_estado FROM carrera ";

        $where="";

        if($filtroEstado!=0){
            $where.=" WHERE estado_id_estado='$filtroEstado' ";
        };

        if($filtroNombre != ""){
            if($where!= ""){
                $where.=" AND carrera.carrera_nombre like '%{$filtroNombre}%'";
            }else{
                $where= " WHERE carrera.carrera_nombre like '%{$filtroNombre}%'";
            }
        }
        $sql.=$where;

        $database=new Mysql();
        $datos=$database->consultar($sql);
        $listadoCarreras=[];
        
        while ($registro = $datos->fetch_assoc()){
            #if ($registro['estado_id_estado']==1){
                $carrera=new Carrera();
                $carrera->crearCarrera($registro,$carrera);

                $listadoCarreras[]=$carrera;
        }
        return $listadoCarreras;
        
    }

    public static function listadoPorId($idCarrera){
        $sql="SELECT id_carrera, carrera_nombre, carrera_duracion_anios, estado_id_estado FROM carrera WHERE id_carrera= {$idCarrera};";
        $database=new Mysql();
        $datos=$database->consultar($sql);

        $carrera=new Carrera();
        $registro=$datos->fetch_assoc();
        $carrera->crearCarrera($registro,$carrera);
        return $carrera;
    }

    public function modificar(){
        $sql="UPDATE `carrera` SET `carrera_nombre` = '{$this->_nombre}', `carrera_duracion_anios` = '{$this->_duracionAnios}' WHERE (`id_carrera` = '{$this->_idCarrera}');";

        $database=new Mysql();
        $database->actualizar($sql);
    }

    public static function darDeBaja($idCarrera){
        $sql="UPDATE `carrera` SET `estado_id_estado` = '2' WHERE (`id_carrera` = '{$idCarrera}');";
        $database=new Mysql();
        $database->actualizar($sql);
    }

    private function crearCarrera($registro,$carrera){
        
        $carrera->setIdCarrera($registro['id_carrera']);
        $carrera->setNombre($registro['carrera_nombre']);
        $carrera->setDuracionAnios($registro['carrera_duracion_anios']);
        $carrera->setEstado($registro['estado_id_estado']);
        #$carrera->_arrMateria = Materia:: listadoPorIdCarrera($carrera->_idCarrera);
    
        return $carrera;

    }
    public static function listadoCarrerasPorCicloLectivo($idCicloLectivo){

        $sql="SELECT id_carrera, carrera_nombre,carrera_duracion_anios,estado_id_estado, ciclo_lectivo_carrera.ciclo_lectivo_carrera_estado from carrera JOIN ciclo_lectivo_carrera on ciclo_lectivo_carrera.carrera_id_carrera=carrera.id_carrera JOIN ciclo_lectivo on ciclo_lectivo_carrera.ciclo_lectivo_id_ciclo_lectivo=ciclo_lectivo.id_ciclo_lectivo WHERE ciclo_lectivo.id_ciclo_lectivo= $idCicloLectivo ";

        $database=new Mysql();
        $datos=$database->consultar($sql);
        $listadoCarreras=[];

        if($datos->num_rows > 0){
        
            while ($registro = $datos->fetch_assoc()){
                if ($registro['ciclo_lectivo_carrera_estado']==1){
                $carrera=new Carrera();
                $carrera->crearCarrera($registro,$carrera);

                $listadoCarreras[]=$carrera;}
            }
        }
        return $listadoCarreras;
        
    }

    public static function eliminarRelacionCiclo($idCicloLectivo,$idCarrera){
        $sqlId="SELECT id_ciclo_lectivo_carrera FROM ciclo_lectivo_carrera WHERE ciclo_lectivo_id_ciclo_lectivo={$idCicloLectivo} AND carrera_id_carrera={$idCarrera};";

        $database =new Mysql();
        $dato=$database->consultar($sqlId);
        $registro=$dato->fetch_assoc();
        $idCicloLectivoCarrera=$registro["id_ciclo_lectivo_carrera"];
        $sql="UPDATE ciclo_lectivo_carrera SET `ciclo_lectivo_carrera_estado` = '2' WHERE (`id_ciclo_lectivo_carrera` = {$idCicloLectivoCarrera})";
        $database->eliminarRegistro($sql);

    }

    public static function darAlta($idCarrera){
        $sql="UPDATE `sistema_educativo`.`carrera` SET `estado_id_estado` = '1' WHERE (`id_carrera` = {$idCarrera});
        ";

        $database=new Mysql();
        $database->actualizar($sql);
        return true;
    }

}

?>