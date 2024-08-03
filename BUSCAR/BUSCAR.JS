function valid1() {
  var nombre = document.getElementById("nombre_paciente").value;
  var fecha = document.getElementById("fecha_consulta").value;
  var hora = document.getElementById("hora_consulta").value;
  var medico = document.getElementById("medico").value;
  var sintomas = document.getElementById("sintomas").value;
  var diagnostico = document.getElementById("diagnostico").value;
  var tratamiento = document.getElementById("tratamiento").value;

  if (nombre = "" || fecha == "" || hora == "" || medico == "" || sintomas == "" || diagnostico == "" || tratamiento == "") {
    alert("Por favor ingrese todos los datos");
  }
}
function toggleMenu() {
  var menuDesplegable = document.getElementById('menuDesplegable');
  menuDesplegable.classList.toggle('visible');
}
function irAEntrar() {
  // Cambia la URL a la que deseas redirigir
  window.location.href = "../index.html";
}
function valid3() {
  // Realizar la búsqueda sin recargar la página
  buscarPaciente();

  // Devolver false para evitar la recarga de la página
  return false;
}
