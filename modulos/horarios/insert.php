<?php
    require_once '../../class/MySql.php'; 
    require_once "../../class/Horario.php";
    require_once "../../class/Dia.php";
    require_once "../../mensaje.php";

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
        <form action="procesar_insert.php" method=POST class="formInsertUnaColumna">
            
            <div class="formGrup">     
                <label for="Numero" class="formLabel">Numero del modulo que tendra el horario</label>    
                <div class="formGrupInput">
                    <input type="text" name="Numero" id="Numero" class="formInput" placeholder="Numero">
                    <p class="formularioInputError"> Debe ingresar el dato correctamente.</p> 
                </div>

            </div>


            <div class="formGrup">
                <label for="HoraInicio" class="formLabel">Hora de Inicio</label>
                <input type="time" class="formInput" name="HoraInicio" id="HoraInicio" placeholder="Hora Inicio">
            </div>

            <div class="formGrup">
                <label for="HoraFin" class="formLabel">Hora de Finalizacion</label>
                <input type="time" class="formInput" name="HoraFin" id="HoraFin" placeholder="Hora Fin">
            </div>

            <div class="">
                <label for="cboDia" class="formLabel">Dia</label>
                <select name="cboDia" id="cboDia">
                    <option value="">->Seleccione el Dia<-</option>
                    <?php foreach($listaDias as $dia ):?>
                        <option value="<?php echo $dia->getIdDia() ?>"><?php echo  $dia->getDescripcion() ?></option>
                    <?php endforeach?>
                </select>
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