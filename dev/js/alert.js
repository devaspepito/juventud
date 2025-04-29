function showSuccessAlertV() {
    Swal.fire({
        position: "center",
        icon: "success",  // Corregido "succes" por "success"
        title: "Ya eres parte del voluntariado!",
        showConfirmButton: false,
        timer: 1500
    });

    // Esperar 1.5 segundos antes de enviar el formulario
    setTimeout(function() {
        document.querySelector('.form-container').submit();
    }, 1500);

    // Prevenir el envío inmediato del formulario
    return false;
}

function showBadAlert() {
    Swal.fire({
        position: "center",
        icon: "error",
        title: "Error: Ya te has registrado como voluntario.",
        showConfirmButton: false,
        timer: 1500
    });

    // Esperar 1.5 segundos antes de enviar el formulario
    setTimeout(function() {
        document.querySelector('.form-container').submit();
    }, 1500);

    // Prevenir el envío inmediato del formulario
    return false;
}


function showCourseAlert() {
    Swal.fire({
        position: "center",
        icon: "success",
        title: "Curso actualizado correctamente",
        showConfirmButton: false,
        timer: 1500
    });

    setTimeout(function() {
        document.querySelector('.form-container form').submit();
    }, 1500);

    return false;
}

function showSuccessAlert() {
    Swal.fire({
        position: "center",
        icon: "success",
        title: "Imagen subida correctamente.",
        showConfirmButton: false,
        timer: 1500
    });

    // Esto retrasará el envío del formulario 1.5 segundos
    setTimeout(function() {
        // Enviar el formulario después de la alerta
        document.querySelector('form').submit();
    }, 1500);

    // Evitar el envío inmediato del formulario
    return false;
}

// Función para validar que la fecha del evento no sea anterior a la fecha actual
function validarFechaEvento() {
    // Obtener la fecha seleccionada
    const fechaSeleccionada = document.getElementById('fecha').value;
    
    // Obtener la fecha actual y formatearla como YYYY-MM-DD para comparar
    const hoy = new Date();
    const año = hoy.getFullYear();
    const mes = String(hoy.getMonth() + 1).padStart(2, '0');
    const dia = String(hoy.getDate()).padStart(2, '0');
    const fechaActual = `${año}-${mes}-${dia}`;
    
    // Comparar las fechas
    if (fechaSeleccionada < fechaActual) {
        Swal.fire({
            position: "center",
            icon: "error",
            title: "Error: La fecha no puede ser anterior al día de hoy",
            text: "Por favor, selecciona una fecha actual o futura",
            showConfirmButton: true
        });
        return false;
    }
    
    // Si la fecha es válida, permitir el envío del formulario
    return true;
}
