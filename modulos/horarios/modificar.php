<?php
require_once "../../class/Horario.php";
require_once "../../configs.php";
require_once "../../mensaje.php";

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
    <link rel="stylesheet" href="../../style/styleFormInsert.css">
    <link href="../../icon/fontawesome/css/all.css" rel="stylesheet"> <!--Estilos para iconos -->
    <link rel="stylesheet" href="../../style/menuVertical.css">
    <script src="../../jquery3.6.js"></script>
    <script type="text/javascript" src="../../script/menu.js" defer> </script>
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Modificar horario</title>
</head>
<?php require_once "../../menu.php";?>

<body class="modif-user">

    <div class="titulo">
        <h1>Ingrese los nuevos datos</h1>
    </div>
    
    <div class="main">
        <form action="procesar_actualizar.php" method="POST" class="formInsertUnaColumna">
            
                <div class=""> 
                    <input name="idHorario" type="hidden" class="formInput" value="<?php echo $horario->getIdHorario(); ?>">
                </div>


                <div class="formGrup">
                    <label for="Numero" class="formLabel">Numero del modulo que tendra el horario</label>   
                    <input name="Numero" type="text" class="formInput" value="<?php echo $horario->getNumero(); ?>">
                </div>


                <div class="formGrup">
                    <label for="HoraInicio" class="formLabel">Hora de Inicio</label>
                    <input name="HoraInicio" type="time" class="formInput" value="<?php echo $horario->getHoraInicio(); ?>">
                </div>

                <div class="formGrup">
                    <label for="HoraFin" class="formLabel">Hora de Finalizacion</label>
                    <input name="HoraFin" type="time" class="formInput" value="<?php echo $horario->getHoraFin(); ?>">
                </div>

            <div class="formGrupBtnEnviar">
                <button type="submit" class="formButton" value ="FormInsertMateria" id="Guardar"> Guardar</button>
            </div>
            
            <div class="formGrupBtnEnviar">
                <button name="Cancelar" class="formButton" type="submit" value="Cancelar" id="Cancelar" onclick="window.history.go(-1); return false">Cancelar</button>
            </div>     
        
        </form>
    </div>
    <?php require_once "../../footer.php"?> 
</body>
</html>