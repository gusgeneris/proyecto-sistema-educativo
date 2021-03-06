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

        public static function reporteInasistencia($idAlumno,$idCurriculaCarrera){
                $sql="SELECT persona_nombre,persona_apellido,persona_dni,alumno_id_alumno from asistencia ".
                        "JOIN estado_asistencia on id_estado_asistencia=estado_asistencia_id_estado_asistencia ".
                        "JOIN clase on id_clase=clase_id_clase ".
                        "JOIN curricula_carrera on id_curricula_carrera = curricula_carrera_id_curricula_carrera ".
                        "JOIN alumno on alumno_id_alumno=id_alumno ". 
                        "JOIN persona on id_persona = persona_id_persona ". 
                        "WHERE id_curricula_carrera={$idCurriculaCarrera} and id_alumno={$idAlumno}  group by estado_asistencia_detalle order by persona_apellido;";
                        
                $dataBase= new Mysql();
                $dato= $dataBase->consultar($sql);

                $listado=array();
                
                $registro = $dato->fetch_assoc();

                        $nombre=$registro['persona_nombre'];
                        $apellido=$registro['persona_apellido'];
                        $dni=$registro['persona_dni'];
                        array_push($listado,array($nombre,$apellido,$dni));
                
                return $listado;
        }
        public static function reporteAsistencia($idAlumno,$idCurriculaCarrera){
                $sql="SELECT persona_nombre,persona_apellido,persona_dni,count(estado_asistencia_detalle) as cantidad_faltas,estado_asistencia_detalle,alumno_id_alumno from asistencia ".
                        "JOIN estado_asistencia on id_estado_asistencia=estado_asistencia_id_estado_asistencia ".
                        "JOIN clase on id_clase=clase_id_clase ".
                        "JOIN curricula_carrera on id_curricula_carrera = curricula_carrera_id_curricula_carrera ".
                        "JOIN alumno on alumno_id_alumno=id_alumno ". 
                        "JOIN persona on id_persona = persona_id_persona ". 
                        "WHERE id_curricula_carrera={$idCurriculaCarrera} and id_alumno={$idAlumno} and estado_asistencia_detalle='Presente' group by estado_asistencia_detalle;";
                        
                $dataBase= new Mysql();
                $dato= $dataBase->consultar($sql);

                $listado=array();
                
                $registro = $dato->fetch_assoc();

                        $nombre=$registro['persona_nombre'];
                        $apellido=$registro['persona_apellido'];
                        $dni=$registro['persona_dni'];
                        $cantidadFaltas=$registro['cantidad_faltas'];
                        array_push($listado,array($nombre,$apellido,$dni,$cantidadFaltas));
                
                return $cantidadFaltas;
        }

        public static function porcentajeAsistencia($cantidadClases,$cantidadAsistencias){

                $porcentajeAsistencia=round(($cantidadAsistencias/$cantidadClases)*100);
                
                return $porcentajeAsistencia;

        }
        

    }


?>