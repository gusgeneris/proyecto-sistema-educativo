<?php
require_once "../../class/perfil.php";
require_once "../../configs.php";

if(isset($_GET['id'])){
    $id=$_GET['id'];    
}

$perfil= Perfil::perfilPorId($id);

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
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Modificar Ciclo Lectivo</title>
</head>
<?php require_once "../../menu.php";
require_once "../../mensaje.php";?>

<body class="modif-user">

    <div class="titulo">
        <h1>Ingrese el nuevo dato</h1>
    </div>


    <div class="main">
        <form action="procesar_actualizar.php" method="POST"class="formInsertUnaColumna" id="formModificar">

            
            <input name="IdPerfil" type="hidden" class="" value="<?php echo $perfil->getIdperfil(); ?>">
        
            
            <div class="formGrup" id="GrupoPerfil">
            
                <label for="Perfil" class="formLabel">Perfil</label>    
                
                <div class="formGrupInput"> 
                    <input name="Perfil" type="text" class="formInput" value="<?php echo $perfil->getPerfilNombre(); ?>">
                </div>
                <p class="formularioInputError"> El NumeroLegajo no es necesariamente obligatoria.</p> 
            </div> 

        <!--Grupo de Mensaje-->
                
            <div class="formMensaje" id="GrupoMensaje">
                    
                <p class="MensajeError"> <b>Error</b>: Complete correctamente el Formulario </p>
            
            </div>
    
            <!--Grupo de Boton Enviar-->
    
            <div class="formGrupBtnEnviarDosColumnas">
                <button type="submit" class="formButton" id='Guardar' value='FormInsertPerfil'> Guardar</button>
                <button name="Cancelar" class="formButton" type="button" value="Cancelar" id="Cancelar" onclick="window.history.go(-1); return false;">Cancelar</button>
            </div>
        </form>
    </div>
        <?php require_once "../../footer.php"?> 
    
</body>

<script type="text/javascript" src="../../script/validacionFormModificar.js"></script>
</html>