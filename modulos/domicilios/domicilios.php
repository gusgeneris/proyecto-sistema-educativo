<?php
require_once "../../class/Domicilio.php";
require_once "../../class/Persona.php";
require_once "../../class/Sexo.php";
require_once "../../configs.php";

$idPersona=$_GET['idPersona'];
$persona=Persona::obtenerPorId($idPersona);
$nombrePersona=$persona->getNombre();
$apellidoPersona=$persona->getApellido();

$lista = Domicilio::listadoPorIdPersona($idPersona);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/proyecto-modulos/style/tabla.css"> 
    <link href="../../icon/fontawesome/css/all.css" rel="stylesheet"> <!--Estilos para iconos -->
    <link rel="stylesheet" href="../../style/menuVertical.css">
    <script src="../../jquery3.6.js"></script>
    <script type="text/javascript" src="../../script/menu.js" defer> </script>
    <script type="text/javascript" src ="../../script/comboDomicilio.js"></script>
    <link rel="stylesheet" href="../../style/mensaje.css">
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Domicilio</title>
</head>

<?php require_once "../../menu.php";
require_once "../../mensaje.php";?>

<body class="body-listuser">

    <div class="titulo">
        <h1>Lista de Domicilios de <?php echo $nombrePersona ?>, <?php echo $apellidoPersona ?></h1>
    </div>

    <div class="conteiner-btn-agregar">
        <button type="button" class="btn-agregar" >         
            <a href="insertar.php?idPersona=<?php echo $idPersona; ?>">Agregar Domicilio</a>
        </button>
    </div>

    <div class="conteiner3Columnas">
        <table class="tabla" method="GET">
            <thead>
                <tr >
                    <th> Pais</th>
                    <th> Provincia</th>
                    <th> Localida</th>
                    <th> Barrio</th>
                    <th> Detalle</th>
                    <th> Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lista as list($idBarrio,$idDomicilio,$idPersona,$domicilioDetalle,$barrio,$localidad,$provincia,$pais) ):?> 
                    <tr >
                        <td >
                            <?php echo $pais; ?>
                        </td>
                        <td>
                            <?php echo $provincia; ?>
                        </td>
                        <td>
                            <?php echo $localidad; ?>
                        </td>
                        <td>
                            <?php echo $barrio; ?>
                        </td>
                        <td>
                            <?php echo $domicilioDetalle; ?>
                        </td>
                        <td>

                            <a href="#" onclick="consulta(<?php echo $idDomicilio;?>,<?php echo $idPersona; ?>)"><img class="icon-a" src="../../icon/basurero.png" title="Eliminar" alt="Eliminar"></a>
				
                            <a href="modificar.php?idBarrio=<?php echo $idBarrio;?>&idDomicilio=<?php echo $idDomicilio; ?>&idPersona=<?php echo $idPersona;?>" ><img class="icon-a" src="../../icon/modificar.png" title="Modificar" alt="Modificar"></a>
                        </td>

                    </tr>
                <?php endforeach ?>
            </tbody>    
        </table>
    </div>
    <?php require_once "../../footer.php"?>
</body>

<script>
    function consulta(idDomicilio,idPersona){

        if (confirm("¿Estas deguro que deseas eliminar?"))
        {
            window.location.href="eliminar.php?idDomicilio="+idDomicilio+"&idPersona="+idPersona;
        }
    }
</script>
</html>