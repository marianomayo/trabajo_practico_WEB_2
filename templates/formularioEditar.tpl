{include file="header.tpl"}

{foreach from=$pantalon item=item }
<form action="editPantalon" method='POST' >
    <label for="">nombre: </label>
    <input type="text" name="nombre_edit" value="{$item->nombre}" required>
    <label for="">talle: </label>
    <input type="number" name="talle_edit" value="{$item->talle}" required>
    <label for="">color: </label>
    <input type="text" name="color_edit" value="{$item->color}" required>
    <label for="">tela: </label>
    <input type="text" name="tela_edit" value="{$item->tela}" required>
    <label for="">precio: </label>
    <input type="number" name="precio_edit" value="{$item->precio}" required>
        {if $item->imagen}
            <label>imagen: </label>
            <img width="30px" src= "capturas/{$item->imagen}">
            <label>Eliminar </label>
            <input type="checkbox"  name="borrarImg">
            
            <input type="file" name="img_edit">
            
        {else}
            <label>agregar imagen: </label>
            <input type="file" name="img_edit">
        {/if}

    <input type="hidden" name="id" value="{$item->id_pantalones}">
    

    <select name="marca_edit" id="">
        {foreach from=$marca item=dato}
        <option value="{$dato->id_marca}">{$dato->marca}</option>
        {/foreach}
    </select>


    <button type="submit">Editar</button>

</form>    
{/foreach}

{include file="footer.tpl"}