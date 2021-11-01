<?php

require_once "MySQL.php";



class Contacto {

	private $_idContactoPersona;
	private $_idPersona;
	private $_idTipoContacto;
	private $_valor;

	private $_descripcion;

	public function getDescripcion() {
		return $this->_descripcion;
	}

	public function getValor() {
		return $this->_valor;
	}

	public function getIdContactoPersona() {
		return $this->_idContactoPersona;
	}

	public function getIdPersona() {
		return $this->_idPersona;
	}

	public function setIdPersona($idPersona) {
		$this->_idPersona = $idPersona;
	}

	public function setIdTipoContacto($idTipoContacto) {
		$this->_idTipoContacto = $idTipoContacto;
	}

	public function setValor($valor) {
		$this->_valor = $valor;
	}

	public static function obtenerPorIdPersona($idPersona) {
		$sql = "SELECT id_tipo_contacto_persona , tipo_contacto_persona.tipo_contacto_persona_valor,tipo_contacto_persona.tipo_contacto_id_tipo_contacto,tipo_contacto_persona.persona_id_persona, tipo_contacto.tipo_contacto_descripcion ". 
			"FROM tipo_contacto_persona ".
			"JOIN persona on persona.id_persona=tipo_contacto_persona.persona_id_persona ".
			"JOIN tipo_contacto on tipo_contacto.id_tipo_contacto=tipo_contacto_persona.tipo_contacto_id_tipo_contacto ".
			"WHERE tipo_contacto_persona.persona_id_persona={$idPersona}";


        $database = new MySQL();
        $datos = $database->consultar($sql);

    	$listadoContactos = [];

    	while ($registro = $datos->fetch_assoc()) {
	    	$contacto = new Contacto();
			$contacto->_idContactoPersona = $registro["id_tipo_contacto_persona"];
			$contacto->_idPersona = $registro["persona_id_persona"];
			$contacto->_idTipoContacto = $registro["tipo_contacto_id_tipo_contacto"];
			$contacto->_valor = $registro["tipo_contacto_persona_valor"];
			$contacto->_descripcion = $registro["tipo_contacto_descripcion"];
    		$listadoContactos[] = $contacto;
    	}


    	return $listadoContactos;

	}

	public function guardar() {
		$sql = "INSERT INTO tipo_contacto_persona "
		     . "(persona_id_persona, tipo_contacto_id_tipo_contacto, tipo_contacto_persona_valor) "
		     . "VALUES ({$this->_idPersona}, {$this->_idTipoContacto}, '{$this->_valor}')";

        $database = new MySQL();
        $idInsertado = $database->insertarRegistro($sql);

        $this->_idContactoPersona = $idInsertado;
	}

	public function eliminar() {
		$sql = "DELETE FROM tipo_contacto_persona WHERE id_contacto_persona={$this->_idContactoPersona}";
        $database = new MySQL();
        $database->eliminarRegistro($sql);
	}

    public static function obtenerPorId($idContactoPersona){
        $sql = "SELECT id_contacto_persona , tipo_contacto_persona.tipo_contacto_persona_valor,tipo_contacto_persona.tipo_contacto_id_tipo_contacto,tipo_contacto_persona.persona_id_persona, tipo_contacto.tipo_contacto_descripcion FROM
        tipo_contacto_persona JOIN persona on persona.id_persona=tipo_contacto_persona.persona_id_persona JOIN
        tipo_contacto on tipo_contacto.id_tipo_contacto=tipo_contacto_persona.tipo_contacto_id_tipo_contacto
        WHERE id_contacto_persona={$idContactoPersona}";

        $database = new MySQL();
        $datos = $database->consultar($sql);

    	$registro = $datos->fetch_assoc();
    	$contacto = new Contacto();
		$contacto->_idContactoPersona = $registro["id_contacto_persona"];
		$contacto->_idPersona = $registro["persona_id_persona"];
		$contacto->_idTipoContacto = $registro["tipo_contacto_id_tipo_contacto"];
		$contacto->_valor = $registro["tipo_contacto_persona_valor"];
		$contacto->_descripcion = $registro["tipo_contacto_descripcion"];
    	return $contacto;
    }

    
}


?>