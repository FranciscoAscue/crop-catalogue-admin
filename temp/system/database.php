<?php
// detalles de conexion
$host = 'localhost';
$dbname = 'foreslab_database';
$username = 'foreslab_system';
$password = 'E1gael0810/';

// intentar conectar con la base de datos
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec("set names utf8mb4");
    //echo "Conexion exitosa";
} catch(PDOException $e) {
    echo "La conexion fallo: " . $e->getMessage();
}
?>