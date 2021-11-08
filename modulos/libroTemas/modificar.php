<?php
    require_once "../../class/Clase.php";
    require_once "../../class/LibroTemas.php";
    require_once "../../class/DetalleLibroTemas.php";
    require_once "../../mensaje.php";


    $idDetalleLibroTemas=$_GET["idDetalleLibro"];

    $idCurriculaCarrera=$_GET["idCurriculaCarrera"];

    $detalleLibroTemas=DetalleLibroTemas::obtenerPorId($idDetalleLibroTemas);

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
    <link rel="icon" type="image/jpg" href="../../image/logo.png">
    <title>Modificar Detalle Libro Temas</title>
 
</head>



<body>
    <?php require_once "../../menu.php";?>

    <div class="titulo"><h1>Modificar Detalle Libro de Temas</h1></div>

    
    <div class="main">
        <form action="procesar_modificar.php" method="POST"  id="formInsert" class="formInsert2Columnas">

                <input type="hidden" name="idCurriculaCarrera" value="<?php echo $idCurriculaCarrera?>">
                <input type="hidden" name="idDetalle" value="<?php echo $idDetalleLibroTemas?>">
                
                <div class="formGrup" id="GrupoTemaDia" >
                    <label for="TemaDia" class="formLabel">Tema del dia</label>
                    <div class="formGrupInput">
                        <textarea id="temaDia"name="temaDia"><?php echo $detalleLibroTemas->getTemaDia();?></textarea>
                    </div>
                    <p class="formularioInputError"> Error en el campo tema del dia</p>
                </div>


                <div class="formGrup" id="GrupoObservaciones" >
                    <label for="Obsersaciones" class="formLabel">Observaciones</label>
                    <div class="formGrupInput">
                        <textarea id="observaciones"name="observaciones"><?php echo $detalleLibroTemas->getObservaciones()?></textarea>
                    </div>
                    <p class="formularioInputError"> Error en el campo Observaciones.</p>
                </div>

                <?php if (isset($_GET["id"])){
                    
                        $idClase=$_GET["idClase"];?>
                
                        <input type="hidden" name="idClase" value="<?php echo $idClase?>">

                <?php } ?>       

                <div class="formGrupBtnEnviar" >
                    <button type="submit" class="formButton" id="Guardar"> Guardar Registro </button>
                </div>

                <div class="formGrupBtnEnviar" >
                    <button name="Cancelar" class="formButton" type="submit" value="Cancelar" id="Cancelar" onclick="window.history.go(-1); return false" >Cancelar</button>
                </div>
        </form>
    </div>
    <?php require_once "../../footer.php"?> 
</body>
</html>