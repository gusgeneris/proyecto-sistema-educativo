<?php
require_once "../../class/EjeContenido.php";
require_once "../../class/CicloLectivo.php";
require_once "../../class/Carrera.php";
require_once "../../configs.php";

$cancelar= $_POST['Cancelar'];
$idCarrera=$_POST["IdCarrera"];
$idMateria=$_POST["IdMateria"];
$idCicloLectivo=$_POST["IdCicloLectivo"];

$idCicloLectivoCarrera=CicloLectivo::obtenerIdCicloLectivoCarrera($idCicloLectivo,$idCarrera);

$idCurriculaCarrera=Carrera::idCurriculaCarrera($idCicloLectivoCarrera,$idMateria);


if($cancelar==true){
    header("Location:listado.php?idCarrera=".$idCarrera."&idMateria=".$idMateria);
    exit;
}
$idEjeContenido = $_POST['idEjeContenido'];
$numero = $_POST['Numero'];
$descripcion = $_POST['Descripcion'];

#COMPRUEBA LAS CANTIDADES MINIMAS DE DIGITOS QUE DEBE CONTENER

if (strlen($descripcion) < 3 ){

    header("Location:listado.php?mj=".ERROR_LONGITUD_NAME_CODE);
    exit;
}

    
if((!preg_match("/^\d*$/",$numero))){
    header("Location:listado?mj=".ERROR_DNI_NUMBER_CODE );
    exit;   
} 

$ejeContenido=new EjeContenido();
$ejeContenido->setIdEjeContenido($idEjeContenido);
$ejeContenido->setNumero($numero);
$ejeContenido->setDescripcion($descripcion);

$ejeContenido->actualizarEjeContenido();

if ($ejeContenido){
    header("Location:listado.php?idCurriculaCarrera=".$idCurriculaCarrera."&idCarrera=".$idCarrera."&idMateria=".$idMateria."&mj=".CORRECT_UPDATE_CODE);
}

?>