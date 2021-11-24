<?php

require_once "MySQL.php";



class TipoContacto {

	private $_idTipoContacto;
	private $_descripcion;
	private $_estado;

	public function setIdTipoContacto($idTipoContacto)
	{
		$this->_idTipoContacto = $idTipoContacto;

		return $this;
	}

	public function getIdTipoContacto() {
		return $this->_idTipoContacto;
	}

	public function getDescripcion() {
		return $this->_descripcion;
	}

	/**
	 * Set the value of _descripcion
	 *
	 * @return  self
	 */ 
	public function setDescripcion($_descripcion)
	{
		$this->_descripcion = $_descripcion;

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

	public static function obtenerTodos()
	{
		$sql = "SELECT estado,id_tipo_contacto, tipo_contacto_descripcion FROM tipo_contacto";
		$database = new MySQL();
		$datos = $database->consultar($sql);

    	$listadoTipoContactos = [];

    	while ($registro = $datos->fetch_assoc()) {
	    	$tipoContacto = new TipoContacto();
			$tipoContacto->_idTipoContacto = $registro["id_tipo_contacto"];
			$tipoContacto->_descripcion = $registro["tipo_contacto_descripcion"];
			$tipoContacto->_estado = $registro["estado"];
    		$listadoTipoContactos[] = $tipoContacto;
    	}


    	return $listadoTipoContactos;

	}

	public static function obtenerTodosActivos()
	{
		$sql = "SELECT estado,id_tipo_contacto, tipo_contacto_descripcion FROM tipo_contacto";
		$database = new MySQL();
		$datos = $database->consultar($sql);

    	$listadoTipoContactos = [];

    	while ($registro = $datos->fetch_assoc()) {
			if($registro['estado']==1){
	    	$tipoContacto = new TipoContacto();
			$tipoContacto->_idTipoContacto = $registro["id_tipo_contacto"];
			$tipoContacto->_descripcion = $registro["tipo_contacto_descripcion"];
			$tipoContacto->_estado = $registro["estado"];
    		$listadoTipoContactos[] = $tipoContacto;
			}
    	}


    	return $listadoTipoContactos;

	}


	public static function obtenerPorId($idTipoContacto)
	{
		$sql = "SELECT id_tipo_contacto, tipo_contacto_descripcion FROM tipo_contacto WHERE id_tipo_contacto={$idTipoContacto}";
		$database = new MySQL();
		$datos = $database->consultar($sql);

    	$registro = $datos->fetch_assoc();
	    $tipoContacto = new TipoContacto();
		$tipoContacto->_idTipoContacto = $registro["id_tipo_contacto"];
		$tipoContacto->_descripcion = $registro["tipo_contacto_descripcion"];


    	return $tipoContacto;

	}

	public function insert(){
		$sql="INSERT INTO tipo_contacto (`tipo_contacto_descripcion`) VALUES ('{$this->_descripcion}')";

		
		$database = new MySQL();
		$database->insertarRegistro($sql);
		
	}

	public static function darBaja($idTipoContacto){

		$sql="UPDATE tipo_contacto SET `estado` = '2' WHERE (`id_tipo_contacto` = $idTipoContacto)";
		$database = new MySQL();
		$database->actualizar($sql);


	}

	public static function darAlta($idTipoContacto){

		$sql="UPDATE tipo_contacto SET `estado` = '1' WHERE (`id_tipo_contacto` = $idTipoContacto)";
		$database = new MySQL();
		$database->actualizar($sql);
		return true;


	}

	public function modificar(){
		$sql="UPDATE tipo_contacto SET `tipo_contacto_descripcion` = '{$this->_descripcion}' WHERE (`id_tipo_contacto` = '{$this->_idTipoContacto}')";
				
		$database = new MySQL();
		$database->actualizar($sql);

	}


}



?>