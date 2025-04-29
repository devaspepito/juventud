<?php
/**
 * Controlador de Creación de Eventos
 * 
 * Este script maneja el proceso de creación de nuevos eventos en el sistema.
 * Incluye validaciones para asegurar que todos los campos requeridos estén presentes
 * y que la fecha del evento no sea anterior a la fecha actual.
 * 
 * @version 1.0
 * @author Casa de la Juventud
 */
include '../../config/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['titulo']) && isset($_POST['descripcion']) && isset($_POST['fecha']) && isset($_POST['hora'])) {
        $titulo = $_POST["titulo"];
        $descripcion = $_POST["descripcion"];
        $fecha = $_POST["fecha"];
        $hora = $_POST["hora"];

        // Obtener la fecha actual
        $fecha_actual = date("Y-m-d");

        // Validar que la fecha del evento no sea anterior a la fecha actual
        if ($fecha < $fecha_actual) {
            echo "Error: No puedes crear un evento en una fecha pasada.";
        } else {
            // Validar datos
            if (!empty($titulo) && !empty($descripcion) && !empty($fecha) && !empty($hora)) {
                $query = "INSERT INTO eventos (titulo, descripcion, fecha, hora) VALUES ('$titulo', '$descripcion', '$fecha', '$hora')";
                
                $resultado = $conexion->query($query);

                if ($resultado) {
                    header('Location: ../../views/tablaEvento.php');
                } else {
                    echo "No se pudo agregar el evento: " . $conexion->error;
                }
            } else {
                echo "Error: Todos los campos son obligatorios.";
            }
        }
    } else {
        echo "Error: Faltan datos.";
    }
}
?>