{include file= 'header.tpl'}

<section class="ropa">
       <div >           
<h2>Lista de categorias</h2>
            <ul>
                   {foreach from=$marcas item=dato}
                       <li style="font-size: x-large; "><a href="filtro/{$dato->id_marca}">{$dato->marca}</a></li>
                   {/foreach}    
                
            </ul>
        </div>         
             
    </section>
{include file='footer.tpl'}