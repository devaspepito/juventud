<?php
/**
 * Controlador de Edición de Imágenes
 * 
 * Este script maneja la actualización de imágenes existentes en la galería.
 * Permite modificar el nombre, descripción y la imagen en sí.
 * Incluye validaciones para la carga de nuevas imágenes.
 * 
 * @version 1.0
 * @author Casa de la Juventud
 */

    include '../../config/conexion.php';

    $ID = $_REQUEST['IDEditar'];

    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $imagen = null;
    
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {

    $tmp_name = $_FILES['imagen']['tmp_name'];
    $imagen = addslashes(file_get_contents($tmp_name));
}
    
    $sql = "UPDATE imagenes 
    SET nombre = '$nombre', 
    descripcion = '$descripcion'";

    if ($imagen !== null) {
    $sql .= ", imagen = '$imagen'"; // Solo se actualiza si hay una nueva imagen
    }

    $sql .= " WHERE ID = '$ID'";

    $resultado = $conexion->query($sql);

    if ($resultado) {
        header('Location: ../../views/tablaGaleria.php');
       
    } else {
        echo "Error al actualizar la imagen";
  
    }


?>
