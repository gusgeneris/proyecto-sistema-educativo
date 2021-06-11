<?php
require_once "class/Usuario.php";
require_once "configs.php";

session_start();

if(isset($_SESSION['usuario'])){
    $usuario=$_SESSION['usuario'];
}
else{header("Location:login.php?error=".INCORRECT_SESSION_CODE);
exit;}
$_SESSION['usuario']=$usuario;

?>

<header class="encabezado">
    <nav>    
        <div class="">
            <a href="/proyecto-modulos/inicio.php"><img class="logob" src="/proyecto-modulos/image/logo.png" ></a>
        </div>
        <ul class="">
            <li class=""><a href="/proyecto-modulos/modulos/usuarios/listado.php" class="a">Usuarios</a>
                <ul>
                    <li><a href="/proyecto-modulos/modulos/usuarios/listado.php" class="a">Listado</a></li>
                    <li><a href="/proyecto-modulos/modulos/usuarios/insert.php"class="a">Agregar nuevo</a></li>
                </ul>
            </li>
            <li class=""><a href="/proyecto-modulos/modulos/alumnos/listado.php" class="a">Alumnos</a>
                <ul>
                    <li><a href="/proyecto-modulos/modulos/alumnos/listado.php" class="a">Listado</a></li>
                    <li><a href="/proyecto-modulos/modulos/alumnos/insert.php" class="a">Agregar nuevo</a></li>
                </ul></li>
            <li class=""><a href="/proyecto-modulos/modulos/docentes/listado.php" class="a">Docente</a>
            <ul>
                    <li><a href="/proyecto-modulos/modulos/docentes/listado.php" class="a">Listado</a></li>
                    <li><a href="/proyecto-modulos/modulos/docentes/insert.php" class="a">Agregar nuevo</a></li>
                </ul></li>
            <li class=""><a href="/proyecto-modulos/cerrar_sesion.php" class="a">Cerrar Sesion</a></li>
        </ul>

    </nav>


</header>