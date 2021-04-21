<?php
    require_once 'controller/PantalonController.php';
    require_once 'controller/modifierPantalonController.php';
    require_once 'controller/controllerAdministradores.php';
    require_once 'controller/UserController.php';
    require_once './libs/smarty/RouterClass.php';
    
    // CONSTANTES PARA RUTEO
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
    define("LOGOUT", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/logout');
    $r = new Router();
        
    $r->addRoute("verificaForm", "POST", "UserController", "verificaForm");   
    $r->addRoute("login", "GET", "UserController", "iniciarsesion");
    $r->addRoute("logout", "GET", "UserController", "logout");
    $r->addRoute("sigin", "GET", "UserController", "registrarse");
    $r->addRoute("sigin", "POST", "UserController", "sigin");
    
    
    $r->addRoute("home", "GET", "PantalonController", "home");
    $r->addRoute("ropa", "GET", "PantalonController", "MostrarPantalones");
    $r->addRoute("tabla_de_pantalones", "GET", "PantalonController", "mostrarTabla");

    $r->addRoute("comentario/:ID", "GET", "PantalonController", "mostrarComentario");
    $r->addRoute("tablaAdministradore", "GET", "controllerAdministradores", "mostrarTablaAdministradores");
    $r->addRoute("eliminarUsuario/:ID", "GET", "controllerAdministradores", "eliminarUsuario");
    $r->addRoute("confirmarBorradoAdmin/:ID", "GET", "controllerAdministradores", "confirmarBorradoAdmin");
    $r->addRoute("hacerAdmin/:ID", "GET", "controllerAdministradores", "hacerAdmin");
    $r->addRoute("quitarAdmin/:ID", "GET", "controllerAdministradores", "quitarAdmin");
    
    //ACCION PARA FILTRAR MARCA
    $r->addRoute("filtro/:ID", "GET", "PantalonController", "filtrar");
    $r->addRoute("verMas/:ID", "GET", "PantalonController", "verMas");
    
    //acciones de la tabla, agregar, borrar y editar Marca
    $r->addRoute("editMarca/:ID", "GET", "PantalonController", "showFormEditMarca");
    $r->addRoute("borrarMarca/:ID", "GET", "modifierPantalonController", "borrarMarca");
    $r->addRoute("confirmarElBorrado/:ID", "GET", "modifierPantalonController", "confirmarElBorrado");
    $r->addRoute("agregarMarca", "POST", "modifierPantalonController", "agregarMarca");

    //acciones de la tabla, agregar, borrar y editar Pantalon
    $r->addRoute("editPantalon/:ID", "GET", "PantalonController", "showFormEditPantalon");
    $r->addRoute("borrarPantalon/:ID", "GET", "modifierPantalonController", "borrarPantalon");
    $r->addRoute("agregarPantalon", "POST", "modifierPantalonController", "insertPantalon");

    //formularios
    $r->addRoute("editPantalon", "POST", "modifierPantalonController", "editPantalon"); 
    $r->addRoute("editMarca", "POST", "modifierPantalonController", "editMarca"); 
   
    //Ruta por defecto.
    $r->setDefaultRoute("PantalonController", "home");

    //run
    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 

    //Advance
    $r->addRoute("autocompletar", "GET", "TasksAdvanceController", "AutoCompletar");
?>