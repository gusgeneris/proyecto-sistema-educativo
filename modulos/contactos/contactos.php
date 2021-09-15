<?php

require_once "../../class/Contacto.php";
require_once "../../class/TipoContacto.php";


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
    <link rel="stylesheet" href="/proyecto-modulos/style/menu.css" class="">
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Lista Docentes</title>
</head>
<body>

<?php require_once "../../menu.php";?>


<br>
<br>

<form method="POST" action="procesar_alta.php" method=POST class="formInsert" id="formInsert" name="formInsert">

	<input type="hidden" name="txtIdPersona" value="<?php echo $idPersona; ?>">

	<div class="formGrup" id="GrupoBarrio">
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
	
	<div class="formGrup" id="GrupoContacto">
        
        <label for="Contacto" class="formLabel">Valor</label>    
        <div class="formGrupInput">
			<input type="text" name="Contacto" id="Contacto" class="formInput">
		</div>
        <p class="formularioInputError"> El Contacto debe estar bien escrito.</p> 
    </div> 
	
	&nbsp;&nbsp;&nbsp;
        <!--Grupo de Mensaje-->
            
    <div class="formMensaje" id="GrupoMensaje">
                
        <p class="MensajeError"> <b>Error</b>: Complete correctamente el Formulario </p>
        
    </div>

        <!--Grupo de Boton Enviar-->

    <div class="formGrupBtnEnviar">
        <button type="submit" class="formButton" id='Guardar' value='FormInsertContacto'> Guardar</button>
    </div>


</form>



<br>
<br>

<table border=1>
	<tr>
		<th>Descripcion</th>
		<th>Valor</th>
		<th>Accion</th>
	</tr>

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

</table>

</body>

<script type="text/javascript" src="../../script/validacionFormInsert.js"></script>
</html>
