<?php
/**
 * Vista de Edición de Cursos
 * 
 * Este script genera la interfaz de usuario para la edición de cursos existentes,
 * permitiendo modificar el título, descripción e imagen del curso seleccionado.
 * 
 * @version 1.0
 * @author Casa de la Juventud
 */
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../../js/alert.js"></script>
    <link rel="stylesheet" href="../../css/contenidoAdmin.css">
    <link rel="stylesheet" href="../../css/tabla.css">
    <title>Actualizar Curso</title>
    <link rel="icon" type="image/x-icon" href="../assets/img/logocasa.png" />
    <link rel="apple-touch-icon" type="image/png" href="../assets/img/logocasa.png" />
    <link
        rel="apple-touch-startup-image"
        type="image/png"
        href="../assets/img/logocasa.png"
    />
</head>
<body>
    <!-- Botón de retorno a la página anterior -->
    <div class="back-container">
        <a href="../../views/tablaCursos.php" class="back-btn">
            <svg width="32px" height="32px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9 22H15C20 22 22 20 22 15V9C22 4 20 2 15 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M9.00002 15.3802H13.92C15.62 15.3802 17 14.0002 17 12.3002C17 10.6002 15.62 9.22021 13.92 9.22021H7.15002" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M8.57 10.7701L7 9.19012L8.57 7.62012" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </a>
    </div>

    <!-- Contenedor principal del formulario -->
    <div class="form-container">
        <h3>Actualizar Curso</h3> 
        <?php
        // Inclusión de la configuración de la base de datos
        include '../../config/conexion.php';

        // Configuración de reporte de errores
        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        // Obtención y validación del ID del curso
        $id_curso = $_REQUEST['id_curso'];

        // Consulta para obtener los datos del curso
        $sql = "SELECT * FROM cursos WHERE id_curso ='$id_curso'";
        $resultado = $conexion->query($sql);

        // Verificación de errores en la consulta
        if (!$resultado) {
            die("Query failed: " . $conexion->error);
        }

        // Obtención de los datos del curso
        $Fila = $resultado->fetch_assoc();
        ?>

        <!-- Formulario de actualización de curso -->
        <form action="actualizarcurso.php?id_editar=<?php echo $Fila['id_curso']?>" method="POST" enctype="multipart/form-data" onsubmit="return showCourseAlert();">
            <label for="imagen">Imagen</label>
            <input type="file" id="imagen" name="imagen">

            <label for="titulo">Título</label>
            <input type="text" id="titulo" name="titulo" placeholder="Ingresa el Título" value="<?php echo $Fila['titulo']?>">

            <label for="descripcion">Descripción</label>
            <input type="text" id="descripcion" name="descripcion" placeholder="Ingresa la Descripción" value="<?php echo $Fila['descripcion']?>">
            
            <input type="submit" name="enviar" value="Actualizar Curso">
        </form>
    </div>
</body>
</html>
