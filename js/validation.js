function validateLogin() {
    // Obtener valores de los campos
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;

    // Realizar validaciones
    if (username === '' || password === '') {
        document.getElementById('error-message').innerText = 'Por favor, complete todos los campos.';
    } else if (username !== 'usuario_valido' || password !== 'contrasena_valida') {
        document.getElementById('error-message').innerText = 'Nombre de usuario o contraseña incorrectos.';
    } else {
        document.getElementById('error-message').innerText = '';
        alert('Inicio de sesión exitoso. Redirigiendo...');
      // Aquí podrías redirigir al usuario a la página principal o realizar otras acciones necesarias.
    }
}