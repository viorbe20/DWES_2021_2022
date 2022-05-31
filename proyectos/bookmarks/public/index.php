<?php
require "../vendor/autoload.php";
require "../app/Config/constantes.php";

//Enrutador
use App\Core\Router;
use App\Controllers\DefaultController;

session_start();

if (!isset($_SESSION['user']['profile'] )) {
    $_SESSION['user']['profile'] = "guest"; 
}

$router = new Router();

//Enrutamiento a la página de inicio
$router->add(array(
    'name'=>'index',
    'path'=>'/^\/bookmarks$/',
    'action'=>[DefaultController::class, 'indexAction'],  
    'auth'=>["admin", "guest"]
));

// //Enrutamiento logout
$router->add(array(
    'name'=>'logout',
    'path'=>'/^\/bookmarks\/logout$/',
    'action'=>[UserController::class, 'logoutAction'],
    'auth'=>["admin"]
));


//Petición y respuesta
$request = str_replace(DIRBASEURL,'',$_SERVER['REQUEST_URI']);
$route = $router->matchs($request);

if ($route) {
    if (!in_array($_SESSION['user']['profile'] , $route['auth'])) {
        header("location:" . DIRBASEURL . "/bookmarks");
    }else{
        $controllerName = $route['action'][0];
        $actionName = $route['action'][1];
        $controller = new $controllerName;
        $controller->$actionName($request);
    }
}else{
    echo "No route";
}