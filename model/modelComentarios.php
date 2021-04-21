<?php

class modelComentarios{
    private $db;
    function __construct(){
        $this->db= new PDO('mysql:host=localhost;'.'dbname=db_ropa;charset=utf8', 'root', '');        
    }

    function getComentarios(){
        $query = $this->db->prepare('SELECT * FROM comentarios');
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    function getComentarioPorIdDePantalon($id_comentario){
        $query = $this->db->prepare("SELECT * FROM comentarios WHERE id_coment_pantalon = ?");
        $query->execute(array($id_comentario));
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    function deleteComentarioId($id_comentario){
        $query=$this->db->prepare('DELETE FROM comentarios WHERE id=?');
        $query->execute(array($id_comentario));
        return $query->rowCount();
    }

    function agregarComentarioATabla($comentario, $puntaje, $commentedBy, $id_coment_pantalon){
        $query=$this->db->prepare('INSERT INTO comentarios (comentarios, puntaje, commentedBy, id_coment_pantalon ) VALUE (?,?,?,?)');
        $query->execute(array($comentario, $puntaje, $commentedBy, $id_coment_pantalon)); 
        return $this->db->lastInsertId();
    }
     

}