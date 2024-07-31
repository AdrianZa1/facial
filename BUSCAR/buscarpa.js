function buscarPaciente() {
    var xhr = new XMLHttpRequest(); // Agrega esta línea para crear el objeto XMLHttpRequest

    var historial = document.getElementById("historial").value;

    // Crea la solicitud AJAX
    xhr.open("POST", "../php/buscar_paciente.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    // Define la función a ejecutar cuando cambia el estado de la solicitud
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Maneja la respuesta del servidor aquí
            console.log(xhr.responseText); // Agrega esta línea para depuración
            var resultados = JSON.parse(xhr.responseText);
            mostrarResultados(resultados);
        }
    };

    // Envía la solicitud con los datos del formulario
    xhr.send("consulta=" + historial);
}

function mostrarResultados(resultados) {
    var resultadosTableBody = document.querySelector("#tablaResultados tbody");
    resultadosTableBody.innerHTML = ""; // Limpia el contenido anterior

    if (resultados.length > 0) {
        for (var i = 0; i < resultados.length; i++) {
            var paciente = resultados[i];
            var resultadoRow = document.createElement("tr");
            resultadoRow.innerHTML =
                "<td>" + paciente.Nombre + "</td>" +
                "<td>" + paciente.Apellido + "</td>" +
                "<td>" + paciente.fecha_consulta + "</td>" +
                "<td>" + paciente.hora_consulta + "</td>" +
                "<td>" + paciente.Diagnostico + "</td>" +
                "<td>" + paciente.Tratamiento_realizado + "</td>" +
                "<td>" + paciente.Indicaciones + "</td>" +
                "<td>" + (paciente.Proxima_cita || 'No especificada') + "</td>";

            resultadosTableBody.appendChild(resultadoRow);
        }
    } else {
        resultadosTableBody.innerHTML = "<tr><td colspan='8'>No se encontraron pacientes</td></tr>";
    }
    document.getElementById("formularioBusqueda").addEventListener("submit", function(event) {
        event.preventDefault(); // Evitar que la página se recargue
        buscarPaciente();
    });
    
}
