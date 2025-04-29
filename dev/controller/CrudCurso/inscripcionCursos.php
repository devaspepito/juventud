<?php
/**
 * Controlador de Inscripción a Cursos
 * 
 * Este script maneja el proceso completo de inscripción de participantes
 * a los cursos ofrecidos por la Casa de la Juventud.
 * 
 * @version 1.0
 * @author Casa de la Juventud
 */

// Importación de dependencias
include '../../config/conexion.php';

// Configuración del entorno de desarrollo
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Procesamiento principal de inscripción
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificación de campos obligatorios del formulario
    $campos_requeridos = [
        'nombre', 'correo', 'telefono', 
        'telefono_e', 'fecha_nacimiento', 'curso'
    ];
    
    $todos_campos_presentes = true;
    foreach ($campos_requeridos as $campo) {
        if (!isset($_POST[$campo])) {
            $todos_campos_presentes = false;
            break;
        }
    }

    if ($todos_campos_presentes) {
        // Recolección y sanitización de datos del formulario
        $datos_inscripcion = [
            'nombre' => trim($_POST["nombre"]),
            'correo' => filter_var($_POST["correo"], FILTER_SANITIZE_EMAIL),
            'telefono' => trim($_POST["telefono"]),
            'telefono_e' => trim($_POST["telefono_e"]),
            'fecha_nacimiento' => $_POST["fecha_nacimiento"],
            'curso' => trim($_POST["curso"])
        ];

        // Validación de edad del participante
        $fecha_nacimiento_obj = new DateTime($datos_inscripcion['fecha_nacimiento']);
        $fecha_actual = new DateTime();
        $edad_participante = $fecha_actual->diff($fecha_nacimiento_obj)->y;

        // Verificación del rango de edad permitido (14-28 años)
        if ($edad_participante < 14 || $edad_participante > 28) {
            // echo "Error: La edad debe estar entre 14 y 28 años para inscribirse.";
            header('Location:../../../public/views/curso.php?error=edad');
            exit();
        }

        // Verificación de la existencia del curso
        $consulta_curso = "SELECT * FROM cursos WHERE id_curso = ?";
        $stmt_verificacion = $conexion->prepare($consulta_curso);
        $stmt_verificacion->bind_param("s", $datos_inscripcion['curso']);
        $stmt_verificacion->execute();
        $resultado_verificacion = $stmt_verificacion->get_result();

        if ($resultado_verificacion->num_rows > 0) {
            // Preparación de la consulta de inserción
            $consulta_insercion = "INSERT INTO inscripcioncurso 
                (nombre, correo, telefono, telefono_e, fecha_nacimiento, curso)
                VALUES (?, ?, ?, ?, ?, ?)";
            
            $stmt_insercion = $conexion->prepare($consulta_insercion);
            $stmt_insercion->bind_param(
                "ssssss",
                $datos_inscripcion['nombre'],
                $datos_inscripcion['correo'],
                $datos_inscripcion['telefono'],
                $datos_inscripcion['telefono_e'],
                $datos_inscripcion['fecha_nacimiento'],
                $datos_inscripcion['curso']
            );

            // Ejecución de la inscripción y manejo de resultados
            if ($stmt_insercion->execute()) {
                header('Location: ../../../public/views/curso.php');
            } else {
                echo "Error en la inscripción: " . $stmt_insercion->error;
            }

            $stmt_insercion->close();
        } else {
            echo "Error: El curso seleccionado no existe en el sistema.";
        }

        $stmt_verificacion->close();
    } else {
        echo "Error: Todos los campos del formulario son obligatorios.";
    }
}

// Liberación de recursos
$conexion->close();
?>