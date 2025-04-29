<?php
session_start();
if (!isset($_SESSION['id_usuario'])) {
    header("Location: ../../index.html ");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title> La casa de la juventud</title>
    <link rel="stylesheet" href="../css/barra.css">
    <link rel="stylesheet" href="../css/contenidoAdmin.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="../assets/img/logocasa.png" />
    <link rel="apple-touch-icon" type="image/png" href=".../../assets/img/logocasa.png" />
    <link
        rel="apple-touch-startup-image"
        type="image/png"
        href="../assets/img/logocasa.png"
    />
  </head>
</head>

<body>

<!-- Add Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<div class="sidebar">
    <div class="sidebar-header">
        <img src="../assets/img/logocasa.png" alt="Casa de la Juventud">

    </div>
    
    <div class="sidebar-nav">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#galeria" role="button" aria-expanded="false" aria-controls="galeriaMenu">
                    <i class="fas fa-images me-2"></i> Galería
                </a>
                <div class="collapse" id="galeria">
                    <ul class="nav flex-column ml-3">
                        <li class="nav-item">
                            <a class="nav-link" href="#form-gallery" onclick="scrollToForm('form-gallery')">
                                <i class="fas fa-plus-circle me-2"></i> Crear Imagen
                            </a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="tablaGaleria.php"><i class="fas fa-eye me-2"></i> Ver Imagen</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#curso" role="button" aria-expanded="false" aria-controls="ordersMenu">
                    <i class="fas fa-book me-2"></i> Cursos
                </a>
                <div class="collapse" id="curso">
                    <ul class="nav flex-column ml-3">
                        <li class="nav-item">
                            <a class="nav-link" href="#form-course" onclick="scrollToForm('form-course')">
                                <i class="fas fa-plus-circle me-2"></i> Crear Cursos
                            </a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="tablaCursos.php"><i class="fas fa-eye me-2"></i> Ver Cursos</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#evento" role="button" aria-expanded="false" aria-controls="dashboardMenu">
                    <i class="fas fa-calendar-alt me-2"></i> Eventos
                </a>
                <div class="collapse" id="evento">
                    <ul class="nav flex-column ml-3">
                        <li class="nav-item">
                            <a class="nav-link" href="#form-event" onclick="scrollToForm('form-event')">
                                <i class="fas fa-plus-circle me-2"></i> Crear Evento
                            </a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="tablaEvento.php"><i class="fas fa-eye me-2"></i> Ver Eventos</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#voluntariado" role="button" aria-expanded="false" aria-controls="voluntariadoMenu">
                    <i class="fas fa-hands-helping me-2"></i> Voluntariado
                </a>
                <div class="collapse" id="voluntariado">
                    <ul class="nav flex-column ml-3">
                        <li class="nav-item"><a class="nav-link" href="tablaVoluntariado.php"><i class="fas fa-eye me-2"></i> Ver Voluntariados</a></li>
                    </ul>
                </div>
            </li>
        </ul>
     </div>
 <div class="sidebar-footer">
  <a href="../controller/logout.php" class="nav-link logout">
    <i class="fas fa-sign-out-alt"></i> Salir
</a>
 </div>
</div> 
</div>
</div>


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <div class="container">
        <div class="grid-container">
            <div class="item1">
                <div class="centrar">
                    <!-- Main Content Container -->
                    <div class="main-content-container">
                        <!-- Welcome Section -->
                        <div class="welcome-section">
                            <h1>Hola Administrador</h1>
                            <p>Bienvenido, ¿Qué quieres crear el día de hoy?</p>
                        </div>
                    
                        <!-- Forms Container -->
                        <!-- Gallery Form -->
                        <div class="form-card gallery" id="form-gallery">
                            <h3><i class="fas fa-images"></i> Crear Galería</h3>
                            <form action="../controller/CrudGaleria/agregarImagen.php" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="imagen"><i class="fas fa-file-image"></i> Imagen</label>
                                    <input type="file" name="imagen" id="imagen" required>
                                </div>
                                <div class="form-group">
                                    <label for="nombre"><i class="fas fa-font"></i> Nombre</label>
                                    <input type="text" name="nombre" id="nombre" placeholder="Ingresa el nombre" required>
                                </div>
                                <div class="form-group">
                                    <label for="descripcion"><i class="fas fa-align-left"></i> Descripción</label>
                                    <input type="text" name="descripcion" id="descripcion" placeholder="Ingresa la descripción" required>
                                </div>
                                <div class="submit-container">
                                    <button type="submit" class="submit-btn">
                                        <i class="fas fa-paper-plane"></i> Enviar
                                    </button>
                                </div>
                            </form>
                            <div class="action-buttons gallery">
                                <a href="tablaGaleria.php" class="action-btn">
                                    <i class="fas fa-images"></i> Ver Galería
                                </a>
                            </div>
                        </div>
                    
                        <!-- Course Form -->
                        <div class="form-card course" id="form-course">
                            <h3><i class="fas fa-book"></i> Crear Curso</h3>
                            <form action="../controller/CrudCurso/crearcurso.php" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="imagen"><i class="fas fa-file-image"></i> Imagen</label>
                                    <input type="file" id="imagen" name="imagen" required>
                                </div>
                                <div class="form-group">
                                    <label for="titulo"><i class="fas fa-heading"></i> Título</label>
                                    <input type="text" id="titulo" name="titulo" placeholder="Ingresa el título" required>
                                </div>
                                <div class="form-group">
                                    <label for="descripcion"><i class="fas fa-align-left"></i> Descripción</label>
                                    <input type="text" id="descripcion" name="descripcion" placeholder="Ingresa la descripción" required>
                                </div>
                                <div class="submit-container">
                                    <button type="submit" class="submit-btn">
                                        <i class="fas fa-paper-plane"></i> Enviar
                                    </button>
                                </div>
                            </form>
                            <div class="action-buttons course">
                                <a href="tablaCursos.php" class="action-btn">
                                    <i class="fas fa-book"></i> Ver Cursos
                                </a>
                            </div>
                        </div>
                    
                        <!-- Event Form -->
                        <div class="form-card event" id="form-event">
                            <h3><i class="fas fa-calendar-alt"></i> Crear Evento</h3>
                            <form action="../controller/CrudEventos/crearevento.php" method="POST" onsubmit="return validarFechaEvento()">
                                <div class="form-group">
                                    <label for="titulo"><i class="fas fa-heading"></i> Título</label>
                                    <input type="text" id="titulo" name="titulo" placeholder="Ingresa el título" required>
                                </div>
                                <div class="form-group">
                                    <label for="descripcion"><i class="fas fa-align-left"></i> Descripción</label>
                                    <input type="text" id="descripcion" name="descripcion" placeholder="Ingresa la descripción" required>
                                </div>
                                <div class="form-group">
                                    <label for="fecha"><i class="fas fa-calendar-day"></i> Fecha</label>
                                    <input type="date" id="fecha" name="fecha" required>
                                </div>
                                <div class="form-group">
                                    <label for="hora"><i class="fas fa-clock"></i> Hora</label>
                                    <input type="time" id="hora" name="hora" required>
                                </div>
                                <div class="submit-container">
                                    <button type="submit" class="submit-btn">
                                        <i class="fas fa-paper-plane"></i> Enviar
                                    </button>
                                </div>
                            </form>
                            <div class="action-buttons event">
                                <a href="tablaEvento.php" class="action-btn">
                                    <i class="fas fa-calendar-alt"></i> Ver Eventos
                                </a>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <script>
            function scrollToForm(formId) {
                event.preventDefault();
                const formElement = document.getElementById(formId);
                if (formElement) {
                    formElement.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            }
            </script>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="../js/alert.js"></script>
</body>

</html>
