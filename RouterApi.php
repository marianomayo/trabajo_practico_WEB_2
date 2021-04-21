<?php
require_once './libs/smarty/RouterClass.php';
require_once './api/apiPantalonController.php';


$router = new Router();

$router->addRoute("comentario", "GET", "apiPantalonController", "getComentarios");
$router->addRoute("comentario/:ID", "GET", "apiPantalonController", "getComentariosById");
$router->addRoute('borrarComentario/:ID', 'DELETE', 'apiPantalonController', 'deleteComentariosById');
$router->addRoute('comentario', 'POST', 'apiPantalonController', 'addComentario');


 $router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']); 