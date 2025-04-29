<?php
/**
 * Controlador de Eliminación de Eventos
 * 
 * Este script maneja la eliminación de eventos del sistema.
 * Verifica la existencia del ID del evento y procede con su eliminación
 * de la base de datos.
 * 
 * @version 1.0
 * @author Casa de la Juventud
 */

include '../../config/conexion.php';

// Verificación de la existencia del ID del evento
if (isset($_GET["id_evento"])) {
    $id_evento = intval($_GET['id_evento']); // Conversión segura a entero
    
    // Consulta SQL para eliminar el evento
    $sql = "DELETE FROM eventos WHERE id_evento = $id_evento";
    
    // Ejecución de la consulta y redirección
    if ($conexion->query($sql) === TRUE) {
        header('Location: ../../views/tablaEvento.php');
    } else {
        echo "Error al eliminar el evento: " . $conexion->error;
    }

    $conexion->close();
}
?>

