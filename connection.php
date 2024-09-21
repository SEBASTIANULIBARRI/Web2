<?php
function getConnection(){
$servername = "localhost";
$username = "root";
$password = "";
$conexion = false;
try {
  $conn = new PDO("mysql:host=$servername;dbname=tarea_practica", $username, $password);
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
 
  function insertTask($Tarea, $descripcion, $lineas) {
    $db = getConnection();
 
    $query = $db->prepare('INSERT INTO tareas(`Tarea`, `descripcion`, `lineas`) VALUES (?, ?, ?)');
    $query->execute([$Tarea, $descripcion, $lineas]);
 
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
    
    $query = $db->prepare('UPDATE `tareas` SET `Tarea`=?,`descripcion`=?,`lineas`=? WHERE id = ?');
    $query->execute([$Tarea, $descripcion, $lineas,$id]);
 }






