<?php
/**
 * Controlador de Eliminación de Imágenes
 * 
 * Este script maneja la eliminación de imágenes de la galería.
 * Verifica la existencia del ID de la imagen y procede con su eliminación
 * de la base de datos.
 * 
 * @version 1.0
 * @author Casa de la Juventud
 */

    include '../../config/conexion.php';

    if (isset($_REQUEST['ID'])) {
        $id = $_REQUEST['ID'];
    

    $sql = "DELETE FROM imagenes WHERE ID = '$id'";

    $resultado = $conexion -> query($sql);

    if($resultado) {
        header('Location: ../../views/tablaGaleria.php');
        exit;
    } else {
        echo "Error al eliminar la imagen". $conexion->error;
    }
    } 
?>