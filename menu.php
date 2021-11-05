<?php
require_once "class/Usuario.php";
require_once "class/Docente.php";
require_once "class/Dia.php";
require_once "class/Horario.php";
require_once "configs.php";

session_start();

if(isset($_SESSION['usuario'])){
    $usuario=$_SESSION['usuario'];
    
}
else{header("Location:/proyecto-modulos/login.php?error=".INCORRECT_SESSION_CODE);
exit;}
$_SESSION['usuario']=$usuario;

$listadoModulos= $usuario->perfil->getArrModulos();
$idPerfil=$usuario->getIdPerfil();


?>

<header class="encabezado">
    <?php if ($idPerfil == 3):?>
        <nav>    
            <div class="">
                <a href="/proyecto-modulos/inicio.php"><img class="logob" src="/proyecto-modulos/image/logoo_frase.png" ></a>
            </div>
            <div class="clase-nueva">
                <button type="button" class="btn-clase-nueva">
                    <a href='/proyecto-modulos/modulos/clase/insert.php'>Nueva Clase</a>
                </button>    
            </div>
            
                <div class="listado-menu" id="listado-menu">
                    <ul class="">
                        
                        <?php foreach($listadoModulos as $modulos): ?>
                        
                        <ul class="">
                            <li class="">
                                <a id="item-menu" href="/proyecto-modulos/modulos/<?php echo $modulos->getDirectorio();?>/listado.php" class="a">
                                    <?php echo ucwords($modulos->getNombre());?>
                                </a>
                                <ul>
                                    <li>
                                        <a href="/proyecto-modulos/modulos/<?php echo $modulos->getDirectorio();?>/insert.php"class="a">
                                            Agregar nuevo
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        
                        <?php endforeach; ?>
                        <li class=""><a href="/proyecto-modulos/cerrar_sesion.php" class="a">Cerrar Sesion</a></li>
                    </ul>
                </div>
            </nav>  
        <?php endif; ?>

        <?php if ($idPerfil == 1): ?>
            <?php 
                $seguridad=[];
                $ubicacion=[];
                $persona=[];
                $configuracion=[];
                $administracion=[];

                foreach($listadoModulos as $modulo):
                    $nombreModulo=$modulo->getDirectorio();
                    if ($nombreModulo=="perfiles"||$nombreModulo=="usuarios"||$nombreModulo=="modulos"):
                        array_push($seguridad,$nombreModulo);
                    elseif($nombreModulo=="pais"):
                        array_push($ubicacion,$nombreModulo);
                    elseif($nombreModulo=="docentes"||$nombreModulo=="alumnos"):
                        array_push($persona,$nombreModulo);
                    elseif($nombreModulo=="periodo_desarrollo"||$nombreModulo=="horarios"):
                        array_push($configuracion,$nombreModulo);
                    elseif($nombreModulo=="ciclo_lectivo"||$nombreModulo=="materias"||$nombreModulo=="carreras"):
                        array_push($administracion,$nombreModulo);
                    endif;

                endforeach; 
            ?>
            
            
        <div class="listado-menu" id="listado-menu">
            <nav class="vertical">
                <div class="">
                    <a href="/proyecto-modulos/inicio.php"><img class="logob" src="/proyecto-modulos/image/logoo_frase.png" ></a>
                </div>
                <div class="">
                    <ul>
                        <ul class="">
                            <li class="dropdown">
                                <span class="a"> Administracion </span>
                            
                                <ul>
                                    <?php foreach($administracion as $directorio):?>
                                    <li>
                                        <a class="a" id="item-menu" href="/proyecto-modulos/modulos/<?php echo $directorio ?>/listado.php"><?php echo ucfirst(str_replace("_", " ",$directorio)) ?></a>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                            
                            </li>
                            <li class="dropdown">
                                    <span class="a"  > Configuracion </span>
                                    
                                <ul>
                                    <?php foreach($configuracion as $directorio):?>
                                    <li>
                                        <a class="a" id="item-menu" href="/proyecto-modulos/modulos/<?php echo $directorio ?>/listado.php"><?php echo str_replace("_", " ", ucfirst($directorio)) ?></a>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                            
                            </li>
                            <li class="dropdown">
                                <span class="a"> Persona </span>
                                    
                                <ul>
                                    <?php foreach($persona as $directorio):?>
                                    <li>
                                        <a class="a" id="item-menu" href="/proyecto-modulos/modulos/<?php echo $directorio ?>/listado.php"><?php echo str_replace("_", " ", ucfirst($directorio)) ?></a>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                            
                            </li>
                            <li class="dropdown">
                                <span class="a"> Ubicacion </span>
                                
                                <ul>
                                    <?php foreach($ubicacion as $directorio):?>
                                    <li>
                                        <a class="a" id="item-menu" href="/proyecto-modulos/modulos/<?php echo $directorio ?>/listado.php"><?php echo str_replace("_", " ", ucfirst($directorio)) ?></a>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                            
                            </li>
                            
                            <li class="dropdown">
                                <span class="a"> Seguridad </span>
                                <ul>
                                    <?php foreach($seguridad as $directorio):?>
                                    <li>
                                        <a class="a" id="item-menu" href="/proyecto-modulos/modulos/<?php echo $directorio ?>/listado.php"><?php echo str_replace("_", " ", ucfirst($directorio)) ?></a>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                            
                        </ul>
                        <li class=""><a href="/proyecto-modulos/cerrar_sesion.php" class="a">Cerrar Sesion</a></li>
                    </ul>
                </div>

            </nav>
        </div>
    <?php endif; ?>                                    


</header>
