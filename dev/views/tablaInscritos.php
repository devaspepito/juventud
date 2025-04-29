<?php
session_start();
if (!isset($_SESSION['id_usuario'])) {
    header("Location: ../../index.html ");
    exit();
}

// Conexión a la base de datos
include '../config/conexion.php'; // Asegúrate de que esta ruta sea correcta

// Verifica si el id_curso está en la URL
$id_curso = isset($_GET['id_curso']) ? (int) $_GET['id_curso'] : 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscripciones</title>
    <link rel="stylesheet" href="../css/tabla.css">
    <link rel="icon" type="image/x-icon" href="../assets/img/logocasa.png" />
    <link rel="apple-touch-icon" type="image/png" href="../../assets/img/logocasa.png" />
    <link
        rel="apple-touch-startup-image"
        type="image/png"
        href="../assets/img/logocasa.png"
    />
  </head>
</head>
<body>

<ul>
<div class="back-container">
        <a href="tablaCursos.php" class="back-btn">
            <svg width="32px" height="32px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9 22H15C20 22 22 20 22 15V9C22 4 20 2 15 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M9.00002 15.3802H13.92C15.62 15.3802 17 14.0002 17 12.3002C17 10.6002 15.62 9.22021 13.92 9.22021H7.15002" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M8.57 10.7701L7 9.19012L8.57 7.62012" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </a>
    </div>

<h1 class="titulo">INSCRIPCIONES</h1>

<!-- Mostrar el ID del curso -->
<input type="hidden" name="id_curso" value="<?php echo $id_curso; ?>">

<form action="../controller/CrudCurso/descargarExcel.php" method="GET">
    <input type="hidden" name="id_curso" value="<?php echo $id_curso; ?>">
    <button type="submit" class="btn excel-btn">Descargar datos en Excel</button>
</form>

<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>Teléfono de Emergencia</th>
                <th>Fecha de Nacimiento</th>
                <th>Curso</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($id_curso > 0 && isset($conexion)) {
                $stmt = $conexion->prepare("SELECT i.nombre, i.correo, i.telefono, i.telefono_e, i.fecha_nacimiento, c.titulo AS curso
                                            FROM inscripcioncurso i
                                            JOIN cursos c ON i.curso = c.id_curso
                                            WHERE i.curso = ?");
                $stmt->bind_param("i", $id_curso);
                $stmt->execute();
                $resultado = $stmt->get_result();

                while ($fila = $resultado->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($fila['nombre']); ?></td>
                        <td><?php echo htmlspecialchars($fila['correo']); ?></td>
                        <td><?php echo htmlspecialchars($fila['telefono']); ?></td>
                        <td><?php echo htmlspecialchars($fila['telefono_e']); ?></td>
                        <td><?php echo htmlspecialchars($fila['fecha_nacimiento']); ?></td>
                        <td><?php echo htmlspecialchars($fila['curso']); ?></td>
                    </tr>
                <?php }
                $stmt->close();
            } else {
                echo "<tr><td colspan='6'>ID de curso inválido o conexión no establecida.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php 
if (isset($conexion)) {
    $conexion->close(); 
}
?>
</body>
</html>
