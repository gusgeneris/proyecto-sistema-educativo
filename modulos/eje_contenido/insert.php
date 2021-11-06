<?php
    require_once '../../class/MySql.php'; 
    require_once "../../class/EjeContenido.php";
    
    $mensaje='';
    $idCarrera=$_GET["idCarrera"];
    $idMateria=$_GET["idMateria"];
    $idCicloLectivo=$_GET["idCicloLectivo"];

    
    if(isset($_GET['mj'])){
        $mj=$_GET['mj'];
        if ($mj==CORRECT_INSERT_CODE){
            $mensaje=CORRECT_INSERT_MENSAJE;?>
            <div class="mensajes"><?php echo $mensaje;?></div><?php
        }
    };
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/styleFormInsert.css">
    <link rel="stylesheet" href="/proyecto-modulos/style/menu.css" class="">
    <link href="../../icon/fontawesome/css/all.css" rel="stylesheet"> <!--Estilos para iconos -->
    <link rel="stylesheet" href="../../style/menuVertical.css">
    <script src="../../jquery3.6.js"></script>
    <script type="text/javascript" src="../../script/menu.js" defer> </script>
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Agregar Eje Contenido</title>
    <title>Insertar Nuevo Eje de Contenido</title>
</head>

<?php require_once "../../menu.php";?>

<body class="body">

    <div class="titulo">
      <h1> Registro de Nuevo Eje de Contenido</h1>
    </div>
    <div class="main">
        <form action="procesar_insert.php" method="POST" class="formInsert" id="formInsert" name="formInsert">
        
            <div><input type="hidden" name=IdCarrera value=<?php echo $idCarrera ?>></div>
            <div><input type="hidden" name=IdMateria value=<?php echo $idMateria ?>></div>
            <div><input type="hidden" name=IdCicloLectivo value=<?php echo $idCicloLectivo ?>></div>

            <div class="formGrup" id="GrupoCicloLectivo" > 
                    <label for="Numero" class="formLabel">Numero</label>
                    
                    <div class="formGrupInput"> 
                        <input id="Numero" name="Numero" type="number" class="formInput" >
                    </div>
                    <p class="formularioInputError"> El nombre no debe contener numeros ni simbolos.</p>
                </div>

                <div class="formGrup" id="GrupoDetalleAnio" > 
                    <label for="Numero" class="formLabel">Detalle</label>

                    <div class="formGrupInput"> 
                    <textarea cols="30" rows="10" name="Descripcion" type="text" class="formInput" > </textarea>
                    </div>
                    <p class="formularioInputError"> El nombre no debe contener numeros ni simbolos.</p>
                </div>

               
                <div class="formGrupBtnEnviar" >
                    <button type="submit" class="formButton" value ="FormInsertAlumnos" id="Guardar">Guardar</button>
                </div>
                <div class="formGrupBtnEnviar" >
                    <button name="Cancelar" class="formButton" type="submit" value="Cancelar" id="Cancelar" onclick="window.history.go(-1); return false" >Cancelar</button>
                </div> 
        </form>
    </div>

</body>

</html>