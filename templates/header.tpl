<!DOCTYPE html>
<html lang="en">
<head>
    <base href="{BASE_URL}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/menuResponsive.js"></script>
    <title>My Label ® - Sitio Oficial</title>
</head>
<body>
<div>
    <header>
        <h1>My Label ®</h1>
        <h3 class="sub-title">Pantalones</h2>
    </header>

    <div style="text-align: right;">
        {if isset($nombre)}
            <p>Hola admin - {$nombre}</p>
        {/if}
         {if isset($nombreUsuario)}
            <p>Hola - {$nombreUsuario}</p>
        {/if}
    </div>

</div>

    <nav>
        <div class="menu">
            <div class="btn_menu"><a>MENÚ</a></div>
          <ul class="navigation">
               <li><a href="home">Home</a></li>
               <li><a href="ropa">Nuestros pantalones</a></li>
               <li><a href="tabla_de_pantalones">Lista de pantalones</a></li>
               {if isset($nombre)}
               <li><a href="tablaAdministradore">Tabla Administradores </a></li>
                {/if}

                
                {if isset($nombre) || isset($nombreUsuario) }
                    <li><a class="btn-borrar" href="logout">Log out</a></li>
                {/if}
                
                {if !isset($nombre) && !isset($nombreUsuario)}
                    <li><a href="sigin">Sig in</a></li>
                    <li><a href="login">Log in</a></li> 
                {/if}
                
           </ul>      
        </div>  
    </nav>