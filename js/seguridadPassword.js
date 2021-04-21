"use strict"
let mostrar = document.getElementById("showSeguridad");

let contraseña = document.getElementById("inputClave").addEventListener("input", inputValue);

function inputValue(clave){
    console.log(clave.target.value);
    seguridadClave(clave.target.value);
}

function seguridadClave(clave){
    let seguridad = 0;
        if (clave.length!=0){
            if (tiene_numeros(clave) && tiene_mayusculas(clave) && tiene_minusculas(clave) && tiene_objetos(clave) && clave.length >= 6){
                seguridad = 0;
                seguridad += 100;
            }
            else if(tiene_minusculas(clave) && tiene_mayusculas(clave) && tiene_objetos(clave) && clave.length >=6){
                seguridad = 0;
                seguridad+= 80;
            }
            else if(tiene_minusculas(clave) && tiene_mayusculas(clave) && tiene_numeros(clave) && clave.length >= 6 ){
                seguridad = 0;
                seguridad+= 70;
            }
            else if(tiene_minusculas(clave) && tiene_numeros(clave) && tiene_objetos(clave)){
                seguridad = 0;
                seguridad+= 70;
            }
            else if(tiene_minusculas(clave) && tiene_mayusculas(clave) && clave.length >=6){
                seguridad = 0;
                seguridad+= 50;
            }else if(tiene_mayusculas(clave) && tiene_objetos(clave) && tiene_numeros(clave) && clave.length >=6){
                seguridad = 0;
                seguridad+= 80;
            }
            else if(tiene_mayusculas(clave) && tiene_objetos(clave) && clave.length >=6){
                seguridad = 0;
                seguridad+= 40;
            }
            else if(tiene_minusculas(clave) && tiene_objetos(clave) && clave.length >=6){
                seguridad = 0;
                seguridad+= 40;
            }
            else if(tiene_minusculas(clave) && tiene_numeros(clave) && clave.length >=6){
                seguridad = 0;
                seguridad+= 40;
            }
            else if(tiene_mayusculas(clave) && tiene_numeros(clave) && clave.length >=6){
                seguridad = 0;
                seguridad+= 40;
            }
            else if(tiene_minusculas(clave) && clave.length >=6){
                seguridad = 0;
                seguridad+= 30;
            }
            else if(tiene_mayusculas(clave) && clave.length >=6){
                seguridad = 0;
                seguridad+=30;  
            }
            else if(tiene_numeros(clave) && clave.length >=6){
                seguridad = 0;
                seguridad+=30;  
            }
        }else{
            seguridad = 0;
        }
    darEstiloSeguridad(seguridad);
}   

function darEstiloSeguridad(seguridad){
    if(seguridad == 100){
        mostrar.innerHTML = "Seguridad: Muy Alta!";
        removeEstilos();
        mostrar.classList.add("seguridadMuyAlta");
    }
    if(seguridad == 80){
        mostrar.innerHTML = "Seguridad:  Alta";
        removeEstilos();
        mostrar.classList.add("seguridadAlta");
    }
    if(seguridad == 70){
        mostrar.innerHTML = "Seguridad Media Alta";
        removeEstilos();
        mostrar.classList.add("seguridadMediaAlta");
    }
    if(seguridad == 50){
        mostrar.innerHTML = "Seguridad Media";
        removeEstilos();
        mostrar.classList.add("seguridadMedia");
    }
    if(seguridad == 40){
        mostrar.innerHTML = "Seguridad Baja";
        removeEstilos();
        mostrar.classList.add("seguridadBaja");
    }
    if(seguridad == 30){
        mostrar.innerHTML = "Seguridad Muy Baja";
        removeEstilos();
        mostrar.classList.add("seguridadMuyBaja");
    }
    if(seguridad == 0){
        mostrar.innerHTML = "";
    }
}


function removeEstilos(){
    mostrar.classList.remove("seguridadMuyAlta");
    mostrar.classList.remove("seguridadAlta");
    mostrar.classList.remove("seguridadMediaAlta");
    mostrar.classList.remove("seguridadMedia");
    mostrar.classList.remove("seguridadBaja");
    mostrar.classList.remove("seguridadMuyBaja");
}

let numeros="0123456789";

function tiene_numeros(texto){
   for(let i=0; i<texto.length; i++){
      if (numeros.indexOf(texto.charAt(i),0)!=-1){
         return 1;
      }
   }
   return 0;
}

let letras="abcdefghyjklmnñopqrstuvwxyz";

function tiene_minusculas(texto){
   for(let i=0; i<texto.length; i++){
      if (letras.indexOf(texto.charAt(i),0)!=-1){
         return 1;
      }
   }
   return 0;
}

let letrasMayusculas="ABCDEFGHYJKLMNÑOPQRSTUVWXYZ";

function tiene_mayusculas(texto){
   for(let i=0; i<texto.length; i++){
      if (letrasMayusculas.indexOf(texto.charAt(i),0)!=-1){
         return 1;
      }
   }
   return 0;
}
let objetos = "°!#$%&/)(=?¡+-*]}{[";

function tiene_objetos(texto){
    for(let i=0; i<texto.length; i++){
        if (objetos.indexOf(texto.charAt(i),0)!=-1){
           return 1;
        }
     }
     return 0;
  }

  function mostrarContrasena(){
      var tipo = document.getElementById("inputClave");
      if(tipo.type == "password"){
          tipo.type = "text";
        }else{
            tipo.type = "password";
        }
    }
    
    document.getElementById("showContraseña").addEventListener("click", mostrarContrasena);