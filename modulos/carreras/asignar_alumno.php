<?php
require_once "../../class/Materia.php";
require_once "../../class/Estado.php";

require_once "../../class/Alumno.php";
require_once "../../configs.php";
require_once "../../class/Carrera.php"; 
require_once "../../mensaje.php";

if(isset($_GET['idCiclo'])):
$idCicloLectivo=$_GET["idCiclo"];
$idCarrera=$_GET["idCarrera"];
$carrera=Carrera::listadoPorId($idCarrera);
$idCicloLectivoCarrera=Carrera::idCicloLectivoCarrera($idCicloLectivo,$idCarrera);


$listaAlumnos=Alumno::listadoAlumnosActivos();

$listadoAlumnosAsignados=Alumno::listadoAlumnosAsignados($idCicloLectivoCarrera);

$listadoAlumnosAsiganadosActuales=[];

    foreach ($listadoAlumnosAsignados as $i ){
       
            array_push($listadoAlumnosAsiganadosActuales, $i->getIdAlumno()); 
    }
endif;
?>
<?php 
        
if(isset($_POST["idCicloLectivoCarrera"])):
    
    $idCicloLectivoCarrera=$_POST["idCicloLectivoCarrera"];
endif
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/proyecto-modulos/style/styleFormInsert.css">
        <link rel="stylesheet" href="/proyecto-modulos/style/tabla.css" >
        <link href="../../icon/fontawesome/css/all.css" rel="stylesheet"> <!--Estilos para iconos -->
        <link rel="stylesheet" href="../../style/menuVertical.css">
        <script src="../../jquery3.6.js"></script>
        <script type="text/javascript" src="../../script/menu.js" defer> </script>
        <link rel="icon" type="image/jpg" href="../../image/logo.png">
        <title>Agregar aLUMNO</title>
    </head>
    <body>
        <?php require_once "../../menu.php";?>

        <div class="titulo">
            <h1>Asignar Alumno a la Carrera: <?php echo $carrera->getNombre()?></h1>
        </div>

        <div class="contenedorBusqueda">
            <div class="subtitulo">
                <h2>Buscar Alumno</h2>
            </div>
            <form action="" method="POST" class="contenedorFormBusqueda" id="formInsert" name="formInsert">
                <input type="hidden" name="idCicloLectivoCarrera" value="<?php echo $idCicloLectivoCarrera ?>">
                <input type="hidden" name="IdCicloLectivo" value="<?php echo $idCicloLectivo?>">
                <input type="hidden" name="IdCarrera" value="<?php echo $idCarrera?>">

                <div class="formGrup" id="GrupoApellido">
                    <label for="Apellido" class="formLabel"> Apellido </label>
                    <div class="formGrupInput">
                        <input type="text" class="formInput" id=Apellido name='Apellido'>
                    </div>
                    <p class="formularioInputError"> Debe insertar los datos correctamente.</p>
                </div>

                <div class="formMensaje" id="GrupoMensaje">
                        
                    <p class="MensajeError"> <b>Error</b>: Complete correctamente el Formulario </p>
                
                </div>

                <div class="conteiner-btn-filtrar ">
                    <button  class="formButton" id='Guardar' value ="FormInsertBusquedaApellidoAlumno">
                        Buscar
                    </button>
                </div>
            </form>
        </div>
    <?php 
        
        if(isset($_POST["idCicloLectivoCarrera"])):
            
            $apellido=$_POST["Apellido"];
            $listadoAlumnosAsignados=Alumno::listadoAlumnosAsignados($idCicloLectivoCarrera);

            $listadoAlumnosAsiganadosActuales=[];
            $listaAlumnos=Alumno::busquedaPorApellido($apellido);

            foreach ($listadoAlumnosAsignados as $i ){
            
                    array_push($listadoAlumnosAsiganadosActuales, $i->getIdAlumno()); 
            }

    ?>
        <div class="main">
            <form action="procesar_asignar_alumno.php" method="POST" class="formInsert2Columnas" id="formInsert" name="formInsert">
                
                <input type="hidden" name="IdCicloLectivoCarrera" value="<?php echo $idCicloLectivoCarrera?>">
                <input type="hidden" name="IdCicloLectivo" value="<?php echo $idCicloLectivo?>">
                <input type="hidden" name="IdCarrera" value="<?php echo $idCarrera?>">

                <div class="conteiner3Columnas">
                    <table class="tabla">
                        <thead>
                            <tr>
                                <td>Asignar</td>
                                <td>Nombre Alumno</td>
                                <td>Nombre Apellido</td>
                                <td>Numero DNI</td>
                                <td>Nacionalidad</td>
                            </tr>
                        </thead>
                                 
                        <tbody>
                    <?php foreach ($listaAlumnos as $alumno) : ?> 
                            <tr>
                                <label for="">
                                <td><input type="checkbox" name="check_lista[]" value="<?php echo $alumno->getIdAlumno();?>"
                                <?php 
                                    foreach ($listadoAlumnosAsiganadosActuales as $idAlumno ){          
                                        if ($idAlumno==$alumno->getIdAlumno()){echo "checked";}
                                    }
                                ?>>
                                </td>
                                <td>
                                    <?php echo $alumno->getNombre() ?>
                                </td>
                                <td>
                                    <?php echo $alumno->getApellido() ?>
                                </td>
                                <td>
                                    <?php echo $alumno->getDni() ?>
                                </td>
                                <td>
                                    <?php echo $alumno->getNacionalidad() ?>
                                </td>
                            </tr>
                    <?php endforeach;?>
                        </tbody>
                    </table>

                    <div class="formGrupBtnEnviarUnaColumna">
                        <button type="submit" class="formButton"  id="Guardar"> Guardar</button>

                        <button type="button" class="formButton" id="Cancelar" onclick="window.history.go(-1); return false;" > Atras </button>
                    </div>
                
                </div>
            </form>
        </div>
        <?php endif;?>
        
        <?php require_once "../../footer.php"?>   
        
    </body>
    
<script type="text/javascript" src="../../script/validacionFormInsert.js"></script>
</html>