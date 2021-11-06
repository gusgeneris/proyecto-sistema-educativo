<?php

require_once "../../class/TipoContacto.php";


$listadoTipoContactos = TipoContacto::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/proyecto-modulos/style/styleInsert.css" class="">
    <link rel="stylesheet" href="/proyecto-modulos/style/menu.css" class="">
    <link href="../../icon/fontawesome/css/all.css" rel="stylesheet"> <!--Estilos para iconos -->
    <link rel="stylesheet" href="../../style/menuVertical.css">
    <script src="../../jquery3.6.js"></script>
    <script type="text/javascript" src="../../script/menu.js" defer> </script>
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Lista Docentes</title>
</head>
<body>

<?php require_once "../../menu.php";?>
<br>
<br>
<a href="insert.php">Agregar un nuevo Tipo Contacto</a>
<br>
<br>

<table border="1">
	<tr>
		<th>Id Tipo Contacto</th>
		<th>Descripcion</th>
		<th>Accion</th>
	</tr>

	<?php foreach  ($listadoTipoContactos as $tipoContacto): ?>

		<tr>

			<td><?php echo $tipoContacto->getIdTipoContacto(); ?></td>
			<td><?php echo $tipoContacto->getDescripcion(); ?></td>
			<td>
				<a href="dar_baja.php?idTipoContacto=<?php echo $tipoContacto->getIdTipoContacto(); ?>">Eliminar</a>
                <a href="modificar.php?idTipoContacto=<?php echo $tipoContacto->getIdTipoContacto(); ?>">Modificar</a>
			</td>
		</tr>

	<?php endforeach ?>

</table>

</body>
</html>