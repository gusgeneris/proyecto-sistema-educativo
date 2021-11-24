<?php
    require_once '../../class/MySql.php'; 
    require_once "../../class/Horario.php";
    require_once "../../class/Dia.php";

    $listaDias=Dia::obtenerTodo();
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
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Agregar Horario</title>
    <title>Insertar</title>
</head>

<?php require_once "../../menu.php";?>

<body class="body">
    <div class="titulo">
        <h1> Registro de Horario</h1>
    </div>

    <div class="main">
        <form action="procesar_insert.php" method=POST  id="formInsert" class="formInsertUnaColumna">
            
            <div class="formGrup" id="GrupoNumero">     
                <label for="Numero" class="formLabel">Numero del modulo que tendra el horario</label>    
                <div class="formGrupInput">
                    <input type="text" name="Numero" id="Numero" class="formInput" placeholder="Numero">
                    <p class="formularioInputError"> Debe ingresar el dato correctamente.</p> 
                </div>

            </div>


            <div class="formGrup" id="GrupoHoraInicio">
                <label for="HoraInicio" class="formLabel">Hora de Inicio</label>
                <div class="formGrupInput">
                <input type="time" class="formInput" name="HoraInicio" id="HoraInicio" placeholder="Hora Inicio">
                <p class="formularioInputError"> Debe ingresar el dato correctamente.</p> 
                </div>
            </div>

            <div class="formGrup" id="GrupoHoraFin">
                <label for="HoraFin" class="formLabel">Hora de Finalizacion</label>
                <div class="formGrupInput">
                <input type="time" class="formInput" name="HoraFin" id="HoraFin" placeholder="Hora Fin">
                <p class="formularioInputError"> Debe ingresar el dato correctamente.</p> 
                </div>
            </div>

            <div class="formGrup" id="GrupocboDia">
                <label for="cboDia" class="formLabel">Dia</label>
                <div class="formGrupInput">
                <select class="formInput" name="cboDia" id="cboDia">
                    <option value="">->Seleccione el Dia<-</option>
                    <?php foreach($listaDias as $dia ):?>
                        <option value="<?php echo $dia->getIdDia() ?>"><?php echo  $dia->getDescripcion() ?></option>
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

<script type="text/javascript" src="../../script/validacionFormInsert.js"></script>
</html>