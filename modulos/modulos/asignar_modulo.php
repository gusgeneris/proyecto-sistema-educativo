<?php
    require_once '../../class/MySql.php'; 
    require_once "../../class/Modulo.php";
    require_once "../../mensaje.php";
    
    
    $idPerfilDelModulo=$_GET["idPerfil"];
    $lista=Modulo::obtenerTodos();
    $modulos=Modulo::obtenerPorIdPerfil($idPerfilDelModulo);

    $listadoModulosActuales=[];
    foreach ($modulos as $i ){
       
        array_push($listadoModulosActuales, $i->getIdModulo()); 
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/proyecto-modulos/style/tabla.css">
    <link rel="stylesheet" href="../../style/styleFormInsert.css">
    <link href="../../icon/fontawesome/css/all.css" rel="stylesheet"> <!--Estilos para iconos -->
    <link rel="stylesheet" href="../../style/menuVertical.css">
    <script src="../../jquery3.6.js"></script>
    <script type="text/javascript" src="../../script/menu.js" defer> </script>
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Agregar Perfil</title>
    <title>Insertar Nuevo</title>
</head>

<?php require_once "../../menu.php";?>

<body class="body">
    <h1 class="titulo"> Seleccione el modulo</h1>

    <form action="procesar_asignar.php" method=POST class="formulario">

        <input type="hidden" value="<?php echo $idPerfilDelModulo ?>" name="idPerfil">
       
        <div class="conteiner3Columnas" >
            <table class="tabla" id="table">
                <thead>
                    <tr>
                        <th>Asignado</th>
                        <th>Nombre de Modulo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lista as $modulo):?>
                        <tr>
                            <td>
                                <input type="checkbox" name="check_lista[]" value="<?php echo $modulo->getIdModulo() ?>" <?php 
                                    foreach ($listadoModulosActuales as $i ): 
                                                    
                                        if ($i==$modulo->getIdModulo()){echo "checked";}
                                    endforeach;
                                ?>>
                            </td>
                            <td>
                                <?php echo $modulo->getNombre()?>
                            </td>
                        </tr>
                    <?php endforeach?>
                </tbody>            
            </table>
        </div>

        <div class="formGrupBtnEnviar" >
            <button type="submit" class="formButton" value ="FormInsertAlumnos" id="Guardar"> Guardar</button>
        </div>

        <div class="formGrupBtnEnviar" >
            <button name="Cancelar" class="formButton" type="submit" value="Cancelar" id="Cancelar" onclick="window.history.go(-1); return false" >Cancelar</button>
        </div>

    </form>
    <?php require_once "../../footer.php"?> 

</body>

</html>