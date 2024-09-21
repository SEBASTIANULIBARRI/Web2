<?php 
require_once ("./db/connection.php");
require ("./templates/footer.php");
require ("./templates/header.php");


function mostrarTarjeta($id){
    $tarea = getTask($id);
    $salida = "
     <div id = \"$tarea->id \" class=\"remarcado\">
        <p>$tarea->titulo </p>
        <p>$tarea->descripcion </p>

    </div>";
    echo $salida;
}

function showHome(){

showHeader();

$tareas = getTareas();
foreach($tareas as $tarea)
{
    mostrarTarjeta($tarea->id);
}
showFooter();

}

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'home'; // acción por defecto si no envían
}

$params = explode('/', $action);

// determina que camino seguir según la acción
switch ($params[0]) {
    case 'about': 
        if (isset($params[1])) {
            showAbout($params[1]); 
        } else {
            showAbout(); 
        }
        break;
    case 'tarea': 
        if (isset($params[1])) {
            mostrarTarjeta($params[1]); 
        }
        break;
    case 'home': 
        showHome(); 
        break;
    default: 
        echo('404 Page not found'); 
        break;
}


?>