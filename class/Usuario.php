<?php
require_once "persona.php";
require_once "mysql.php";

class Usuario extends Persona {
    protected $_idPersona;
    private $_idUsuario;
    protected $_idPerfil;
    protected $_nombreUsuario;
    protected $_contraseña;

    protected $_perfil;
    protected $_estaLogeado;


    /**
     * Get the value of _idUsuario
     */ 
    public function getIdUsuario()
    {
        return $this->_idUsuario;
    }
    public function setIdPersona($_idPersona)
    {
        $this->_idPersona = $_idPersona;

        return $this;
    }

    /**
     * Set the value of _idUsuario
     *
     * @return  self
     */ 
    public function setIdUsuario($_idUsuario)
    {
        $this->_idUsuario = $_idUsuario;

        return $this;
    }


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
     * Get the value of _nombreUsuario
     */ 
    public function getNombreUsuario()
    {
        return $this->_nombreUsuario;
    }

    /**
     * Set the value of _nombreUsuario
     *
     * @return  self
     */ 
    public function setNombreUsuario($_nombreUsuario)
    {
        $this->_nombreUsuario = $_nombreUsuario;

        return $this;
    }

    /**
     * Get the value of _contraseña
     */ 
    public function getContraseña()
    {
        return $this->_contraseña;
    }

    /**
     * Set the value of _contraseña
     *
     * @return  self
     */ 
    public function setContraseña($_contraseña)
    {
        $this->_contraseña = $_contraseña;

        return $this;
    }

    /**
     * Get the value of _perfil
     */ 
    public function getPerfil()
    {
        return $this->_perfil;
    }

    /**
     * Set the value of _perfil
     *
     * @return  self
     */ 
    public function setPerfil($_perfil)
    {
        $this->_perfil = $_perfil;

        return $this;
    }

        /**
     * Get the value of _estaLogeado
     */ 
    public function estaLogeado()
    {
        return $this->_estaLogeado;
    }

       /**
     * Set the value of _estaLogeado
     *
     * @return  self
     */ 
    public function set_estaLogeado($_estaLogeado)
    {
        $this->_estaLogeado = $_estaLogeado;

        return $this;
    }

    static private function crear_usuario($user,$registro) {
        $user->_idUsuario= $registro['id_usuario'];
        $user->_idPersona= $registro['id_persona'];
        $user->_nombre= $registro['persona_nombre'];
        $user->_apellido= $registro['persona_apellido'];
        $user->_fechaNacimiento= $registro['persona_fecha_nacimiento'];
        $user->_dni= $registro['persona_dni'];
        $user->_nacionalidad= $registro['persona_nacionalidad'];
        $user->_nombreUsuario= $registro['usuario_nombre'];
        $user->_contraseña= $registro['usuario_contrasenia'];

        return $user;

    }

    static function obtenerTodos(){
        $sql = "SELECT usuario.id_usuario,usuario.usuario_nombre,usuario.usuario_contrasenia,
                    persona.id_persona,persona.persona_fecha_nacimiento, persona.persona_nombre,
                    persona.persona_apellido,persona.persona_nacionalidad,persona.persona_dni FROM usuario 
                JOIN persona on persona.id_persona=usuario.id_persona";

        $db = new MySql();
        $datos = $db->consultar($sql);

        $listadoUsuarios = [];

        while ($registro = $datos->fetch_assoc()){
            
            $user=new Usuario();
            $user->crear_usuario($user,$registro);

            $listadoUsuarios[]=$user;
        }

        return $listadoUsuarios;
    }

    public static function eliminarPorId($idUsuario){
        $sql = "DELETE FROM usuario WHERE id_usuario={$idUsuario}";

        $db = new MySql();
        $datos = $db->eliminarRegistro($sql);

    }

    public static function login($nombreUsuario,$contrasenia){
        $sql= "SELECT usuario.id_usuario,usuario.usuario_nombre,usuario.usuario_contrasenia,
        persona.id_persona,persona.persona_fecha_nacimiento, persona.persona_nombre,
        persona.persona_apellido,persona.persona_nacionalidad,persona.persona_dni, usuario.estado FROM usuario 
        JOIN persona on persona.id_persona=usuario.id_persona
        WHERE usuario_nombre='{$nombreUsuario}' AND usuario_contrasenia='{$contrasenia}'";
        
        $database=new MySql();
        $datos = $database->consultar($sql);

        $user=new Usuario();
        if($datos->num_rows > 0){

            $registro=$datos->fetch_assoc();

            if($registro['estado']==1){

                $user->crear_usuario($user,$registro);
                $user->_estaLogeado= 1;
    
            } else {
                $user->_estaLogeado= 2;
            }
        }
        return $user;
    }

    public static function insertUser($personaNombre,$personaApellido,$personaDni,$personaFechaNac,$personaEstado,$personaSexo,$nombreUser,$contrasenia){
        
        $idPersona=Persona::insertPersona($personaNombre,$personaApellido,$personaDni,$personaFechaNac,$personaEstado,$personaSexo)->getIdPersona();
        
        /*$persona=new Persona;
        $persona->insertPersona($personaNombre,$personaApellido,$personaDni,$personaFechaNac,$personaEstado,$personaSexo);
        $idPersona=$persona->getIdPersona();*/

        highlight_string(var_export($idPersona));
        
        $sql = "INSERT INTO usuario (usuario_nombre,usuario_contrasenia,perfil_id_perfil,persona_id_persona) VALUES ('{$nombreUser}','{$contrasenia}','1','{$idPersona}')";

        $database=new MySql();
        $datos= $database->insertarRegistro($sql);
        

        $conex=$database->getConexion();
        $idUser=mysqli_insert_id($conex);



        $user=new Usuario();
        $user->setIdUsuario($idUser);
        $user->setNombreUsuario($nombreUser);
        $user->setContraseña($contrasenia);
        $user->setIdPersona($idPersona);
        $user->setPerfil('1');
        $user->setNombre($personaNombre);
        $user->setApellido($personaApellido);
        $user->setFechaNacimiento($personaFechaNac);
        $user->setDni($personaDni);
        $user->setIdPerfil('1');
        $user->set_estaLogeado('1');

        highlight_string(var_export($user,true));

    }


 
}







?>