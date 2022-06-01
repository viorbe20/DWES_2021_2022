<?php
require "../vendor/autoload.php";
require "../app/Config/constantes.php";

//Enrutador
use App\Core\Router;
use App\Controllers\HomeController;
use App\Controllers\UsuarioController;
use App\Controllers\BookmarkController;

session_start();

if (!isset($_SESSION['user']['profile'] )) {
    $_SESSION['user']['profile'] = "guest"; 
}

$router = new Router();

//Enrutamiento a la página de inicio
$router->add(array(
    'name'=>'home',
    'path'=>'/^\/home$/',
    'action'=>[HomeController::class, 'indexAction'],  
    'auth'=>["guest"]
));

//Enrutamiento logout
$router->add(array(
    'name'=>'logout',
    'path'=>'/^\/home\/logout$/',
    'action'=>[UsuarioController::class, 'logoutAction'],
    'auth'=>["admin", "user"]
));

//Enrutamiento a la página de registro de usuario
$router->add(array(
    'name'=>'signup',
    'path'=>'/^\/home\/signup$/',
    'action'=>[UsuarioController::class, 'signupAction'],
    'auth'=>["admin", "guest"]
));

//Petición y respuesta
$request = str_replace(DIRBASEURL,'',$_SERVER['REQUEST_URI']);
$route = $router->matchs($request);

if ($route) {
    if (!in_array($_SESSION['user']['profile'] , $route['auth'])) {
        header("location:" . DIRBASEURL . "/home");
    }else{
        $controllerName = $route['action'][0];
        $actionName = $route['action'][1];
        $controller = new $controllerName;
        $controller->$actionName($request);
    }
}else{
    echo "No route";
}