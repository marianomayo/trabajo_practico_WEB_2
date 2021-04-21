{include file= 'header.tpl'}


{foreach from=$marcaAEliminar item=dato}
    <h1>desea eliminar la marca {$dato->marca}</h1>
{/foreach}

<a href="confirmarElBorrado/{$datoAEliminar}"><button>borrar</button></a>

<a href="tabla_de_pantalones"><button>cancelar</button></a>

{include file='footer.tpl'}