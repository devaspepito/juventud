<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../../css/contenidoAdmin.css">
    <link rel="stylesheet" href="../../css/tabla.css">
    <title>Editar Imagen</title>
    <link rel="icon" type="image/x-icon" href="../assets/img/logocasa.png" />
    <link rel="apple-touch-icon" type="image/png" href="../assets/img/logocasa.png" />
    <link
        rel="apple-touch-startup-image"
        type="image/png"
        href="../assets/img/logocasa.png"
    />
  </head>
</head>
<body>
<div class="back-container">
        <a href="../../views/tablaGaleria.php" class="back-btn">
            <svg width="32px" height="32px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9 22H15C20 22 22 20 22 15V9C22 4 20 2 15 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M9.00002 15.3802H13.92C15.62 15.3802 17 14.0002 17 12.3002C17 10.6002 15.62 9.22021 13.92 9.22021H7.15002" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M8.57 10.7701L7 9.19012L8.57 7.62012" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </a>
    </div>
<br>
<div class="form-container">

    <h3>Editar Imagen</h3> 
    <?php
    /**
     * Vista de Edición de Imágenes
     * 
     * Este script genera la interfaz de usuario para editar imágenes existentes.
     * Muestra un formulario con los datos actuales de la imagen y permite
     * su modificación, incluyendo la carga de una nueva imagen.
     * 
     * @version 1.0
     * @author Casa de la Juventud
     */
    include '../../config/conexion.php';
    $ID = $_REQUEST['ID'];

    $sql = "SELECT * FROM imagenes WHERE ID ='$ID'";
    $resultado = $conexion->query($sql);

    $Fila = $resultado->fetch_assoc();

    ?>
    
    <form action="editarImagen.php?IDEditar=<?php echo $Fila['ID']?>" method="POST" enctype="multipart/form-data">
      
        <label for="imagen">Imagen</label>
        <input type="file" id="imagen" name="imagen">

        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre" placeholder="Ingresa el Nombre" value="<?php echo $Fila['nombre']?>">

        <label for="descripcion">Descripción</label>
        <input type="text" id="descripcion" name="descripcion" placeholder="Ingresa la Descripción" value="<?php echo $Fila['descripcion']?>">

        <input type="submit" name="enviar" value="Enviar" id="enviar">
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="../../js/alert.js"></script>
</body>
</html>
