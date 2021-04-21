{include file= 'header.tpl'}
<section class="guiaTRopa">
    
  
<table>
    <thead>
        <tr>
            <th>nombre</th>
            <th>Talle</th>
            <th>marca</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
{foreach from=$marca item=dato}
        <tr>
            <td>{$dato->nombre}</td>
            <td>{$dato->talle}</td>      
            <td>{$dato->marca}</td>
            <td><a href="verMas/{$dato->id_pantalones}">Ver mas</a></td>
        </tr>
  {/foreach}
   </tbody>    
</table>

<a href="ropa">Volver</a>
</section>   
                
{include file='footer.tpl'}
