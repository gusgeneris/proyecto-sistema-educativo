<?php
require_once "../../class/Horario.php";
require_once "../../configs.php";

if(isset($_GET['id'])){
    $id=$_GET['id'];    
}

$horario= Horario::obtenerTodoPorId($id);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/proyecto-modulos/style/styleInsert.css">
    <link rel="stylesheet" href="/proyecto-modulos/style/menu.css" class="">
    <link href="../../icon/fontawesome/css/all.css" rel="stylesheet"> <!--Estilos para iconos -->
    <link rel="stylesheet" href="../../style/menuVertical.css">
    <script src="../../jquery3.6.js"></script>
    <script type="text/javascript" src="../../script/menu.js" defer> </script>
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Modificar horario</title>
</head>
<?php require_once "../../menu.php";?>

<body class="modif-user">
    

    <form action="procesar_actualizar.php" method="POST"class="formulario">
        <h1 class="titulo">Ingrese los nuevos datos</h1>
    
        <table>
            <div class=""> 
                <input name="idHorario" type="hidden" class="" value="<?php echo $horario->getIdHorario(); ?>">
            </div>
            <div> Numero
                <input name="Numero" type="text" class="" value="<?php echo $horario->getNumero(); ?>">
            </div>
            <div> Hora Inicio
                <input name="HoraInicio" type="time" class="" value="<?php echo $horario->getHoraInicio(); ?>">
            </div>
            <div> Hora Fin
                <input name="HoraFin" type="time" class="" value="<?php echo $horario->getHoraFin(); ?>">
            </div>
            <div> 
                <input name="Guardar" type="submit" value="Actualizar" >
                <input name="Cancelar" type="submit" value="Cancelar">
            </div>
        </table>    
    
    </form>
    
</body>
</html>