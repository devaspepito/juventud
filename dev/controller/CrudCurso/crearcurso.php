<?php
/**
 * Controlador de Creación de Cursos
 * 
 * Este script maneja la creación de nuevos cursos en el sistema,
 * procesando la información del formulario incluyendo título,
 * descripción e imagen del curso.
 * 
 * @version 1.0
 * @author Casa de la Juventud
 */

include '../../config/conexion.php';

// Recolección y validación de datos del formulario
$titulo = filter_var($_POST['titulo'], FILTER_SANITIZE_STRING);
$descripcion = filter_var($_POST['descripcion'], FILTER_SANITIZE_STRING);
$imagen = null;

// Procesamiento de la imagen si se proporciona
if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
    $tmp_name = $_FILES['imagen']['tmp_name'];
    $imagen = addslashes(file_get_contents($tmp_name));
}

// Inserción del nuevo curso en la base de datos
$sql = "INSERT INTO cursos (titulo, descripcion, imagen) VALUES ('$titulo', '$descripcion', '$imagen')";
$resultado = $conexion->query($sql);

// Manejo de resultados y redirección
if ($resultado) {
    header('Location: ../../views/tablaCursos.php');
} else {
    echo "Error al crear el Curso: " . $conexion->error;
}
?>
