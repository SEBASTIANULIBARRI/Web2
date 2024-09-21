<?php 
require_once ("./connection.php");
require ("./templates/footer.php");




function mostrarTarjeta($id){
    $conn = getConnection(); 
    $querytarea = $conn->prepare('SELECT * FROM tareas WHERE id = ?');
    $querytarea->execute([$id]);
    $tarea = getTask($id);
    $salida = "
     <div id = \"$tarea->id \">
        <p>$tarea->Tarea </p>
        <p>$tarea->descripcion </p>

    </div>";
    echo $salida;
}
$tareas = getTareas();
foreach($tareas as $tarea)
{
    mostrarTarjeta($tarea->id);
}
showFooter();

