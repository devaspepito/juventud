<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cursos</title>
    <link rel="stylesheet" href="../css/tabla.css">
    <link rel="icon" type="image/x-icon" href="../assets/img/logocasa.png" />
    <link rel="apple-touch-icon" type="image/png" href="../assets/img/logocasa.png" />
    <link
        rel="apple-touch-startup-image"
        type="image/png"
        href="../assets/img/logocasa.png" />
</head>
</head>

<body>
<div class="back-container">
        <a href="administrador.php" class="back-btn">
            <svg width="32px" height="32px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9 22H15C20 22 22 20 22 15V9C22 4 20 2 15 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M9.00002 15.3802H13.92C15.62 15.3802 17 14.0002 17 12.3002C17 10.6002 15.62 9.22021 13.92 9.22021H7.15002" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M8.57 10.7701L7 9.19012L8.57 7.62012" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </a>
    </div>

    <h1 class="titulo">CURSOS DISPONIBLES</h1>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Descripción</th>
                    <th>Enlace</th>
                    <th>Imagen</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                include '../config/conexion.php';

                $sql = "SELECT * FROM cursos";
                $resultado = $conexion->query($sql);

                while ($Fila = $resultado->fetch_assoc()) { ?>

                    <tr>
                        <td><?php echo $Fila['titulo']; ?></td>
                        <td><?php echo $Fila['descripcion']; ?></td>
                        <td><img src="data:image/jpg;base64,<?php echo base64_encode($Fila['imagen']); ?>" alt="Imagen del Curso"></td>
                        <td>
                            <a href="../controller/CrudCurso/vistaEditarCurso.php?id_curso=<?php echo $Fila['id_curso']; ?>">
                                <button class="btn edit-btn"><img src="../../public/assets/icons/edit.svg" alt="Editar"></button>
                            </a>
                            <a href="../controller/CrudCurso/eliminarcurso.php?id_curso=<?php echo $Fila['id_curso']; ?>">
                                <button class="btn delete-btn"><img src="../../public/assets/icons/trash.svg" alt="Eliminar"></button>
                            </a>
                            <a href="./tablaInscritos.php?id_curso=<?php echo $Fila['id_curso']; ?>">
                                <button class="btn notepad-btn"><img src="../../public/assets/icons/notepad.svg" alt="Ver Inscritos"></button>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</body>

</html>