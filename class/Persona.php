<?php
require_once "Mysql.php";
require_once "Sexo.php";

class Persona{
    protected $_idPersona;
    protected $_nombre;
    protected $_apellido;
    protected $_fechaNacimiento;
    protected $_dni;
    protected $_idSexo;
    protected $_nacionalidad;
    protected $_estado;

    public function __toString() {
        return "{$this->_nombre},{$this->_apellido}";
    }
     
        /**
     * Get the value of _sexo
     */ 
    public function getIdSexo()
    {
        return $this->_idSexo;
    }

    /**
     * Set the value of _sexo
     *
     * @return  self
     */ 
    public function setIdSexo($_idSexo)
    {
        $this->_idSexo = $_idSexo;

        return $this;
    }
    


    /**
     * Get the value of _idPersona
     */ 
    public function getIdPersona()
    {
        return $this->_idPersona;
    }

    /**
     * Set the value of _idPersona
     *
     * @return  self
     */ 
    public function setIdPersona($_idPersona)
    {
        $this->_idPersona = $_idPersona;

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
     * Get the value of _apellido
     */ 
    public function getApellido()
    {
        return $this->_apellido;
    }

    /**
     * Set the value of _apellido
     *
     * @return  self
     */ 
    public function setApellido($_apellido)
    {
        $this->_apellido = $_apellido;

        return $this;
    }

    /**
     * Get the value of _fechaNacimiento
     */ 
    public function getFechaNacimiento()
    {
        return $this->_fechaNacimiento;
    }

    /**
     * Set the value of _fechaNacimiento
     *
     * @return  self
     */ 
    public function setFechaNacimiento($_fechaNacimiento)
    {
        $this->_fechaNacimiento = $_fechaNacimiento;

        return $this;
    }

    /**
     * Get the value of _dni
     */ 
    public function getDni()
    {
        return $this->_dni;
    }

    /**
     * Set the value of _dni
     *
     * @return  self
     */ 
    public function setDni($_dni)
    {
        $this->_dni = $_dni;

        return $this;
    }

    /**
     * Get the value of _nacionalidad
     */ 
    public function getNacionalidad()
    {
        return $this->_nacionalidad;
    }

    /**
     * Set the value of _nacionalidad
     *
     * @return  self
     */ 
    public function setNacionalidad($_nacionalidad)
    {
        $this->_nacionalidad = $_nacionalidad;

        return $this;
    }

        /**
     * Get the value of _estado
     */ 
    public function get_estado()
    {
        return $this->_estado;
    }

    /**
     * Set the value of _estado
     *
     * @return  self
     */ 
    public function set_estado($_estado)
    {
        $this->_estado = $_estado;

        return $this;
    }

    public  function insertPersona(){
        $database=new Mysql();

        $sql="INSERT INTO persona (`persona_nombre`, `persona_apellido`, `persona_dni`, `persona_fecha_nac`, `sexo_id_sexo`,`persona_nacionalidad`) 
            VALUES ('{$this->_nombre}', '{$this->_apellido}', '{$this->_dni}', '{$this->_fechaNacimiento}', '{$this->_idSexo}', '{$this->_nacionalidad}');";

        
        $idPersona=$database->insertarRegistro($sql);
        $this->_idPersona = $idPersona;

    }

    public function actualizarPersona(){

        $database=new MySql();

        $sql="UPDATE `persona` SET `persona_nombre` = '{$this->_nombre}', `persona_apellido` = '{$this->_apellido}', `persona_dni` = '{$this->_dni}', `persona_fecha_nac` = '{$this->_fechaNacimiento}', `persona_nacionalidad` = '{$this->_nacionalidad}',`sexo_id_sexo` = '{$this->_idSexo}' WHERE (`id_persona` = '{$this->_idPersona}')";
        
        $database->actualizar($sql);

    }
    
    public static function darDeBaja($idPersona){
        $sql = "UPDATE `persona` SET `estado_id_estado` = '2' WHERE (`id_persona` = '$idPersona')";

        $db = new MySql();
        $datos = $db->eliminarRegistro($sql);

    }
}




?>