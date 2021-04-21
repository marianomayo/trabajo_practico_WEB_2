<?php
require_once './model/ModelModifierPantalon.php';
require_once './model/ModelModifierMarca.php';
require_once './model/ModelPantalones.php';
require_once './model/ModelMarca.php';
require_once './view/View.php';

class modifierPantalonController{
    private $view;
    private $modelMarca;
    private $modelModifierPantalon;
    private $modelPantalon;
    private $modelModifierMarca;

    function __construct(){
        $this->view= new View();
        $this->modelMarca = new ModelMarca();
        $this->modelModifierPantalon = new ModelModifierPantalon();
        $this->modelPantalon = new ModelPantalones();
        $this->modelModifierMarca = new ModelModifierMarca();
        
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
    
    function insertPantalon(){
        $this->checkLoggedInAdmin();
        
        if((isset($_POST['nombre'])) &&(isset($_POST['talle'])) &&(isset($_POST['color'])) &&(isset($_POST['tela']))
        &&(isset($_POST['precio'])) &&(isset($_POST['marca'])) && (isset($_FILES['img']))){
            if((!empty($_POST['nombre'])) &&(!empty($_POST['talle'])) &&(!empty($_POST['color'])) &&(!empty($_POST['tela']))
            &&(!empty($_POST['precio'])) &&(!empty($_POST['marca'])) && (!empty($_FILES['img']))){
                $capturas= getcwd()."/capturas/";
                $destino= tempnam($capturas,$_FILES['img']['tmp_name']);
                move_uploaded_file($_FILES['img']['tmp_name'], $destino);
                $destino= basename($destino);
                
                $nombre=$_POST['nombre'];
                $talle=$_POST['talle'];
                $color=$_POST['color'];
                $tela=$_POST['tela'];
                $precio=$_POST['precio'];
                $marcas=$_POST['marca'];        
                $this->modelModifierPantalon->addPpantalon($nombre,$talle,$color,$tela,$precio,$destino,$marcas);
                $this->view->volverlocation(); 
        }else{
            $this->view->showError("faltan datos obligatorios");
        }
        }       
     }    

    function borrarPantalon($params = null){
        $this->checkLoggedInAdmin();
        $id_borrar= $params[':ID'];
        $this->modelModifierPantalon->deletPantalon($id_borrar);        
        $this->view->volverlocation();   
    }  
   
    function editPantalon(){
        $this->checkLoggedInAdmin();
        if((isset($_POST['nombre_edit'])) &&(isset($_POST['talle_edit'])) &&(isset($_POST['color_edit'])) &&(isset($_POST['tela_edit']))
        &&(isset($_POST['precio_edit'])) &&(isset($_POST['marca_edit']))){
            if((!empty($_POST['id'])) &&(!empty($_POST['nombre_edit'])) &&(!empty($_POST['talle_edit'])) &&(!empty($_POST['color_edit']))
            &&(!empty($_POST['tela_edit'])) &&(!empty($_POST['precio_edit'])) &&(!empty($_POST['marca_edit']))){
                $dato =$_POST['id'];
                $nombre_editar=$_POST['nombre_edit'];
                $talle_editar=$_POST['talle_edit'];
                $color_editar=$_POST['color_edit'];
                $tela_editar=$_POST['tela_edit'];
                $precio_editar=$_POST['precio_edit'];
                $marca=$_POST['marca_edit'];
                
                
                if(!empty($_POST['img_edit'])){
                    $imagen=$_POST['img_edit'];
                }else{
                    $dat= $this->modelPantalon->getImageId($dato);
                    $imagen=$dat['imagen'];

                    if(!empty($_POST['borrarImg'])){
                        $imagen= null;
                    }
                }
                $this->modelModifierPantalon->editarPantalon($nombre_editar,$talle_editar,$color_editar, $tela_editar, $precio_editar,$imagen, $marca, $dato);         
                $this->view->volverlocation();
            }else{
                $this->view->showError("faltan datos obligatorios");
            }
         }
    }  
    
    function agregarMarca(){
        $this->checkLoggedInAdmin();
        if(isset($_POST['marca']) && isset($_POST['descripcion'])){
            if((!empty($_POST['marca'])) && (!empty($_POST['descripcion']))){
                $marca=$_POST['marca'];
                $descripcion=$_POST['descripcion'];
                $this->modelModifierMarca->addMarca($marca, $descripcion);
                $this->view->volverlocation();
        }else{
            $this->view->showError("faltan datos obligatorios");
        }
        }
    }
    
    function borrarMarca($params = null){
        $this->checkLoggedInAdmin();
        $id_borrarMarca= $params[':ID'];
        $dato = $this->modelMarca->getPantalonByMarca($id_borrarMarca);
        if(count($dato) == 0){
            $this->modelModifierMarca->deletMarca($id_borrarMarca); 
            $this->view->volverlocation(); 
        }else if(count($dato) > 0){
            $marca = $this->modelMarca->getByEditMarca($id_borrarMarca);
            $this->view->confirmarEliminacionMarca($id_borrarMarca, $marca);
        }
    }
    
    function confirmarElBorrado($params = null){
        $this->checkLoggedInAdmin();
        $id_borrarMarca= $params[':ID'];
        $this->modelModifierMarca->deletMarca($id_borrarMarca); 
        $this->view->volverlocation(); 
    }
    
    function editMarca(){
        $this->checkLoggedInAdmin();
        if((isset($_POST['id_edit'])) && (isset($_POST['marca_edit'])) && (isset($_POST['descripcion_edit']))){
            if((!empty($_POST['id_edit'])) && (!empty($_POST['marca_edit'])) && (!empty($_POST['descripcion_edit']))){
            $dato =$_POST['id_edit'];
            $marca_editar=$_POST['marca_edit'];
            $descrip_editar=$_POST['descripcion_edit'];
            $this->modelModifierMarca->editarMarca($marca_editar, $descrip_editar, $dato); 
            $this->view->volverlocation();  
        }else{
            $this->view->showError("faltan datos obligatorios");
        }
        }
    }
}