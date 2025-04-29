<?php
/**
 * API de Eventos
 * 
 * Este script funciona como una API que devuelve los eventos programados
 * para una fecha específica en formato JSON. Se utiliza para mostrar
 * eventos en el calendario.
 * 
 * @version 1.0
 * @author Casa de la Juventud
 */
header('Content-Type: application/json');
include('../../config/conexion.php');

$fecha = $_GET['fecha'] ?? date('Y-m-d');

$query = "SELECT titulo, descripcion, hora FROM eventos WHERE fecha = '$fecha'";
$result = mysqli_query($conexion, $query);

$eventos = [];
while ($row = mysqli_fetch_assoc($result)) {
    $eventos[] = [
        'titulo' => $row['titulo'],
        'descripcion' => $row['descripcion'],
        'hora' => $row['hora']
    ];
}

echo json_encode($eventos);
?>
