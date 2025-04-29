<?php
/**
 * Controlador de Listado de Cursos
 * 
 * Este script genera una lista de todos los cursos disponibles
 * y proporciona opciones para descargar la información de cada
 * curso en formato Excel.
 * 
 * @version 1.0
 * @author Casa de la Juventud
 */

include '../../config/conexion.php';

// Consulta para obtener todos los cursos
$query = "SELECT id_curso, titulo FROM cursos";
$resultado = $conexion->query($query);

// Generación de la lista de cursos con opciones de descarga
if ($resultado->num_rows > 0) {
    while ($Fila = $resultado->fetch_assoc()) {
        echo "<p>Curso: " . htmlspecialchars($Fila['titulo']) . 
             " (ID: " . htmlspecialchars($Fila['id_curso']) . ")</p>";

        // Formulario para descarga de Excel
        echo '<form action="../controller/CrudCurso/descargarExcel.php" method="GET">';
        echo '<input type="hidden" name="id_curso" value="' . 
             htmlspecialchars($Fila['id_curso']) . '">';
        echo '<button type="submit" class="btn excel-btn">Descargar datos en Excel</button>';
        echo '</form>';
    }
} else {
    echo "No hay cursos disponibles.";
}
?>
