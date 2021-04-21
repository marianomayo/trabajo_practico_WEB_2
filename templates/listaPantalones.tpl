{include file= 'header.tpl'}

<section class="guiaTRopa">
    <div class="box-tabla">
        <div>
            <h2>{$titulo}</h2>
            <table>
                <thead>
                    <tr>
                        <th>nombre</th>
                        <th>Talle</th>
                        <th>Color</th>
                        <th>Tela</th>
                        <th>Precio</th>
                        <th>marca</th>
                        <th>Imagen</th>
                        <th>comentarios</th>
                        {if isset($nombre)}
                            <th>Editar</th>
                            <th>Borrar</th>
                        {/if}
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
                        {if $dato->imagen}
                            <td><img width="30px" src= "capturas/{$dato->imagen}"></td>
                        {else}
                            <td>no imagen</td>
                        {/if}
                            <th><a href="comentario/{$dato->id_pantalones}"><i style='font-size:24px' class='fas'>&#xf550;</i></a></td>
                        {if isset($nombre)}
                            <td><a class="btn-editar"  href="editPantalon/{$dato->id_pantalones}">Editar</a></td>
                            <td><a href="borrarPantalon/{$dato->id_pantalones}"><img src="./img/icono-borrar.jpg" width="30" height="30" alt="" srcset=""></a></td>
                        {/if}
                    </tr>
                    {/foreach}

                </tbody>
            </table>
            <br>
                <h2>{$titulo2}</h2>
            <table>
                <thead>
                    <tr>
                        
                        <td>marca</td>
                        <td>Descripcion</td>
                        {if isset($nombre)}
                        <td>Editar</td>
                        <td>Borrar</td>
                        {/if}
                    </tr>
                </thead>
                <tbody>
                    {foreach from=$marcas item=dato}
                    <tr>
                        <td>{$dato->marca}</td>
                        <td>{$dato->descripcion}</td>
                        {if isset($nombre)}
                        <td><a class="btn-editar"  href="editMarca/{$dato->id_marca}">Editar</td>
                        <td><a  href="borrarMarca/{$dato->id_marca}"><img src="./img/icono-borrar.jpg" width="20" height="20" alt="" srcset=""></a></td>
                        {/if}
                    </tr>
                    {/foreach}

                </tbody>
            </table>
            </tbody>
            </table>
        </div>
    </div>

    <div class="box-agregar">
        <div>
            {if isset($nombre)}
            <p class="texto">Agregar producto</p>

            <form action="agregarPantalon" method="POST" enctype="multipart/form-data">

                <input type="text" name="nombre" placeholder="Ingrese Nombre" required>
                <input type="number" name="talle" placeholder="Ingrese Talle" required>
                <input type="text" name="color" placeholder="Ingrese Color" required>
                <input type="text" name="tela" placeholder="Ingrese Tela" required>
                <input type="number" name="precio" placeholder="Ingrese Precio" required>
                <select name="marca" id="">
                    {foreach from=$marcas item=dato}
                    <option value="{$dato->id_marca}">{$dato->marca}</option>
                    {/foreach}
                </select>
                <input type="file" name="img" placeholder="Ingrese una imagen" id="file_id" required>
                <input type="submit" value="agregar">
            </form>
            {/if}
        </div>

        <div class="separar">
            <div class="separar1">
            {if isset($nombre)}
                <p class="texto">Agregar marca Y descripcion</p>

                <form action="agregarMarca" method="POST">
                    <input type="text" name="marca" placeholder="Ingrese marca" required>
                    <textarea  name="descripcion" placeholder="Ingrese descripcion" required></textarea>
                    <input type="submit" value="agregar">
                </form>
            {/if}
            </div>
            
        </div>
    </div>
</section>

{include file='footer.tpl'}