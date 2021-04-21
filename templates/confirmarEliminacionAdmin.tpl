{include file= 'header.tpl'}

<h1>Desea borrar al administrador {$administradorABorrar->nombre}</h1>


<a href="confirmarBorradoAdmin/{$id_borrar}"><button>Borrar</button></a>

<a href="tablaAdministradore"><button>Cancelar</button></a>
{include file='footer.tpl'}