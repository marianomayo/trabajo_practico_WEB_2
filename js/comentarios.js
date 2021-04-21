"use strict"


let numero = document.querySelector('input[name="idComentarioPantalon"]').value;
const borrarComentario = 'api/borrarComentario';
const body = document.getElementById("appearsComments");
let tableNoComments= document.getElementById("noCommets");
let nombreUsuario = document.querySelector('input[name="usuarioConectado"]');
let arreglo = [];
document.addEventListener('DOMContentLoaded', () => {

    getComentarios();
    document.getElementById("sacarFiltro").addEventListener("click", desocularLosTr);
    document.getElementById("filtrar").addEventListener("click", filtrarTabla);
    document.getElementById("agregarComentario").addEventListener('submit', e => {
        e.preventDefault();
        addComentario();
    })
})

function getComentarios() {  
    fetch('api/comentario'+"/"+numero)
    .then(response => response.json())
    .then(comentarios => showComentarios(comentarios))
    .catch(error => console.log(error));
}


function showComentarios(comentarios){
    for(let elems of comentarios){
        let data = {
            comentarios: `${elems.comentarios}`,
            puntaje: `${elems.puntaje}`,
            commentedBy: `${elems.commentedBy}`,
            id_coment_pantalon: `${elems.id}`
        }
        arreglo.push(data);
    }
    if(comentarios.length != 0){
        removeNoComments();
        limpiarTabla();
        for(let coment of comentarios){
            let boton = document.createElement("button");
            boton.innerText = "Borrar";
            let nodotr = document.createElement("tr");
            let nodotd = document.createElement("td");
            let nodotd1 = document.createElement("td");
            let nodotd2 = document.createElement("td");
            let nodotd3 = document.createElement("td");
            let data = stars(`${coment.puntaje}`);
            nodotd1.innerHTML = `${coment.comentarios}`;
            nodotd2.innerHTML = data;            
            nodotd.innerHTML = `${coment.commentedBy}`;
            nodotr.id = coment.id;
            if(nombreUsuario != null){
                boton.addEventListener("click", e => eliminar(coment.id));            
                nodotr.appendChild(nodotd1);
                nodotr.appendChild(nodotd2);
                nodotr.appendChild(nodotd);
                nodotd3.appendChild(boton);
                nodotr.appendChild(nodotd3);
            }else{
                nodotr.appendChild(nodotd1);
                nodotr.appendChild(nodotd2);
                nodotr.appendChild(nodotd);
            }
            body.appendChild(nodotr);        
    }
    }else{
        noComments();
    }
}

function addComentario() {
    let comentario = document.querySelector('textarea[name="comentario"]');
    let puntaje = document.querySelector('select[name="puntaje"]');
    let id = document.querySelector('input[name="idDelComentario"]');
    let commentedBy = whoCommented();  
    if((comentario.value && puntaje.value) != ""){
        let data = {
            comentarios: comentario.value,
            puntaje: puntaje.value,
            commentedBy: commentedBy,
            id_coment_pantalon: id.value
        }
        fetch('api/comentario', {
            "method": "POST",
            "headers": { "Content-Type": "application/json" },
            "body": JSON.stringify(data)
        })
            .then(response => response.json())
            .then(function () {
                getComentarios()
            }).catch(function (e) {
                console.log(e)
            })
    }
}

function eliminar(id) {
    fetch(borrarComentario + "/"  + id, {
        "method": "DELETE",
        "mode": 'cors',
    })  .then(response => response.json())
        .then(function () {
            getComentarios();
    }).catch(function (e) {
        console.log(e)
    })
}


function noComments(){
    tableNoComments.classList.add("ocultar");
}
function removeNoComments(){
    tableNoComments.classList.remove("ocultar");
}

function limpiarTabla() {
    body.innerHTML = "";
}
function whoCommented(){
    let nombreAdmin = document.querySelector('input[name="nombreAdmin"]');
    let nombreRegistrado = document.querySelector('input[name="nombreUsuarioRegistrado"]');
    let dueñoDelComentario = "";
    if(nombreAdmin != null) {
        dueñoDelComentario = nombreAdmin.value;
    }else if(nombreRegistrado != null){
        dueñoDelComentario = nombreRegistrado.value;
    }
    return dueñoDelComentario;
}

function filtrarTabla() {
    ocultarLosTr();
    let inputFiltro = document.querySelector("select[name='puntajeAfiltrar']").selectedIndex+1;
    console.log(inputFiltro);
    for (let elem of arreglo) {
        if (elem.puntaje.includes(inputFiltro)) {
            document.getElementById(elem.id_coment_pantalon).classList.remove("ocultar");
        }
    }
}


function stars(puntaje){
    let nodo;
    if(puntaje == 1){
        nodo ='<span class="fa fa-star checked"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span>';
    }
    else if(puntaje == 2){
        nodo ="<span class='fa fa-star checked'></span><span class='fa fa-star checked'></span><span class='fa fa-star'></span><span class='fa fa-star'></span><span class='fa fa-star'></span>";
    }
    else if(puntaje == 3){
        nodo = '<span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span> <span class="fa fa-star"></span><span class="fa fa-star"></span>';
    }
    else if(puntaje == 4){
        nodo = '<span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span>';
    }else if(puntaje == 5){
        nodo = '<span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span>';
    }
return nodo;
}

function ocultarLosTr() {
    let ocultarTr = body.querySelectorAll("tr");
    for (let elem of ocultarTr) {
        elem.classList.add("ocultar");
    }
}

function desocularLosTr() {
    let mostrarTr = body.querySelectorAll("tr");
    for (let elem of mostrarTr) {
        elem.classList.remove("ocultar");
    }
}

