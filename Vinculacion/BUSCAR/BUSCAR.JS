function valid1(){
    var nombre=document.getElementById("nombre_paciente").value;
    var fecha=document.getElementById("fecha_consulta").value;
    var hora=document.getElementById("hora_consulta").value;
    var medico=document.getElementById("medico").value;
    var sintomas=document.getElementById("sintomas").value;
    var diagnostico=document.getElementById("diagnostico").value;
    var tratamiento=document.getElementById("tratamiento").value;

    if(nombre="" || fecha=="" || hora=="" || medico=="" || sintomas=="" ||diagnostico=="" || tratamiento==""){
        alert("Por favor ingrese todos los datos");
    }
}
  function irAEntrar() {
    // Reemplaza 'tu_pagina_de_entrada.html' con la URL deseada para la página de entrada
    window.location.href = '../inicio-secion/index.html';
  }

  function toggleMenu() {
    var menuDesplegable = document.getElementById('menuDesplegable');
    menuDesplegable.classList.toggle('visible');
  }
  function valid3() {
    // Realizar la búsqueda sin recargar la página
    buscarPaciente();

    // Devolver false para evitar la recarga de la página
    return false;
}
