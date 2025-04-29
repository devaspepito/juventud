<?php
/**
 * Controlador de Eliminación de Cursos
 * 
 * Este script maneja la eliminación de cursos del sistema,
 * verificando la existencia del ID del curso antes de proceder
 * con la eliminación.
 * 
 * @version 1.0
 * @author Casa de la Juventud
 */

include '../../config/conexion.php';

// Verificación y validación del ID del curso
if (isset($_GET['id_curso'])) {
    $id_curso = filter_var($_GET['id_curso'], FILTER_SANITIZE_NUMBER_INT);

    // Eliminación del curso de la base de datos
    $sql = "DELETE FROM cursos WHERE id_curso = $id_curso";

    if ($conexion->query($sql) === TRUE) {
        header('Location: ../../views/tablaCursos.php');
    } else {
        echo "Error al eliminar el curso: " . $conexion->error;
    }

    $conexion->close();
}
?>