<?php
require_once "../../class/Horario.php";
require_once "../../class/Dia.php";
require_once "../../configs.php";
require_once "../../mensaje.php";

if(isset($_GET['id'])){
    $id=$_GET['id'];    
}

$horario= Horario::obtenerTodoPorId($id);
$listadoDias=Dia::obtenerTodo();

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
        <form action="procesar_actualizar.php" method="POST" class="formInsertUnaColumna" id='formModificar'>
            
                    <input name="idHorario" type="hidden" class="formInput" value="<?php echo $horario->getIdHorario(); ?>">
                


                <div class="formGrup" id="GrupoNumero">
                    <label for="Numero" class="formLabel">Numero del modulo que tendra el horario</label>   
                    <div class="formGrupInput">
                        <input name="Numero" type="text" class="formInput" value="<?php echo $horario->getNumero(); ?>">
                        <p class="formularioInputError"> Debe ingresar el dato correctamente.</p> 
                    </div>
                </div>


                <div class="formGrup" id="GrupoHoraInicio">
                    <label for="HoraInicio" class="formLabel">Hora de Inicio</label>
                    <div class="formGrupInput">
                        <input id="HoraInicio" name="HoraInicio" type="time" class="formInput" value="<?php echo $horario->getHoraInicio(); ?>">
                        <p class="formularioInputError"> Debe ingresar el dato correctamente.</p> 
                    </div>
                </div>

                <div class="formGrup" id="GrupoHoraFin">
                    <label for="HoraFin" class="formLabel">Hora de Finalizacion</label>
                    <div class="formGrupInput">
                        <input id="HoraFin" name="HoraFin" type="time" class="formInput" value="<?php echo $horario->getHoraFin(); ?>">
                        <p class="formularioInputError"> Debe ingresar el dato correctamente.</p> 
                    </div>
                </div>

                <div class="formGrup" id="GrupocboDia">
                    <label for="cboDia" class="formLabel">Dia</label>
                    <div class="formGrupInput">
                        <select class="formInput" name="cboDia" id="cboDia">
                            <?php foreach($listadoDias as $dia):?>
                                <option <?php if($dia->getIdDia()==$horario->getIdDia()){echo "SELECTED";}?> value="<?php echo $dia->getIdDia();?>">
                                    <?php echo $dia->getDescripcion(); ?>
                                </option>
                            <?php endforeach?>
                        </select>
                        <p class="formularioInputError"> Debe ingresar el dato correctamente.</p> 
                    </div>
                </div>

            <div class="formGrupBtnEnviarDosColumnas">
                <button type="submit" class="formButton" value ="FormInsertHorario" id="Guardar"> Guardar</button>
           
                <button name="Cancelar" class="formButton" type="button" value="Cancelar" id="Cancelar" onclick="window.history.go(-1); return false">Cancelar</button>
            </div>     
        
        </form>
    </div>
    <?php require_once "../../footer.php"?> 
</body>

<script type="text/javascript" src="../../script/validacionFormModificar.js"></script>
</html>