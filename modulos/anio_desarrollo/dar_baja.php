<?php
require_once "../../class/AnioDesarrollo.php";
require_once "../../configs.php";  
$id=$_GET["id"];

AnioDesarrollo::darDeBaja($id);

header("Location:listado.php?mj=".CORRECT_DELETE_CODE);


?>