<?php
    require_once '../../class/MySql.php'; 
    require_once "../../class/Modulo.php";
    require_once "../../class/Perfil.php";
    
    
    $idPerfilDelModulo=$_GET["idPerfil"];
    $lista=Modulo::obtenerTodosActivos();
    $modulos=Modulo::obtenerPorIdPerfil($idPerfilDelModulo);

    $perfil=Perfil::perfilPorId($idPerfilDelModulo);
    $nombrePerfil=$perfil->getPerfilNombre();

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
    <link rel="icon" type="image/jpg" href="../../image/logo.png">
    <title>Insertar modulo</title>
</head>

<?php require_once "../../menu.php";
    require_once "../../mensaje.php";?>

<body class="body">
    <div class="titulo">
        <h1> Asignar modulos para el perfil: <?php echo $nombrePerfil?></h1>
    </div>

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

        <div class="formGrupBtnEnviarUnaColumna" >
            <button type="submit" class="formButton" value ="FormInsertAlumnos" id="Guardar"> Guardar</button>
            <button name="Cancelar" class="formButton" type="button" value="Cancelar" id="Cancelar" onclick="window.history.go(-1); return false" >Cancelar</button>
        </div>

    </form>

    
    <?php require_once "../../footer.php"?> 

</body>

</html>