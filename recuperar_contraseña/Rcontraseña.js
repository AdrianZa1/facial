function validarFormulario() {
    var correo = document.getElementById('correo').value;
    var nuevaContrasena = document.getElementById('nueva_contrasena').value;

    // Verificar que ningún campo esté vacío
    if (correo.trim() === '' || nuevaContrasena.trim() === '') {
        alert('Por favor, completa todos los campos.');
        return false;
    }

    // Verificar que la nueva contraseña cumpla con los requisitos
    if (nuevaContrasena.length < 8 || !/[A-Za-z]/.test(nuevaContrasena) || !/\d/.test(nuevaContrasena)) {
        alert('La nueva contraseña no cumple con los requisitos.');
        return false;
    }

    return true;
}
function validarFormulario() {
    var nuevaContrasena = document.getElementById('nueva_contrasena').value;
    var confirmarContrasena = document.getElementById('confirmar_contrasena').value;

    // Verificar que las contraseñas coincidan
    if (nuevaContrasena !== confirmarContrasena) {
        alert('Las contraseñas no coinciden. Por favor, verifica.');
        return false;
    }

    return true;
}
