function showSuccessAlertV() {
    Swal.fire({
        position: "center",
        icon: "success",
        title: "Registro exitoso",
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

function showBadAlertEdad() {
    Swal.fire({
        position: "center",
        icon: "error",
        title: "Error: La edad no cumple con los requisitos.",
        showConfirmButton: false,
        timer: 1500
    });

    // No debemos enviar el formulario cuando hay un error
    // setTimeout(function() {
    //     document.querySelector('.form-container').submit();
    // }, 1500);

    // Prevenir el envío del formulario
    return false;
}

function showCourseAlert() {
    Swal.fire({
        position: "center",
        icon: "success",
        title: "Registro exitoso",
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

function showSuccessAlert() {
    Swal.fire({
        position: "center",
        icon: "success",
        title: "Registro exitoso",
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

function showAlert() {
    // Obtener la fecha de nacimiento del formulario
    const fechaNacimiento = document.getElementById('fecha_nacimiento').value;
    
    if (!fechaNacimiento) return true;
    
    // Calcular la edad
    const fechaNac = new Date(fechaNacimiento);
    const hoy = new Date();
    let edad = hoy.getFullYear() - fechaNac.getFullYear();
    const mes = hoy.getMonth() - fechaNac.getMonth();
    
    if (mes < 0 || (mes === 0 && hoy.getDate() < fechaNac.getDate())) {
        edad--;
    }
    
    console.log("Edad calculada:", edad); // Para depuración
    
    // Verificar si la edad está dentro del rango permitido (14-28 años)
    if (edad < 14 || edad > 28) {
        // Mostrar alerta de error si la edad está fuera del rango
        Swal.fire({
            position: "center",
            icon: "error",
            title: "Error: La edad no cumple con los requisitos (14-28 años).",
            showConfirmButton: true,
            timer: 3000
        });
        
        // Prevenir el envío del formulario
        return false;
    }
    
    // Si la edad es válida, permitir el envío del formulario
    return true;
}

// Asegurarse de que el formulario use la validación
document.addEventListener('DOMContentLoaded', function() {
    const formulario = document.querySelector('.form-container');
    if (formulario) {
        formulario.addEventListener('submit', function(event) {
            // Prevenir el envío por defecto
            event.preventDefault();
            
            // Validar la edad
            if (showAlert()) {
                // Si la validación es exitosa, mostrar mensaje de éxito
                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "Registro exitoso",
                    showConfirmButton: false,
                    timer: 1500
                });
                
                // Enviar el formulario después de 1.5 segundos
                setTimeout(() => {
                    this.submit();
                }, 1500);
            }
        });
    }
});
