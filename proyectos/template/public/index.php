<?php
require "../vendor/autoload.php";
require "../app/Config/constantes.php";

//Enrutador
use App\Core\Router;
use App\Controllers\DefaultController;
use App\Controllers\UserController;

session_start();

if (!isset($_SESSION['user']['profile'] )) {
    $_SESSION['user']['profile'] = "guest"; 
}

$router = new Router();

//Enrutamiento a la página de inicio
$router->add(array(
    'name'=>'index',
    'path'=>'/^\/index$/',
    'action'=>[DefaultController::class, 'indexAction'],  
    'auth'=>["admin", "guest"]
));

// //Enrutamiento logout
$router->add(array(
    'name'=>'logout',
    'path'=>'/^\/index\/logout$/',
    'action'=>[UserController::class, 'logoutAction'],
    'auth'=>["admin"]
));

//Enrutamiento a la página de registro de usuario
$router->add(array(
    'name'=>'signup',
    'path'=>'/^\/index\/signup$/',
    'action'=>[UserController::class, 'signupAction'],
    'auth'=>["admin", "guest"]
));

// //Enrutamiento a página para editar palabra
// $router->add(array(
//     'name'=>'editWord',
//     'path'=>'/^\/wordsearch\/edit\/\d{1,3}\/\w{1,}$/',
//     'action'=>[WordController::class, 'editWordAction'],
//     'auth'=>["admin"]
// ));

// //Enrutamiento a página para eliminar palabra
// $router->add(array(
//     'name'=>'deleteWord',
//     'path'=>'/^\/wordsearch\/delete\/\d{1,3}\/\w{1,}$/',
//     'action'=>[WordController::class, 'deleteWordAction'],
//     'auth'=>["admin"]
// ));



//Petición y respuesta
$request = str_replace(DIRBASEURL,'',$_SERVER['REQUEST_URI']);
$route = $router->matchs($request);

if ($route) {
    if (!in_array($_SESSION['user']['profile'] , $route['auth'])) {
        header("location:" . DIRBASEURL . "/index");
    }else{
        $controllerName = $route['action'][0];
        $actionName = $route['action'][1];
        $controller = new $controllerName;
        $controller->$actionName($request);
    }
}else{
    var_dump($route);
    echo "No route";
}