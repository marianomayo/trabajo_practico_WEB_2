<?php
require_once './controller/UserController.php';

class UserModel {
    private $db;

    function __construct(){
        $this->db= new PDO('mysql:host=localhost;'.'dbname=db_ropa;charset=utf8', 'root', '');        
    }
    
    function getusuario($nombre){
        $query= $this->db->prepare('SELECT * FROM usuario WHERE nombre=?');
        $query->execute(array($nombre));
        $result = $query->fetch(PDO::FETCH_OBJ);
        return $result;
    }

    function getUsuarioById($id_ususario){
        $query= $this->db->prepare('SELECT * FROM usuario WHERE id=?');
        $query->execute(array($id_ususario));
        $result = $query->fetch(PDO::FETCH_OBJ);
        return $result;
    }

    function getUsuariosMenosConectado($nombre){
        $query = $this->db->prepare('SELECT * FROM usuario WHERE nombre<>?');
        $query->execute(array($nombre));
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    function deletUsuario($id_usuario) {
        $query=$this->db->prepare('DELETE FROM usuario WHERE id=?');
        $query->execute(array($id_usuario));
    }

    function makeOrRemoveAdmin($admin ,$id_usuario) {
        $query=$this->db->prepare('UPDATE usuario SET administrador=? WHERE id=?');
        $query->execute(array($admin, $id_usuario));
    }

    function cargaUsuario($nombre,$hash){
        $query= $this->db->prepare('INSERT INTO usuario (nombre,password) VALUE (?,?)');
        $query->execute(array($nombre,$hash));
    }

    
}
