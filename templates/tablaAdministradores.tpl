{include file= 'header.tpl'}

<div>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Administrador</th>
                <th>Eliminar</th>
                <th>quitar administracion</th>
            </tr>
        </thead>
        <tbody>
            {foreach from=$usuarios item=dato}
                <tr>
                    <td>{$dato->nombre}</td>
                    {if $dato->administrador eq 0} 
                        <td>no es admin</td>
                        <td><A href="eliminarUsuario/{$dato->id}"><i style='font-size:24px' class='fas'>&#xf00d;</i></a></td>
                        <td><a href="hacerAdmin/{$dato->id}">Nombrar Admin</a></td>
                    {else}
                        <td>Admin</td>
                        <td><A href="eliminarUsuario/{$dato->id}"><i style='font-size:24px' class='fas'>&#xf00d;</i></a></td>
                        <td><a href="quitarAdmin/{$dato->id}">Quitar Admin</a></td>
                    {/if}
                </tr>   
            {/foreach}

        </tbody>
    <table>
</div>

{include file='footer.tpl'}