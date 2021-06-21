<?php
require_once "persona.php";
require_once "mysql.php";
require_once "sexo.php";
require_once "Perfil.php";

class Usuario extends Persona {
    protected $_idUsuario;
    protected $_idPerfil;
    protected $_nombreUsuario;
    protected $_contraseña;

    public $perfil;


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


    static private function crear_usuario($user,$registro) {
        $user->_idUsuario= $registro['id_usuario'];
        $user->_idPersona= $registro['id_persona'];
        $user->_nombre= $registro['persona_nombre'];
        $user->_apellido= $registro['persona_apellido'];
        $user->_fechaNacimiento= $registro['persona_fecha_nac'];
        $user->_dni= $registro['persona_dni'];
        $user->_nacionalidad= $registro['persona_nacionalidad'];
        $user->_nombreUsuario= $registro['usuario_nombre'];
        $user->_contraseña= $registro['usuario_contrasenia'];
        $user->_idSexo= $registro['sexo_id_sexo'];
        $user->_idPerfil= $registro['perfil_id_perfil'];
        $user->perfil= Perfil::perfilPorId($user->_idPerfil);

        return $user;

    }

    static function obtenerTodos($filtroEstado = 0, $filtroApellido = ""){
        $sql = "SELECT usuario.id_usuario,usuario.usuario_nombre,usuario.usuario_contrasenia,
                    persona.id_persona,persona.persona_fecha_nac, persona.persona_nombre,
                    persona.persona_apellido,persona.persona_nacionalidad,persona.persona_dni,sexo_id_sexo,perfil_id_perfil, estado_id_estado FROM usuario 
                JOIN persona on persona.id_persona=usuario.persona_id_persona ";

        $where = "";

        if($filtroEstado!=0){
            $where.="WHERE persona.estado_id_estado={$filtroEstado}";
        };

        if($filtroApellido != ""){
            if($where!= ""){
                $where.=" AND persona.persona_apellido like '%{$filtroApellido}%'";
            }else{
                $where= "WHERE persona.persona_apellido like '%{$filtroApellido}%'";
            }
        }
        $sql.=$where;

        $db = new MySql();
        $datos = $db->consultar($sql);

        $listadoUsuarios = [];

        while ($registro = $datos->fetch_assoc()){
            #if($registro['estado_id_estado']==1){

            $user=new Usuario();
            $user->crear_usuario($user,$registro);

            $listadoUsuarios[]=$user;
            
        }

        return $listadoUsuarios;
    }


    public static function login($nombreUsuario,$contrasenia){
        $sql= "SELECT usuario.id_usuario,usuario.usuario_nombre,usuario.usuario_contrasenia,
        persona.id_persona,persona.persona_fecha_nac, persona.persona_nombre,
        persona.persona_apellido,persona.persona_nacionalidad,persona.persona_dni,
        sexo_id_sexo,perfil_id_perfil,estado_id_estado
        FROM usuario 
        JOIN persona on persona.id_persona=usuario.persona_id_persona
        WHERE usuario_nombre='{$nombreUsuario}' AND usuario_contrasenia='{$contrasenia}'";
        
        $database=new MySql();
        $datos = $database->consultar($sql);

        $user=new Usuario();
        if($datos->num_rows > 0){

            $registro=$datos->fetch_assoc();

            if($registro['estado_id_estado']==1){

                $user->crear_usuario($user,$registro);
                $user->_estado= 1;
    
            } else {
                $user->_estado= 2;
            }
        }
        return $user;
    }

    public function insertUser(){
        
        parent::insertPersona();

        $database=new MySql();

        $sql = "INSERT INTO usuario (usuario_nombre,usuario_contrasenia,perfil_id_perfil,persona_id_persona) VALUES ('{$this->_nombreUsuario}','{$this->_contraseña}','{$this->_idPerfil}','{$this->_idPersona}')";
        
        $database->insertarRegistro($sql);

    }

    public static function obtenerTodoPorId($id){
        $sql = "SELECT usuario.id_usuario,usuario.usuario_nombre,usuario.usuario_contrasenia,
        persona.id_persona,persona.persona_fecha_nac, persona.persona_nombre,
        persona.persona_apellido,persona.persona_nacionalidad,persona.persona_dni,sexo_id_sexo,perfil_id_perfil FROM usuario 
        JOIN persona on persona.id_persona=usuario.persona_id_persona WHERE id_usuario={$id}";

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

    public function actualizarUsuario(){

        parent::actualizarPersona();

        $database = new MySql();
        $sql = "UPDATE `usuario` SET `usuario_nombre` = '{$this->_nombreUsuario}',`perfil_id_perfil` = '{$this->_idPerfil}' WHERE (`id_usuario` = '{$this->_idUsuario}');";

        $database->actualizar($sql);


    }


 
}
