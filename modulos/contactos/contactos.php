<?php

require_once "../../class/Contacto.php";
require_once "../../class/TipoContacto.php";
require_once "../../mensaje.php";


$idPersona = $_GET["idPersona"];

$listadoContactos = Contacto::obtenerPorIdPersona($idPersona);

$listadoTipoContactos = TipoContacto::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/styleFormInsert.css">
    <link rel="stylesheet" href="/proyecto-modulos/style/tabla.css"> 
    <link href="../../icon/fontawesome/css/all.css" rel="stylesheet"> <!--Estilos para iconos -->
    <link rel="stylesheet" href="../../style/menuVertical.css">
    <script src="../../jquery3.6.js"></script>
    <script type="text/javascript" src="../../script/menu.js" defer> </script>
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Lista Docentes</title>
</head>

<body>

<?php require_once "../../menu.php";?>

<div class="titulo"><h1>Agregar contacto</h1></div>

<div class="main">
	<form method="POST" action="procesar_alta.php" method=POST class="formInsert3Columnas" id="formInsert" name="formInsert">

		<input type="hidden" name="txtIdPersona" value="<?php echo $idPersona; ?>">

		<div class="formGrup contacto" id="GrupoBarrio">
			<label for="cboTipoContacto" class="formLabel">Tipo Contacto</label>

			<select name="cboTipoContacto">
				<option value=0>-- Seleccionar --</option>

				<?php foreach ($listadoTipoContactos as $tipoContacto): ?>

					<option value="<?php echo $tipoContacto->getIdTipoContacto(); ?>">
						<?php echo $tipoContacto->getDescripcion(); ?>
					</option>
					
				<?php endforeach ?>

			</select>
		</div> 

		
		<div class="formGrup contacto2" id="GrupoContacto">
			
			<label for="Contacto" class="formLabel">Valor</label>    
			<div class="formGrupInput">
				<input type="text" name="Contacto" id="Contacto" class="formInput">
			</div>
			<p class="formularioInputError"> El Contacto debe estar bien escrito.</p> 
		</div> 
		
			<!--Grupo de Mensaje-->
				
		<div class="formMensaje" id="GrupoMensaje">
					
			<p class="MensajeError"> <b>Error</b>: Complete correctamente el Formulario </p>
			
		</div>

			<!--Grupo de Boton Enviar-->

		<div class="formGrupBtnEnviar contacto">
			<button type="submit" class="formButton" id='Guardar' value='FormInsertContacto'> Guardar</button>
		
            <button name="Cancelar" class="formButton" type="button" value="Cancelar" id="Cancelar" onclick="window.history.go(-1); return false">Cancelar</button>
        </div>

	</form>
</div>



<div class="subtitulo" style="border-bottom:1px solid"><h2>Listado de Contacto</h2></div>

<div class="conteiner3Columnas">

	<table class="tabla">
		<thead>		
			<tr>
				<th>Descripcion</th>
				<th>Valor</th>
				<th>Accion</th>
			</tr>
		</thead>

		<tbody>
			<?php foreach  ($listadoContactos as $contacto): ?>
			<tr>
				<td><?php echo $contacto->getDescripcion(); ?></td>
				<td><?php echo $contacto->getValor(); ?></td>
				<td>
					<a href="eliminar.php?idPersonaContacto=<?php echo $contacto->getIdContactoPersona(); ?>&idPersona=<?php echo $contacto->getIdPersona(); ?>">
						Eliminar
					</a>
				</td>
			</tr>
			<?php endforeach ?>
		</tbody>	
	</table>
</div>
    <?php require_once "../../footer.php"?>     

</body>

<script type="text/javascript" src="../../script/validacionFormInsert.js"></script>
</html>
