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
    <link href="../../icon/fontawesome/css/all.css" rel="stylesheet"> <!--Estilos para iconos -->
    <link rel="stylesheet" href="../../style/menuVertical.css">
    <link rel="stylesheet" href="../../style/tabla.css">
    <link rel="stylesheet" href="../../style/mensaje.css">
    <script src="../../jquery3.6.js"></script>
    <script type="text/javascript" src="../../script/menu.js" defer> </script>
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Lista Docentes</title>
</head>
<body>

<?php require_once "../../menu.php";
require_once "../../mensaje.php";?>

<div class="titulo">
	<h1>Listado de Tipos de Contactos</h1>
</div>


<div class="conteiner-btn-agregar">
    <button type="button" class="btn-agregar" >
		<a href="insert.php">Agregar un nuevo Tipo Contacto</a>
	</button>
</div>

<div class="conteiner3Columnas">
	<table class="tabla" id="table">
		<thead>
			<tr>
				<th>Descripcion</th>
				<th>Accion</th>
			</tr>
		</thead>

		<tbody>

			<?php foreach  ($listadoTipoContactos as $tipoContacto): ?>

				<tr>
					<td><?php echo $tipoContacto->getDescripcion(); ?></td>

					<td>
					<?php    
						$estado=$tipoContacto->getEstado();                        
						if ($estado==2){?>
						<a href="dar_alta.php?id=<?php echo $tipoContacto->getIdTipoContacto()?>"><img class="icon-a" src="../../icon/alta.png" title="Dar Alta" alt="Dar Alta"></a>
					<?php }else{ ?>
						<a href="#" onclick="consulta(<?php echo $tipoContacto->getIdTipoContacto()?>)"><img class="icon-a" src="../../icon/basurero.png" title="Eliminar" alt="Eliminar"></a>
                        <a href="modificar.php?idTipoContacto=<?php echo $tipoContacto->getIdTipoContacto(); ?>"><img class="icon-a" src="../../icon/modificar.png" title="Modificar" alt="Modificar"></a>
					<?php } ?>
					</td>
				</tr>

			<?php endforeach ?>
		</tbody>
	</table>
</div>
<?php require_once "../../footer.php"?> 

</body>

	<script>
        function consulta(idTipoContacto){

            if (confirm("¿Estas deguro que deseas eliminar?"))
            {
                window.location.href="dar_baja.php?idTipoContacto="+idTipoContacto;
            }
        }
    </script>
</html>