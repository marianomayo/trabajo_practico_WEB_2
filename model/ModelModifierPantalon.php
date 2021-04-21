<?php
require_once './controller/modifierPantalonController.php';

class ModelModifierPantalon {
    private $db;

    function __construct(){
        $this->db= new PDO('mysql:host=localhost;'.'dbname=db_ropa;charset=utf8', 'root', '');        
    }
    
    function addPpantalon($nombre,$talle,$color,$tela,$precio,$imagen,$marca){
        $query=$this->db->prepare('INSERT INTO pantalon (nombre,talle,color,tela,precio,imagen,id_marca)
        VALUE (?,?,?,?,?,?,?)');
        $query->execute(array($nombre,$talle,$color,$tela,$precio,$imagen,$marca));        
    }  

    function deletPantalon($dato){
        $query=$this->db->prepare('DELETE FROM pantalon WHERE id_pantalones=?');
        $query->execute(array($dato));
    }

    function editarPantalon($nombre,$talle,$color,$tela,$precio,$imagen,$marca,$dato){      
        $query=$this->db->prepare('UPDATE pantalon SET nombre=?,talle=?,color=?,tela=?,precio=?,imagen=?,id_marca=? WHERE id_pantalones=?');
        $query->execute(array($nombre,$talle,$color,$tela,$precio,$imagen,$marca,$dato));
    }

}
