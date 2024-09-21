<?php
function getConnection(){
$servername = "localhost";
$username = "root";
$password = "";
$conexion = false;
try {
  $conn = new PDO("mysql:host=$servername;dbname=db_tareas", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $conexion =true;
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

 return $conn;
 }

 function getTareas() {
    // 1. Abro la conexión
    $db = getConnection();
 
    // 2. Ejecuto la consulta
    $query = $db->prepare('SELECT * FROM tareas');
    $query->execute();
 
    // 3. Obtengo los datos en un arreglo de objetos
    $tasks = $query->fetchAll(PDO::FETCH_OBJ); 
 
    return $tasks;
  }
 
  function getTask($id) {
    $db = getConnection();
 
    $query = $db->prepare('SELECT * FROM tareas WHERE id = ?');
    $query->execute([$id]);   
 
    $task = $query->fetch(PDO::FETCH_OBJ);
 
    return $task;
  }
 
  function insertTask( $titulo, $descripcion, $prioridad, $finalizada) {
    $db = getConnection();
 
    $query = $db->prepare('INSERT INTO tareas( `titulo`, `descripcion`, `prioridad`, `finalizada`) VALUES (?, ?, ?, ?)');
    $query->execute([$titulo, $descripcion, $prioridad, $finalizada]);
 
    $id = $db->lastInsertId();
 
    return $id;
 }
 
 function eraseTask($id) {
    $db = getConnection();
 
    $query = $db->prepare('DELETE FROM tareas WHERE id = ?');
    $query->execute([$id]);
 }
 
 
 function updateTask($id,$Tarea, $descripcion, $lineas) {
    $db = getConnection();
    
    $query = $db->prepare('UPDATE tareas SET finalizada = 1 WHERE id = ?');
    $query->execute([$id]);
 }






