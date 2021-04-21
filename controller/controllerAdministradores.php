<?php
require_once './model/UserModel.php';
require_once './view/View.php';

class controllerAdministradores{ 
    private $view;
    private $modelUsuario;
    function __construct(){
        $this->view= new View();
        $this->modelUsuario = new UserModel();
        if(session_status() !== PHP_SESSION_ACTIVE){
            session_start();
        }
    }
    private function checkLoggedInAdmin(){
        if(session_status() !== PHP_SESSION_ACTIVE){
            session_start();
        }
        if(!isset($_SESSION["USERNAME_admin"])){
            $this->view->irARegistrar();
            die();
        }
    }

    function mostrarTablaAdministradores(){
        $this->checkLoggedInAdmin();
        $nombre=$_SESSION['USERNAME_admin'];       
        $dato = $this->modelUsuario->getUsuariosMenosConectado($nombre);       
        $this->view->showAdministradores($dato);               
    }

    function eliminarUsuario($params = null){
        $this->checkLoggedInAdmin();
        $id_usuario = $params[':ID'];
        $dato=$this->modelUsuario->getUsuarioById($id_usuario);       
        if($dato->administrador == 1){            
            $this->view->confirmarEliminacionAdmin($id_usuario, $dato);
        }else if($dato->administrador != 1){
            $this->modelUsuario->deletUsuario($id_usuario);
            $this->view->locationAdministrador();
        }
    }
    
    function confirmarBorradoAdmin($params = null){
        $this->checkLoggedInAdmin();
        $id_borrarAdmin= $params[':ID'];
        $this->modelUsuario->deletUsuario($id_borrarAdmin);
        $this->view->locationAdministrador();
    }

    function hacerAdmin($params = null){
        $this->checkLoggedInAdmin();
        $admin = 1;
        $id_usuario = $params[':ID'];
        $this->modelUsuario->makeOrRemoveAdmin($admin, $id_usuario);
        $this->view->locationAdministrador();
    }

    function quitarAdmin($params = null) {
        $this->checkLoggedInAdmin();
        $admin = 0;
        $id_usuario = $params[':ID'];
        $this->modelUsuario->makeOrRemoveAdmin($admin, $id_usuario);
        $this->view->locationAdministrador();
    }
}