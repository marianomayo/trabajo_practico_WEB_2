<?php
require_once './model/modelComentarios.php';
require_once 'APIController.php';
class apiPantalonController extends ApiController{

    function __construct(){
        parent::__construct();
        $this->apiView = new apiView();
        $this->modelComentario= new modelComentarios();
    }

    public function getComentarios($params = null){
        $dato=$this->modelComentario->getComentarios();
        $this->apiView->response($dato, 200);
    }  
    
    public function getComentariosById($params = null){
        $id_comentario = $params[':ID'];
        $dato = $this->modelComentario->getComentarioPorIdDePantalon($id_comentario);
        $this->apiView->response($dato, 200);
    }

    public function deleteComentariosById($params = null){
        $id_comentario = $params[':ID'];
        $result =  $this->modelComentario->deleteComentarioId($id_comentario);
        if ($result > 0) {
            $this->apiView->response("el comentario con el id=$id_comentario fue eliminada", 200);
        }
        else{
            $this->apiView->response("el comentario con el id=$id_comentario no existe", 404);
        }
    }

    public function addComentario($params = null){
        $body = $this->getData();
        $comentario = $body->comentarios;
        $puntaje = $body->puntaje;
        $commentedBy = $body->commentedBy;
        $id_coment_pantalon = $body->id_coment_pantalon;

        $id_dato = $this->modelComentario->agregarComentarioATabla($comentario, $puntaje, $commentedBy, $id_coment_pantalon);
        if (!empty($id_dato)) {
            $this->apiView->response("el comentario fue agregado con exito", 200);
        }
        else{
            $this->apiView->response("el comentario no se pudo insertar", 404);
        }
    }
}


