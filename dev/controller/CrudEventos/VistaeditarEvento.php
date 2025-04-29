<?php
/**
 * Vista de Edición de Eventos
 * 
 * Este script genera la interfaz de usuario para la edición de eventos existentes.
 * Permite modificar el título, descripción, fecha y hora del evento seleccionado.
 * 
 * @version 1.0
 * @author Casa de la Juventud
 */
include '../../config/conexion.php';

// Habilitar errores
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Obtener ID del evento de forma segura
if (!isset($_GET['id_evento']) || empty($_GET['id_evento'])) {
    die("Error: ID de evento no válido.");
}

$id_evento = (int) $_GET['id_evento']; // Convertir a entero

$query = "SELECT * FROM eventos WHERE id_evento = $id_evento";
$result = $conexion->query($query);

if (!$result) {
    die("Error en la consulta: " . $conexion->error);
}

$evento = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Evento</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../../css/contenidoAdmin.css">
    <link rel="stylesheet" href="../../css/tabla.css">
    <link rel="icon" type="image/x-icon" href="../assets/img/logocasa.png" />
</head>
<body>
    <div class="back-container">
        <a href="../../views/tablaEvento.php" class="back-btn">
            <svg width="32px" height="32px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9 22H15C20 22 22 20 22 15V9C22 4 20 2 15 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M9.00002 15.3802H13.92C15.62 15.3802 17 14.0002 17 12.3002C17 10.6002 15.62 9.22021 13.92 9.22021H7.15002" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M8.57 10.7701L7 9.19012L8.57 7.62012" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </a>
    </div>
    <div class="form-container">
        <h3>Editar Evento</h3>
        <form action="actualizarevento.php" method="POST">
            <input type="hidden" name="id_evento" value="<?php echo $evento['id_evento']; ?>">
            
            <label for="titulo">Título</label>
            <input type="text" id="titulo" name="titulo" value="<?php echo htmlspecialchars($evento['titulo']); ?>" required>

            <label for="descripcion">Descripción</label>
            <textarea id="descripcion" name="descripcion" required><?php echo htmlspecialchars($evento['descripcion']); ?></textarea>

            <label for="fecha">Fecha</label>
            <input type="date" id="fecha" name="fecha" value="<?php echo $evento['fecha']; ?>" required>

            <label for="hora">Hora</label>
            <input type="time" id="hora" name="hora" value="<?php echo $evento['hora']; ?>" required>

            <input type="submit" name="actualizar" value="Actualizar Evento">
        </form>
    </div>
</body>
</html>
