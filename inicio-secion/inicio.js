function inicio() {
    // Cambia la URL a la que deseas redirigir
    window.location.href = "../pagina-principal/homepage.html";
  }
const $btnSignIn= document.querySelector('.sign-in-btn'),
$btnSignUp= document.querySelector('.sign-up-btn'),
$signUp=document.querySelector('.sign-up'),
$signIn=document.querySelector('.sign-in');

document.addEventListener('click',e=>{
    if(e.target=== $btnSignIn || e.target === $btnSignUp){
        $signIn.classList.toggle('active');
        $signUp.classList.toggle('active');
    }
});

function registro(){
  var nombres=document.getElementById("nombre").value;
    var apellidos=document.getElementById("apellidos").value;
    var cedula=document.getElementById("cedula").value;
    var profesion=document.getElementById("profesion").value;
    var email=document.getElementById("email").value;
    var contraseña=document.getElementById("contra").value;

    if(nombres==""|| apellidos==""|| cedula==""|| profesion==""|| email==""|| contraseña==""){
      alert("Por favor ingrese todos los datos requeridos");
    }
    
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
      alert("Ingrese un correo electrónico válido")
    }
    
    else{
      alert("usuario registrado correctamente");
    }
}

function inicio(){
  var usuario=document.getElementById("usuario").value;
  var contra=document.getElementById("clave").value;

  if(usuario==""& contra==""){
    alert("Por favor ingrese su correo y contraseña")
  }else{
    window.location="inicio.html";
  }
}