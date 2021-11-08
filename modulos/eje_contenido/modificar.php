<?php
require_once "../../class/EjeContenido.php";
require_once "../../configs.php";
require_once "../../mensaje.php";

if(isset($_GET['id'])){
    $id=$_GET['id'];    
}
$idCarrera=$_GET["idCarrera"];
$idMateria=$_GET["idMateria"];

$ejeContenido= EjeContenido::obtenerTodoPorId($id);


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
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Modificar Eje Contenido</title>
</head>


<body class="modif-user">
    
    <?php require_once "../../menu.php";?>

    <div class="titulo">
        <h1>Ingrese los nuevos datos</h1>
    </div>

    <div class="main">
        <form action="procesar_actualizar.php" method="POST"  class="formModificar" id="formModificar">
            
                <div><input type="hidden" name=IdCarrera value=<?php echo $idCarrera ?>></div>
                <div><input type="hidden" name=IdMateria value=<?php echo $idMateria ?>></div>
                
                <div class=""> 
                    <input name="idEjeContenido" type="hidden" class="" value="<?php echo $ejeContenido->getIdEjeContenido(); ?>">
                </div>

                <div class="formGrup" id="GrupoCicloLectivo" > 
                    <label for="Numero" class="formLabel">Numero</label>
                    
                    <div class="formGrupInput"> 
                        <input id="Numero" name="Numero" type="number" class="formInput" value="<?php echo $ejeContenido->getNumero(); ?>">
                    </div>
                    <p class="formularioInputError"> El nombre no debe contener numeros ni simbolos.</p>
                </div>

                <div class="formGrup" id="GrupoDetalleAnio" > 
                    <label for="Descripcion" class="formLabel">Detalle</label>

                    <div class="formGrupInput"> 
                    <textarea name="" id="" cols="30" rows="10" name="Descripcion" type="text" class="formInput" value=""> <?php echo $ejeContenido->getDescripcion(); ?></textarea>
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
    <?php require_once "../../footer.php"?>         
</body>
</html>