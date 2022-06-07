<?php
require_once('..\app\Config\constantes.php');
require_once('..\vendor\autoload.php');
use App\Models\Usuario;

$user = Usuario::getInstancia();
$user->setNombre("Virginia");
$user->setUsuario("vir");
$user->setPsw("vir");
$user->setPerfil("user");
$user->setEntity();

?>