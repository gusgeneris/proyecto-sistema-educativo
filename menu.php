<?php
require_once "class/Usuario.php";
require_once "configs.php";

session_start();

if(isset($_SESSION['usuario'])){
    $usuario=$_SESSION['usuario'];
}
else{header("Location:/proyecto-modulos/login.php?error=".INCORRECT_SESSION_CODE);
exit;}
$_SESSION['usuario']=$usuario;

$listadoModulos= $usuario->perfil->getArrModulos();

?>


<header class="encabezado">
    <nav>    
        <div class="">
            <a href="/proyecto-modulos/inicio.php"><img class="logob" src="/proyecto-modulos/image/logoo_frase.png" ></a>
        </div>
        <ul class="">
            <?php foreach($listadoModulos as $modulos): ?>
            <ul class="">
                <li class=""><a href="/proyecto-modulos/modulos/<?php echo $modulos->getDirectorio();?>/listado.php" class="a"><?php echo ucwords($modulos->getNombre());?></a>
                    <ul>
                        <li><a href="/proyecto-modulos/modulos/<?php echo $modulos->getDirectorio();?>/insert.php"class="a">Agregar nuevo</a></li>
                    </ul>
                </li>
            </ul>
            <?php endforeach; ?>
            <li class=""><a href="/proyecto-modulos/cerrar_sesion.php" class="a">Cerrar Sesion</a></li>
        </ul>

    </nav>


</header>
<?php
echo "<input type='button' value='Atras' onClick='history.go(-1);'>";
?>


<!-- LINEA 25
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
                </ul
            ></li>
            <li class=""><a href="/proyecto-modulos/modulos/docentes/listado.php" class="a">Docente</a>
                <ul>
                    <li><a href="/proyecto-modulos/modulos/docentes/listado.php" class="a">Listado</a></li>
                    <li><a href="/proyecto-modulos/modulos/docentes/insert.php" class="a">Agregar nuevo</a></li>
                </ul>
            </li>
            <li class=""><a href="/proyecto-modulos/modulos/carreras/listado.php" class="a">Carrera</a>
                <ul>
                        <li><a href="/proyecto-modulos/modulos/carreras/listado.php" class="a">Listado</a></li>
                        <li><a href="/proyecto-modulos/modulos/carreras/insert.php" class="a">Agregar nuevo</a></li>
                </ul>
            </li>
            <li class=""><a href="/proyecto-modulos/modulos/materias/listado.php" class="a">Materia</a>
                <ul>
                        <li><a href="/proyecto-modulos/modulos/materias/listado.php" class="a">Listado</a></li>
                        <li><a href="/proyecto-modulos/modulos/materias/insert.php" class="a">Agregar nuevo</a></li>
                </ul>
            </li>
 -->