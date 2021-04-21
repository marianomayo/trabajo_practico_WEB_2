{include file= 'header.tpl'}
<div style="text-align: center;">
    {foreach from=$panta item=dato}
        <h1 style="text-decoration: none;">Comentarios de {$dato->nombre} - <td>{$dato->marca}</td> </h1>
    {/foreach}
</div>


<div  style="display: flex; justify-content: space-around;">

    <div >
        <table>
            <thead>
                <tr>
                    <th>nombre</th>
                    <th>Talle</th>
                    <th>Color</th>
                    <th>Tela</th>
                    <th>Precio</th>
                    <th>marca</th>
                </tr>
            </thead>
            <tbody>
            {foreach from=$panta item=dato}
                <tr>
                    <td>{$dato->nombre}</td>
                    <td>{$dato->talle}</td>
                    <td>{$dato->color}</td>
                    <td>{$dato->tela}</td>
                    <td>{$dato->precio}</td>
                    <td>{$dato->marca}</td>
                </tr>
                <input type="hidden" name="idComentarioPantalon" value="{$dato->id_pantalones}">
            {/foreach}
            </tbody>
        </table>
        <br>
        <br>
        {if isset($nombreUsuario) || isset($nombre)}
            <form id="agregarComentario" method="post">
                <label for="">comentario</label>
                <textarea name="comentario" cols="30" rows="1"></textarea>
                <label for="">puntaje</label>
                <select name="puntaje" id="">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                {if isset($nombre)}
                <input type="hidden" name="nombreAdmin"  value="admin {$nombre}">
                {else if isset($nombreUsuario)}
                <input type="hidden" name="nombreUsuarioRegistrado" value="{$nombreUsuario}">
                {/if}  
                
                {foreach from=$panta item=dato}     
                    <input type="hidden" name="idDelComentario" value="{$dato->id_pantalones}">
                {/foreach} 
                <button type="submit">agregar</button>
            </form>
        {/if}
        <br>
        <label for="">busca por calificacion</label>
        <select name="puntajeAfiltrar" id="">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
        
        <button type="button" id="filtrar">Filtrar</button>
        <button type="button" id="sacarFiltro">Tabla sin filtro</button>
    </div>

    <div>
        <table  id="noCommets">
            <thead>
                <tr>
                    <th>Comentario</th>
                    <th>Puntaje</th>
                    <th>comentador por</th>
                    {if isset ($nombre)}
                        <th>Borrar comentario</th>
                    {/if}
                </tr>
            </thead>
            <tbody id="appearsComments">
            </tbody>
        </table>
    </div>
        {if isset ($nombre)}
            <input type="hidden" name="usuarioConectado" value="{$nombre}">
        {/if}


</div>

<script src="./js/comentarios.js"></script>
{include file='footer.tpl'}