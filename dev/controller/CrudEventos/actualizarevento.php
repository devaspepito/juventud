<?php
/**
 * Controlador de Actualización de Eventos
 * 
 * Este script maneja la actualización de eventos existentes en el sistema.
 * Incluye validaciones de datos y utiliza consultas preparadas para
 * mayor seguridad en la actualización de la base de datos.
 * 
 * @version 1.0
 * @author Casa de la Juventud
 */
if (!isset($_POST["id_evento"]) || empty($_POST["id_evento"])) {
    die("Error: El ID del evento no es válido.");
}

$id_evento = (int) $_POST["id_evento"]; // Convertir a número entero
$titulo = $_POST["titulo"];
$descripcion = $_POST["descripcion"];
$fecha = $_POST["fecha"];
$hora = $_POST["hora"];

$conexion = new mysqli("localhost", "root", "", "casadelajuventud");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$sql = "UPDATE eventos SET titulo = ?, descripcion = ?, fecha = ?, hora = ? WHERE id_evento = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("ssssi", $titulo, $descripcion, $fecha, $hora, $id_evento);

if ($stmt->execute()) {
    header('Location: ../../views/tablaEvento.php');
} else {
    echo "Error al actualizar el evento: " . $stmt->error;
}

$stmt->close();
$conexion->close();

?>
