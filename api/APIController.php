<?php 

require_once './api/apiView.php';

abstract class ApiController {
    protected $modelComentario; // lo instancia el hijo
    protected $apiView;

    private $data; 

    public function __construct() {
        $this->apiView = new APIView();
        $this->data = file_get_contents("php://input"); 
    }

    function getData(){ 
        return json_decode($this->data); 
    }  
}