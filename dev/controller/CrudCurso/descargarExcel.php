<?php
/**
 * Controlador de Descarga de Excel
 * 
 * Este script genera un archivo CSV con la información de los
 * inscritos en un curso específico, formateado para su correcta
 * visualización en Excel.
 * 
 * @version 1.0
 * @author Casa de la Juventud
 */

include '../../config/conexion.php';

// Validación del ID del curso
$id_curso = isset($_GET['id_curso']) ? filter_var($_GET['id_curso'], FILTER_SANITIZE_NUMBER_INT) : 0;

// Verificación de la existencia del curso
$sql_curso = "SELECT titulo FROM cursos WHERE id_curso = $id_curso";
$resultado_curso = $conexion->query($sql_curso);

if ($resultado_curso->num_rows == 0) {
    die("Error: El curso con ID $id_curso no existe.");
}

$curso = $resultado_curso->fetch_assoc();
$curso_nombre = $curso['titulo'];

// Configuración de cabeceras para descarga
header("Content-Type: text/csv; charset=UTF-16LE");
header("Content-Disposition: attachment; filename=inscripciones_$id_curso.csv");
header("Pragma: no-cache");
header("Expires: 0");

// Agregar BOM UTF-16LE
echo pack("v", 0xFEFF);

// Función de conversión de codificación
function convertir_utf16le($texto) {
    return mb_convert_encoding($texto, "UTF-16LE", "UTF-8");
}

// Escritura de encabezados
echo convertir_utf16le("Nombre;Correo;Teléfono;Teléfono de Emergencia;Fecha de Nacimiento\n");

// Obtención y escritura de datos
$sql = "SELECT nombre, correo, telefono, telefono_e, fecha_nacimiento 
        FROM inscripcioncurso WHERE curso = $id_curso";
$resultado = $conexion->query($sql);

while ($fila = $resultado->fetch_assoc()) {
    echo convertir_utf16le(
        $fila['nombre'] . ";" .
        $fila['correo'] . ";" .
        $fila['telefono'] . ";" .
        $fila['telefono_e'] . ";" .
        $fila['fecha_nacimiento'] . "\n"
    );
}
?>
