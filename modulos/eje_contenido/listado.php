<?php
require_once "../../class/EjeContenido.php";
require_once "../../class/Materia.php";
require_once "../../class/CicloLectivo.php";
require_once "../../class/Carrera.php";
require_once "../../class/Docente.php";


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../../icon/fontawesome/css/all.css" rel="stylesheet"> <!--Estilos para iconos -->
        <link rel="stylesheet" href="../../style/menuVertical.css">
        <script src="../../jquery3.6.js"></script>
        <script type="text/javascript" src="../../script/menu.js" defer> </script>
        <script src ="../../script/comboCarrera.js"></script>
        <link rel="stylesheet" href="../../style/styleFormInsert.css">
        <link rel="stylesheet" href="../../style/mensaje.css">
        <link rel="stylesheet" href="/proyecto-modulos/style/tabla.css">
        <link rel="icon" type="image/jpg" href="../../image/logo.png">
        <title>Busqueda Ejes de COntenido</title>

    </head>
    <?php require_once "../../menu.php";
        require_once "../../mensaje.php";
        $idUsuario=$usuario->getIdPerfil();
        $idPersona=$usuario->getIdPersona();
    ?>
    <body class="body-listuser">

        <?php 
                
            $idDocente=Docente::obtenerPorIdPersona($idPersona);
            $anio=date("Y");
            $idCicloLectivo = CicloLectivo::obtenerIdCicloPorAnio($anio);
            $listaCarreras = Carrera::listaCarrerasPorDocente($idDocente,$idCicloLectivo);
        ?>
            
            
        <div>
            <div class="titulo">
                <h1>Buscar Eje de Contenido</h1>
            </div>
            <div class="main">  
                <form action="procesar_busqueda.php" method="POST" class="formInsert3Columnas" id="formInsert" name="formInsert">

                    <input type="hidden" value="<?php echo $idDocente ?>">

                    <div class="formGrup" id="GrupocboCarrera">
                        <label for="cboCarrera" class="formLabel">Carrera</label>
                        <div class="formGrupInput">
                            <select class="formInput" name="cboCarrera" id="cboCarrera" onchange="cargarMaterias()">
                                
                                <option value="0">
                                    Seleccionar Carrera
                                </option>
                            <?php foreach ($listaCarreras as $carrera): ?>
                                <option value="<?php echo $carrera->getIdCarrera() ?>">
                                    <?php echo $carrera->getNombre() ?>
                                </option>
                            <?php endforeach; ?>

                            </select>

                            

                        </div>
                            <p class="formularioInputError"> Debe seleccionar una opcion. </p> 
                    </div>
                    
                    <div class="formGrup" id="GrupocboMateria">
                        <label for="cboMateria" class="formLabel">Materia</label>
                            <div class="formGrupInput">
                                <select class="formInput" name="cboMateria" id="cboMateria">

                                    <option value="0">
                                        Seleccionar Materia
                                    </option>

                                </select>
                            </div>
                            <p class="formularioInputError"> Debe seleccionar una opcion. </p> 
                    </div>                  
                    
                    <div class="formGrupBtnEnviar3Columnas"> 
                        <button class="formButton" value="FormInsertAsistencia" id="Guardar" type="submit" > Buscar </button>
                    </div> 

                </form>
            </div>  

        </div>
        

        <?php if(isset($_GET["idCurriculaCarrera"])):

            $idCurriculaCarrera=$_GET["idCurriculaCarrera"];

            $lista=EjeContenido::obtenerPorIdCurriculaCarrera($idCurriculaCarrera);
            
            $idMateria=$_GET["idMateria"];
            $idCarrera=$_GET["idCarrera"];
            
            $materia=Materia::listadoPorId($idMateria);
        ?>
            <div class="titulo">
                <h1>Lista de Eje Contenido de la Materia: <span> <?php echo $materia?></span></h1>
            </div>

            <div class="conteiner-btn-agregar">
                <button type="button" class="btn-agregar" >
                    <a href="../eje_contenido/insert.php?idMateria=<?php echo $idMateria?>&idCarrera=<?php echo $idCarrera?>&idCicloLectivo=<?php echo $idCicloLectivo?>">Agregar Eje Contenido</a>
                </button>
            </div>

            <div class="conteiner3Columnas" >
                <table class="tabla" method="GET">
                    <thead>
                        <tr>
                            <th> Numero de Eje</th>
                            <th> Descripcion</th>
                            <th> Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($lista as $contenido ):?> 
                        <tr >
                            <td>
                                <?php echo $contenido->getNumero(); ?>                
                            </td>
                            <td>
                                <?php echo $contenido->getDescripcion(); ?>
                            </td>
                            <td>
                                <a href="#" onclick="consulta(<?php echo $contenido->getIdEjeContenido();?>,<?php echo $idMateria?>,<?php echo $idCarrera?>)"><img class="icon-a" src="../../icon/basurero.png" title="Eliminar" alt="Eliminar"></a>
                                
                                <a href="modificar.php?idCicloLectivo=<?php echo $idCicloLectivo?>&id=<?php echo $contenido->getIdEjeContenido(); ?>&idMateria=<?php echo $idMateria?>&idCarrera=<?php echo $idCarrera?>" class=""><img class="icon-a" src="../../icon/modificar.png" title="Modificar" alt="Modificar"></a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
        
        
    <?php require_once "../../footer.php"?>         
    </body>

    <script type="text/javascript" src="../../script/validacionFormInsert.js"></script>
    <script>
        function consulta(idEje,idMateria,idCarrera){

            if (confirm("¿Estas deguro que deseas eliminar?"))
            {
                window.location.href="dar_baja.php?id="+idEje+"&idMateria="+idMateria+"&idCarrera="+idCarrera;
            }
        }
    </script>
</html>