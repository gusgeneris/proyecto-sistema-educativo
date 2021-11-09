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
    <div class="">
        <a href="/proyecto-modulos/inicio.php"><img class="logob" src="/proyecto-modulos/image/logoo_frase.png" ></a>
    </div>
    <button type="button" class="btnMenu"><i class="icono menu fas fa-bars"></i></button>
    <button type="button" class="btnAtras">
        <a href="javascript:history.back()"><i class="icono menu fas fa-arrow-left"></i></a>
    </button>
    
</header>

    <?php if ($idPerfil == 3):?>

        <div class="contenedorMenuVertical" id="contenedorMenuVertical">                    
            <nav class="vertical">    
            
                <div class="clase-nueva">
                    <button type="button" class="btn-clase-nueva">
                        <a href='/proyecto-modulos/modulos/clase/insert.php'>Nueva Clase</a>
                    </button>    
                </div>
                
               <ul class="menu">
                        <li><a href="/proyecto-modulos/inicio.php"><i class="icono right fas fa-home"></i>Inicio</a></li>

                    <?php foreach($listadoModulos as $modulos): $nombreModulo=$modulos->getNombre()?>

                        <li>
                            <a href="/proyecto-modulos/modulos/<?php echo $modulos->getDirectorio();?>/listado.php">
                            
                                    <?php echo ucwords($nombreModulo);?>
                            </a>
                        </li>                        
                    <?php endforeach; ?>
                        <li><a href="/proyecto-modulos/cerrar_sesion.php">Cerrar Sesion<i class="icono right fas fa-sign-in-alt"></i></a></li>
                       
                </ul>
            </nav> 
        </div>

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
                    elseif($nombreModulo=="periodo_desarrollo"||$nombreModulo=="horarios"||$nombreModulo=="anio_desarrollo"):
                        array_push($configuracion,$nombreModulo);
                    elseif($nombreModulo=="ciclo_lectivo"||$nombreModulo=="materias"||$nombreModulo=="carreras"):
                        array_push($administracion,$nombreModulo);
                    endif;

                endforeach; 

            ?>


                <div class="contenedorMenuVertical"  id="contenedorMenuVertical">
                     <nav class="vertical">
                        <ul class="menu">
                            <li><a href="/proyecto-modulos/inicio.php"><i class="icono left fas fa-home"></i>Inicio</a></li>
                            <li >
                                <button type="button"><i class="icono left fas fa-tasks"></i> Administracion <i class=" icono right fas fa-chevron-down"></i></button>
                            
                                <ul>
                                    <?php foreach($administracion as $directorio):?>
                                    <li>
                                        <a href="/proyecto-modulos/modulos/<?php echo $directorio ?>/listado.php"><?php echo ucfirst(str_replace("_", " ",$directorio)) ?></a>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                            
                            </li>
                            <li >
                                <button type="button"><i class="icono left fas fa-cogs"></i>Configuracion<i class="icono right fas fa-chevron-down"></i></button>
                                    
                                <ul>
                                    <?php foreach($configuracion as $directorio):?>
                                    <li>
                                        <a href="/proyecto-modulos/modulos/<?php echo $directorio ?>/listado.php"><?php echo str_replace("_", " ", ucfirst($directorio)) ?></a>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                            
                            </li>
                            <li >
                                <button type="button"><i class="icono left fas fa-user-friends"></i>Persona<i class="icono right fas fa-chevron-down"></i></button>
                                    
                                <ul>
                                    <?php foreach($persona as $directorio):?>
                                    <li>
                                        <a href="/proyecto-modulos/modulos/<?php echo $directorio ?>/listado.php"><?php echo str_replace("_", " ", ucfirst($directorio)) ?></a>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                            
                            </li>
                            <li >
                                <button type="button"><i class="icono left fas fa-map-marked-alt"></i>Ubicacion<i class="icono right fas fa-chevron-down"></i></button>
                                
                                <ul>
                                    <?php foreach($ubicacion as $directorio):?>
                                    <li>
                                        <a href="/proyecto-modulos/modulos/<?php echo $directorio ?>/listado.php"><?php echo str_replace("_", " ", ucfirst($directorio)) ?></a>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                            
                            </li>
                            
                            <li>
                                <button type="button"><i class="icono left fas fa-shield-alt"></i> Seguridad <i class="icono right fas fa-chevron-down"></i></button>
                                <ul>
                                    <?php foreach($seguridad as $directorio):?>
                                    <li>
                                        <a href="/proyecto-modulos/modulos/<?php echo $directorio ?>/listado.php"><?php echo str_replace("_", " ", ucfirst($directorio)) ?></a>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                            
                            <li class=""><a href="/proyecto-modulos/cerrar_sesion.php" class="a"><i class="icono left fas fa-sign-in-alt"></i>Cerrar Sesion</a></li>
                        </ul>

                    </nav>
                </div>
        <?php endif; ?>  
    
    
    