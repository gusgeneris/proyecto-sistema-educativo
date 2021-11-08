<?php 
    require_once "MySql.php";

    class PeriodoDesarrollo{
        private $_idPeriodoDesarrollo;
        private $_detallePeriodo;

        

        /**
         * Get the value of _idPeriodoDesarrollo
         */ 
        public function getIdPeriodoDesarrollo()
        {
                return $this->_idPeriodoDesarrollo;
        }

        /**
         * Set the value of _idPeriodoDesarrollo
         *
         * @return  self
         */ 
        public function setIdPeriodoDesarrollo($_idPeriodoDesarrollo)
        {
                $this->_idPeriodoDesarrollo = $_idPeriodoDesarrollo;

                return $this;
        }

         /**
         * Get the value of _detalle
         */ 
        public function getDetallePeriodo()
        {
                return $this->_detallePeriodo;
        }

        /**
         * Set the value of _detalle
         *
         * @return  self
         */ 
        public function setDetallePeriodo($_detallePeriodo)
        {
                $this->_detallePeriodo = $_detallePeriodo;

                return $this;
        }

        public function crearPeriodoDesarrollo($periodoDesarrollo,$registro){
            $periodoDesarrollo->_idPeriodoDesarrollo= $registro['id_periodo_desarrollo'];
            $periodoDesarrollo->_detallePeriodo= $registro['detalle_periodo'];
            $periodoDesarrollo->_estado= $registro['estado'];
            return $periodoDesarrollo;
        }
    
        
        
        public function insert(){
            $sql = "INSERT INTO `periodo_desarrollo` (`detalle_periodo`) VALUES ('$this->_detallePeriodo')";
    
            $database=new Mysql();
    
            $database->insertarRegistro($sql);
        }
    
        public static function listaTodos(){
            $sql= "SELECT id_periodo_desarrollo, detalle_periodo, estado FROM periodo_desarrollo";
            
            $database=new Mysql();
            $datos=$database->consultar($sql);
            $listadoPeriodoDesarrollo=[];
            
            while ($registro = $datos->fetch_assoc()){
                if($registro['estado']==1){
    
                $periodoDesarrollo=new PeriodoDesarrollo();
                $periodoDesarrollo->crearPeriodoDesarrollo($periodoDesarrollo,$registro);
    
                $listadoPeriodoDesarrollo[]=$periodoDesarrollo;
                }
                
            }
    
            return $listadoPeriodoDesarrollo;
    
        }
    
        public static function darDeBaja($idPeriodoDesarrollo){
            $sql = "UPDATE `periodo_desarrollo` SET `estado` = '2' WHERE (`id_periodo_desarrollo` = '$idPeriodoDesarrollo')";
    
            $database= new MySql();
            $datos = $database->eliminarRegistro($sql);
    
        }
    
        public static function obtenerTodoPorId($idPeriodoDesarrollo){
            $sql = "SELECT id_periodo_desarrollo, detalle_periodo, estado from periodo_desarrollo WHERE id_periodo_desarrollo={$idPeriodoDesarrollo};";
            
            $db = new MySql();
            $datos = $db->consultar($sql);
    
            while ($registro = $datos->fetch_assoc()){
    
            $periodoDesarrollo=new PeriodoDesarrollo();
            $periodoDesarrollo->crearPeriodoDesarrollo($periodoDesarrollo,$registro);
    
            }
    
            return $periodoDesarrollo;
    
    
        }
    
    
        public function actualizarPeriodoDesarrollo(){
            $sql = "UPDATE `periodo_desarrollo` SET `detalle_periodo` = '{$this->_detallePeriodo}' WHERE (`id_Periodo_desarrollo` = '{$this->_idPeriodoDesarrollo}')";
            
            $database = new MySql();
            $database->actualizar($sql);
    
        }
   
    }

?>