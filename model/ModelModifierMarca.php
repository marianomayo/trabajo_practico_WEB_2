<?php
require_once './controller/modifierPantalonController.php';

class ModelModifierMarca {
    private $db;

    function __construct(){
        $this->db= new PDO('mysql:host=localhost;'.'dbname=db_ropa;charset=utf8', 'root', '');        
    }

    function addMarca($marca, $descripcion){
        $query=$this->db->prepare('INSERT INTO marca (descripcion, marca)
        VALUE (?,?)');
        $query->execute(array($descripcion, $marca));  
    }

    function editarMarca($edit_marca, $descripcion_editar, $dato){
        $query=$this->db->prepare('UPDATE marca SET descripcion=?, marca=? WHERE id_marca=?');
        $query->execute(array($descripcion_editar, $edit_marca, $dato));
    }
    
    function deletMarca($dato){
        $query=$this->db->prepare('DELETE FROM marca WHERE id_marca=?');
        $query->execute(array($dato));
    }

}