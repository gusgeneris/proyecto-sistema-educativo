<?php
require_once "../../class/PeriodoDesarrollo.php";
require_once "../../configs.php";  
$id=$_GET["id"];

PeriodoDesarrollo::darDeBaja($id);

header("Location:listado.php?mj=".CORRECT_DELETE_CODE);


?>