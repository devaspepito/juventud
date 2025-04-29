<?php
/**
 * Controlador de Actualización de Cursos
 * 
 * Este script maneja la actualización de información de cursos existentes
 * en la base de datos, incluyendo título, descripción e imagen.
 * 
 * @version 1.0
 * @author Casa de la Juventud
 */

include '../../config/conexion.php';

// Recolección y validación de datos del formulario
$id_curso = filter_var($_REQUEST['id_editar'], FILTER_SANITIZE_NUMBER_INT);
$titulo = filter_var($_POST['titulo'], FILTER_SANITIZE_STRING);
$descripcion = filter_var($_POST['descripcion'], FILTER_SANITIZE_STRING);
$imagen = null;

// Procesamiento de la imagen si se proporciona una nueva
if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
    $tmp_name = $_FILES['imagen']['tmp_name'];
    $imagen = addslashes(file_get_contents($tmp_name));
}

// Construcción de la consulta SQL de actualización
$sql = "UPDATE cursos SET titulo = '$titulo', descripcion = '$descripcion'";

// Agregar imagen a la actualización solo si se proporcionó una nueva
if ($imagen !== null) {
    $sql .= ", imagen = '$imagen'";
}

$sql .= " WHERE id_curso = '$id_curso'";

// Ejecución de la actualización y manejo de resultados
$resultado = $conexion->query($sql);

if ($resultado) {
    header('Location: ../../views/tablaCursos.php');
} else {
    echo "Error al actualizar el Curso: " . $conexion->error;
}
?>
