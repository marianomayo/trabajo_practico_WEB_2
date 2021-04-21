{include file= 'header.tpl'}
  
  <section class="contactenos">
        <div class="boxformulario"> 
            <h2>Registrate</h2>
            <h3>{$mensaje}</h3>
                <div class="formulario">

                    <form action="sigin" method='POST'>
                        <div class="formulario-in">
                            <label>Usuario</label>
                            <input type="text" name="usuario" required placeholder="Usuario">
                        </div>                    
                        <div class="formulario-in">
                            <label>Contraseña </label>
                            <input type="password" name="contraseña" required  placeholder="contraseña" id="inputClave">
                            <i id="showContraseña"  style='font-size:24px' class='fas'>&#xf06e;</i>
                        </div>                    
                            <i><span id="showSeguridad"></span></i> 
                        <div>
                            <input type="submit" id="btn-verificar" value="registrar">
                        </div>
                    </form>
                </div>
        </div>
    </section>
    <script src="./js/seguridadPassword.js"></script>
{include file='footer.tpl'}