{include file="header.tpl"}
{foreach from=$marca item=item }

<form action="editMarca" method='POST'>
    <label for="">marca: </label>
    <input type="text" name="marca_edit" value="{$item->marca}" required>
    <label for="">descripcion</label>
    <textarea type="text" name="descripcion_edit" value="{$item->descripcion}" required></textarea>

     <input type="hidden" name="id_edit" value="{$item->id_marca}">
    <button type="submit">Editar marca</button>

</form>    
{/foreach}

{include file="footer.tpl"}