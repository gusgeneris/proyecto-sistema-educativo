<?php
    require_once "MySql.php";

    class Asistencia{
        private $_idAsistencia;
        private $_idClase;
        private $_idAlumno;
        private $_idEstado;

        /**
         * Get the value of _idAsistencia
         */ 
        public function getIdAsistencia()
        {
                return $this->_idAsistencia;
        }

        /**
         * Set the value of _idAsistencia
         *
         * @return  self
         */ 
        public function setIdAsistencia($_idAsistencia)
        {
                $this->_idAsistencia = $_idAsistencia;

                return $this;
        }

        /**
         * Get the value of _idClase
         */ 
        public function getIdClase()
        {
                return $this->_idClase;
        }

        /**
         * Set the value of _idClase
         *
         * @return  self
         */ 
        public function setIdClase($_idClase)
        {
                $this->_idClase = $_idClase;

                return $this;
        }

        /**
         * Get the value of _idAlumno
         */ 
        public function getIdAlumno()
        {
                return $this->_idAlumno;
        }

        /**
         * Set the value of _idAlumno
         *
         * @return  self
         */ 
        public function setIdAlumno($_idAlumno)
        {
                $this->_idAlumno = $_idAlumno;

                return $this;
        }

        /**
         * Get the value of _idEstado
         */ 
        public function getIdEstado()
        {
                return $this->_idEstado;
        }

        /**
         * Set the value of _idEstado
         *
         * @return  self
         */ 
        public function setIdEstado($_idEstado)
        {
                $this->_idEstado = $_idEstado;

                return $this;
        }


        private function crearAsistencia($asistencia,$registro){
            $asistencia->setIdAsistencia($registro['id_asistencia']);
            $asistencia->setIdClase($registro['clase_id_clase']);
            $asistencia->setIdAlumno($registro['alumno_id_alumno']);
            $asistencia->setIdEstado($registro['estado_id_estado']);

            return $asistencia;
        }

        public function insertAlumnos(){
            $sql="INSERT INTO `sistema_educativo`.`asistencia` (`clase_id_clase`, `alumno_id_alumno`) VALUES ('{$this->_idClase}', '{$this->_idAlumno}');";

            $dataBase= new Mysql();
            $dataBase->insertarRegistro($sql);
        }

        public function registrarAsistencia(){
            $sql="UPDATE `asistencia` SET `estado_asistencia_id_estado_asistencia` = '1' WHERE (`alumno_id_alumno` = '{$this->_idAlumno}') AND (`clase_id_clase` = '{$this->_idClase}');
            ";

            $dataBase= new Mysql();
            $dataBase->actualizar($sql);
        }

        


    }





?>