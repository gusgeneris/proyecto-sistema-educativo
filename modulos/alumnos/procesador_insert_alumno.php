<?php
require_once "../../class/Persona.php";
require_once "../../class/Alumno.php";
require_once "../../class/Mysql.php";
require_once "../../configs.php";

$cancelar= $_POST['Cancelar'];

if($cancelar==true){
    header("Location:listado.php");
    exit;
}

$personaNombre = trim($_POST['Nombre']);
$personaApellido = trim($_POST['Apellido']);
$personaNacionalidad= trim($_POST['Nacionalidad']);
$personaDni = $_POST['Dni'];
$personaFechaNac = $_POST['Fecha'];
$alumnoNumLegajo= $_POST['NumeroLegajo'];
$personaSexo= $_POST['cboSexo'];


if ($personaDni == ''){
    $personaDni = 'NULL';
}
if ($personaNacionalidad == ''){
    $personaNacionalidad = 'NULL';
}

if ($personaFechaNac == ''){
    $personaFechaNac = null;
}

#COMPRUEBA LAS CANTIDADES MINIMAS DE DIGITOS QUE DEBE CONTENER
if (strlen($personaNombre) < 3 ){

    header("Location:listado.php?mj=".ERROR_LONGITUD_NAME_CODE);
    exit;
}

if (ctype_alpha($personaNombre) == false){
    header("Location:listado.php?mj=".ERROR_NAME_NO_PERMITE_NUMEROS_CODE);
    exit;
}


if (strlen($personaApellido) < 3){
    
    header("Location:listado.php?mj=".ERROR_LONGITUD_LAST_NAME_CODE);
    
}

if (ctype_alpha($personaApellido) == false){
    header("Location:listado.php?mj=".ERROR_LAST_NAME_NO_PERMITE_NUMEROS_CODE);
    exit;
}

#TODO: PERMITIR QUE ACEPTE ESPACIOS

if((!preg_match("/^[a-zA-Z´ ]+$/",$personaApellido))){
    header("Location:listado?mj=".ERROR_LONGITUD_LAST_NAME_CODE );
    exit;
} 



#COMPRUEBA QUE EL CAMPO SEXO NO ESTE VACIO
if ($personaSexo=='NULL'){
    header("Location:listado?mj=".ERROR_SEXO_INCORRECT_CODE);
    exit;
}

$alumno=new Alumno();
$alumno->setNombre($personaNombre);
$alumno->setApellido($personaApellido);
$alumno->setDni($personaDni);
$alumno->setFechaNacimiento($personaFechaNac);
$alumno->setNacionalidad($personaNacionalidad);
$alumno->setNumeroLegajo($alumnoNumLegajo);
$alumno->setIdSexo($personaSexo);


$cargaRegistro=$alumno->insertAlumno();

if ($cargaRegistro){
    header("Location:listado.php?mj=".CORRECT_INSERT_CODE);
}

#COMPRUEBA QUE EL NOMBRE YA REMPLAZADO SOLO ESTE COMPUESTO POR LETRAS Y UNA COMA COMO SEPARADOR
/*if((!preg_match("/^[a-zA-Z]+$/",$personaNombre))){
    header("Location:listado.php?mj=".ERROR_SEXO_INCORRECT_CODE);
    exit;
}*/

/*if (strlen($personaNacionalidad) < 3){
    
    header("Location:listado.php?mj=".ERROR_LONGITUD_NATIONALITY_CODE);
    
}*/
#TODO: VALIDAR FECHA NACIMINETO SI LA FECHA ES VALIDAD 
#COMPRUEBA QUE LA FECHA NO ESTE VACIA*/

/*if ($personaFechaNac==''){
    
    header("Location:listado.php?mj=".ERROR_DATE_INCORRECT_CODE);
    exit;

}*/

#COMPRUBA SI EL SEXO ES UN STRIG NUMERICO CON 9 O MAS DIGITOS EN SU INTERIOR
/*if(!is_numeric($personaDni) or strlen($personaDni) < 9){

    header("Location:listado.php?mj=".ERROR_NOT_NUMERIC_DNI_CODE);
    exit;
}
#ELIMINA LA EXISTENCIA DE ESPACION ENTRE NOMBRE Y LO REMPLAZA POR UNA COMA
$nombresinespacios=str_replace(' ',',',$personaNombre);

*/


?>