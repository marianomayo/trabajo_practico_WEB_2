<?php

require_once './controller/PantalonController.php';
require_once './libs/smarty/Smarty.class.php';

class View {

    function __construct(){
        $this->smarty = new Smarty();
        
        if(session_status() !== PHP_SESSION_ACTIVE){
            session_start();
        }               
        if(isset($_SESSION['USERNAME_admin'])){
            $this->smarty->assign('nombre', $_SESSION['USERNAME_admin']);
        }
        else if(isset($_SESSION['USERNAME_usuario'])){
            $this->smarty->assign('nombreUsuario', $_SESSION['USERNAME_usuario']);
        }
    }
    
    //####### FUNCIONES PRINCIPALES DEL VIEW ########
    function nuestraHome(){      
        $this->smarty->display('templates/home.tpl');
    }

     //funcion para mostrar pantalones por categorias
    function ListaPantalonesPorMarca($dato){        
        $this->smarty->assign('marcas', $dato);        
        $this->smarty->display('templates/pantalones_muestra.tpl');
    }

    function listaDePantalones($dato, $datoMarca){
        $this->smarty->assign('titulo','lista de pantalones'); 
        $this->smarty->assign('titulo2','lista de marcas');
        $this->smarty->assign('marcas', $datoMarca);       
        $this->smarty->assign('panta', $dato); 
        $this->smarty->display('templates/listaPantalones.tpl');     
    }

    //###### Funciones especiales ####

    function filtroParaMarcas($dato){ 
        $this->smarty->assign('marca', $dato);
        $this->smarty->display('templates/filtroMarca.tpl');
    }

    function filtroCompleto($dato){
        $this->smarty->assign('marca', $dato);
        $this->smarty->display('templates/filtroCompleto.tpl');
    }

    function mostrarFormularioEditarPantalon($dato,$marca){
        $this->smarty->assign('pantalon', $dato);
        $this->smarty->assign('marca', $marca);
        $this->smarty->display('templates/formularioEditar.tpl');
    }

    function mostrarForumarioEditarMarca($datoMarca){
        $this->smarty->assign('marca', $datoMarca);
        $this->smarty->display('templates/formularioEditarMarca.tpl');
    }
    

    function mostrarFormularioComentario($dato){
        $this->smarty->assign('pantalon', $dato);
        $this->smarty->display('templates/formularioComentario.tpl');
    }

    function showComentarios($dato) {      
        $this->smarty->assign('panta', $dato); 
        $this->smarty->display('templates/comentarioPantalon.tpl');
    }

    function confirmarEliminacionMarca($id_borrarMarca, $dato){
        $this->smarty->assign('marcaAEliminar', $dato); 
        $this->smarty->assign('datoAEliminar', $id_borrarMarca); 
        $this->smarty->display('templates/confirmarEliminacionMarca.tpl');
    }

    function confirmarEliminacionAdmin($id_borrarAdmin, $dato){
        $this->smarty->assign('administradorABorrar', $dato); 
        $this->smarty->assign('id_borrar', $id_borrarAdmin); 
        $this->smarty->display('templates/confirmarEliminacionAdmin.tpl');
    }

    function showAdministradores($dato){
        $this->smarty->assign('usuarios', $dato); 
        $this->smarty->display('templates/tablaAdministradores.tpl');
    }
    
    function volverlocation(){        
        header("Location: ".BASE_URL."tabla_de_pantalones");        
    }

    function irARegistrar(){
        header("Location: ".BASE_URL."login");
    }
   
    function locationAdministrador(){
        header("Location: ".BASE_URL."tablaAdministradore");        
    }

    function showError($mensaje = ""){
        $this->smarty->assign('mensajeError', $mensaje);
        $this->smarty->display('templates/errorIngresos.tpl');
    }
  
    
}

