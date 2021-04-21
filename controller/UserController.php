<?php
require_once './model/UserModel.php';
require_once './view/UserView.php';

class UserController{
    private $model;
    private $view;


    function __construct(){
        $this->view= new UserView();
        $this->model= new UserModel();         
    }   
    function iniciarsesion(){
        if(!empty ($_SESSION["USERNAME_admin"]) || !empty($_SESSION["USERNAME_usuario"])){
            $this->view->volverALaHome();
        }else{  
            $this->view->formSesion();
        }
    }

    function registrarse(){
        if(!empty ($_SESSION["USERNAME_admin"]) || !empty($_SESSION["USERNAME_usuario"])){
            $this->view->volverALaHome();
        }else{  
            $this->view->formRegistro();
        }
    }

    function verificaForm(){
        if((!empty($_POST['usuario']))&&(!empty($_POST['contraseña']))){
            $nombre= $_POST['usuario'];
            $contraseña= $_POST['contraseña'];     
            if(isset($nombre)){
                $BDusuario= $this->model->getusuario($nombre);
                if(isset($BDusuario) && $BDusuario){               
                    if(password_verify($contraseña, $BDusuario->password)){
                        if($BDusuario->administrador == 1){
                            session_start();
                            $_SESSION['USERNAME_admin']= $BDusuario->nombre;
                            $this->view->volverALaHome();                    
                        }
                        elseif($BDusuario->administrador == 0){
                            session_start();
                            $_SESSION['USERNAME_usuario']= $BDusuario->nombre;
                            $this->view->volverALaHome();                
                        }
                    }else{
                        $this->view->formSesion("Contraseña Incorrecta");                   
                    }
                }else{
                    $this->view->formSesion("el usuario no existe");             
                }
            }   
        }else{
            $this->view->formSesion("el Ingrese los datos obligatorios"); 
        }
    }

    function logout(){
        session_start();
        session_destroy();
        $this->view->volverARegistro();
    }

    function sigin(){
        
        if((!empty($_POST['usuario']))&&(!empty($_POST['contraseña']))){

            $nombre= $_POST['usuario'];
            $contraseña= $_POST['contraseña'];
            $tamañoContraseña = strlen($contraseña);
            if(isset($nombre) && $tamañoContraseña >=6){            
                $BDusuario= $this->model->getusuario($nombre); 
                if($BDusuario == false){    
                    $hash = password_hash($contraseña,PASSWORD_DEFAULT);
                    $this->model->cargaUsuario($nombre,$hash);
                    $usuario=$this->model->getusuario($nombre);
                    session_start();
                    $_SESSION['USERNAME_usuario']= $usuario->nombre;               
                    $this->view->volverALaHome();
                }else if($BDusuario == true){
                    $this->view->formRegistro("El usuario ya existe");
                }
            }else if(isset($nombre) && $tamañoContraseña < 6){
                $this->view->formRegistro("contraseña muy corta");
            }
        }else{
            $this->view->formRegistro("Ingrese los datos obligatorios"); 
        }
    }
}
