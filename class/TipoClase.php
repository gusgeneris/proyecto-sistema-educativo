<?php
    Class TipoClase{
        private $_idTipoClase;
        private $_detalle;


        /**
         * Get the value of _detalle
         */ 
        public function getDetalle()
        {
                return $this->_detalle;
        }

        /**
         * Set the value of _detalle
         *
         * @return  self
         */ 
        public function setDetalle($_detalle)
        {
                $this->_detalle = $_detalle;

                return $this;
        }

        /**
         * Get the value of _idTipoClase
         */ 
        public function getIdTipoClase()
        {
                return $this->_idTipoClase;
        }

        /**
         * Set the value of _idTipoClase
         *
         * @return  self
         */ 
        public function setIdTipoClase($_idTipoClase)
        {
                $this->_idTipoClase = $_idTipoClase;

                return $this;
        }

        private function crearTipo($tipo,$registro){
            
            $tipo->setIdTipoClase($registro['id_tipo_clase']);
            $tipo->setTipoDetalle($registro['id_detalle_tipo']);

            return $tipo;
        }

        public static function obtenerTodos()
        {
            $sql = "SELECT id_tipo_clase, tipo_detalle FROM tipo_clase";
            $database = new MySQL();
            $datos = $database->consultar($sql);
    
            $listadoTipoClases = [];
    
            while ($registro = $datos->fetch_assoc()) {
                $tipoClase = new TipoClase();
                $tipoClase->_idTipoClase = $registro["id_tipo_clase"];
                $tipoClase->_detalle = $registro["tipo_detalle"];
                $listadoTipoClases[] = $tipoClase;
            }
    
    
            return $listadoTipoClases;
    
        }
    
        public static function obtenerPorId($idTipoClase)
        {
            $sql = "SELECT id_tipo_clase, tipo_detalle FROM tipo_clase WHERE id_tipo_clase={$idTipoClase}";
            $database = new MySQL();
            $datos = $database->consultar($sql);
    
            $registro = $datos->fetch_assoc();
            $tipoClase = new TipoClase();
            $tipoClase->_idTipoClase = $registro["id_tipo_clase"];
            $tipoClase->_detalle = $registro["tipo_detalle"];
    
    
            return $tipoClase;
    
        }
    
        public function insert(){
            $sql="INSERT INTO tipo_clase (`tipo_detalle`) VALUES ('{$this->_detalle}')";
    
            
            $database = new MySQL();
            $database->insertarRegistro($sql);
            
        }
    
        public static function darBaja($idTipoClase){
    
            $sql="UPDATE tipo_clase SET `estado` = '2' WHERE (`id_tipo_clase` = $idTipoClase)";
            $database = new MySQL();
            $database->actualizar($sql);
    
    
        }
    
        public function modificar(){
            $sql="UPDATE tipo_clase SET `tipo_detalle` = {$this->_detalle} WHERE (`id_tipo_clase` = '{$this->_idTipoClase}')";
            $database = new MySQL();
            $database->actualizar($sql);
    
        }

    }















?>