function valid1(){
    var nombre=document.getElementById("nombre_paciente").value;
    var fecha=document.getElementById("fecha_consulta").value;
    var hora=document.getElementById("hora_consulta").value;
    var medico=document.getElementById("medico").value;
    var sintomas=document.getElementById("sintomas").value;
    var diagnostico=document.getElementById("diagnostico").value;
    var tratamiento=document.getElementById("tratamiento").value;

    if (nombre === "" || apellido === "" || fechaConsulta === "" || horaConsulta === "" || diagnostico === "" || tratamiento === "" || indicaciones === "" || proximaCita === "") {
      alert("Por favor, complete todos los campos.");
      return false;
  }
}
function regreso(){
    window.location="inicio.html";
  }
  function redirectToPage() {
    // Cambia 'url_destino' por la URL a la que quieres redirigir
    window.location.href = 'formulario.html';
  }
  function redirectToPage() {
    // Cambia 'url_destino' por la URL a la que quieres redirigir
    window.location.href = 'formulario2.html';
  }
  function irAEntrar() {
    // Reemplaza 'tu_pagina_de_entrada.html' con la URL deseada para la página de entrada
    window.location.href = '../index.html';
  }

  function toggleMenu() {
    var menuDesplegable = document.getElementById('menuDesplegable');
    menuDesplegable.classList.toggle('visible');
  }
 