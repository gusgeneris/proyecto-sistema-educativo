<?php
require_once "persona.php";
require_once "mysql.php";
require_once "sexo.php";
require_once "Perfil.php";

class Usuario extends Persona {
    protected $_idUsuario;
    protected $_idPerfil;
    protected $_nombreUsuario;
    protected $_contrasenia;
    protected $_estado;

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
     * Get the value of _contrasenia
     */ 
    public function getContrasenia()
    {
        return $this->_contrasenia;
    }

    /**
     * Set the value of _contrasenia
     *
     * @return  self
     */ 
    public function setContrasenia($_contrasenia)
    {
        $this->_contrasenia = $_contrasenia;

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


    static private function crear_usuario($user,$registro) {
        $user->_idUsuario= $registro['id_usuario'];
        $user->_idPersona= $registro['id_persona'];
        $user->_nombre= $registro['persona_nombre'];
        $user->_apellido= $registro['persona_apellido'];
        $user->_fechaNacimiento= $registro['persona_fecha_nac'];
        $user->_dni= $registro['persona_dni'];
        $user->_nacionalidad= $registro['persona_nacionalidad'];
        $user->_nombreUsuario= $registro['usuario_nombre'];
        $user->_contrasenia= $registro['usuario_contrasenia'];
        $user->_idSexo= $registro['sexo_id_sexo'];
        $user->_idPerfil= $registro['perfil_id_perfil'];
        $user->_estado= $registro['estado_id_estado'];
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
            #if($registro['estado_id_estado']==1)

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

        $sql="SELECT * FROM usuario where usuario_nombre='{$this->_nombreUsuario}'";

        
        $database=new MySql();
        $dato=$database->consultar($sql);

        if($dato->num_rows == 0){

        
            parent::insertPersona();

            $database=new MySql();

            $sql = "INSERT INTO usuario (usuario_nombre,usuario_contrasenia,perfil_id_perfil,persona_id_persona) VALUES ('{$this->_nombreUsuario}','{$this->_contrasenia}','{$this->_idPerfil}','{$this->_idPersona}')";
            

            $database->insertarRegistro($sql);
            return 1;}
        else{
            return 0;
        }

    }

    public function insertUserDocente($idPersona){
        $sql="INSERT INTO usuario (usuario_nombre,usuario_contrasenia,perfil_id_perfil,persona_id_persona) VALUES ('{$this->_nombreUsuario}','{$this->_contrasenia}','{$this->_idPerfil}','$idPersona')";
        $database=new MySql();
        $database->insertarRegistro($sql);
    }

    public static function obtenerTodoPorId($id){
        $sql = "SELECT usuario.id_usuario,usuario.usuario_nombre,usuario.usuario_contrasenia,
        persona.id_persona,persona.persona_fecha_nac, persona.persona_nombre,
        persona.persona_apellido,persona.persona_nacionalidad,persona.persona_dni,sexo_id_sexo,perfil_id_perfil,estado_id_estado FROM usuario 
        JOIN persona on persona.id_persona=usuario.persona_id_persona WHERE id_usuario={$id}";

        $db = new MySql();
        $datos = $db->consultar($sql);

        $registro = $datos->fetch_assoc();

        $user=new Usuario();
        $user->crear_usuario($user,$registro);

        return $user;



    }

    public function actualizarUsuario(){

        $sql="SELECT * FROM usuario where usuario_nombre='{$this->_nombreUsuario}'";

        $database=new MySql();
        $dato1=$database->consultar($sql);

        
        $sql="SELECT * FROM usuario where usuario_nombre='{$this->_nombreUsuario}' and id_usuario='{$this->_idUsuario}'";

        
        $dato2=$database->consultar($sql);

        if($dato1->num_rows == 0){


            parent::actualizarPersona();

            $database = new MySql();
            $sql = "UPDATE `usuario` SET usuario_contrasenia={$this->_contrasenia},`usuario_nombre` = '{$this->_nombreUsuario}',`perfil_id_perfil` = '{$this->_idPerfil}' WHERE (`id_usuario` = '{$this->_idUsuario}');";


            $database->actualizar($sql);
            return 1;
        }
        elseif($dato2->num_rows == 1){
            parent::actualizarPersona();

            $database = new MySql();
            $sql = "UPDATE `usuario` SET usuario_contrasenia={$this->_contrasenia},`usuario_nombre` = '{$this->_nombreUsuario}',`perfil_id_perfil` = '{$this->_idPerfil}' WHERE (`id_usuario` = '{$this->_idUsuario}');";


            $database->actualizar($sql);
            return 1;
        }
        else{
            return 0;
        }
            


    }

    public static function ultimosUsuariosRegistrados(){
        $sql="select usuario_nombre,persona_nombre,persona_apellido, perfil_nombre from usuario ".
            "join perfil on id_perfil = perfil_id_perfil ".
            "join persona on id_persona = persona_id_persona order by id_usuario desc limit 5";
        
        $dataBase=new MySql();

        $datos=$dataBase->consultar($sql);

        $listadoUsuarios=[];

        while($registro= $datos->fetch_assoc()){
            $usuarioNombre= $registro['usuario_nombre'];
            $personaNombre= $registro['persona_nombre'];
            $personaApellido= $registro['persona_apellido'];
            $perfilNombre= $registro['perfil_nombre'];

            array_push($listadoUsuarios,array($usuarioNombre,$personaNombre,$personaApellido,$perfilNombre));
        }

        return $listadoUsuarios;
    }



}
