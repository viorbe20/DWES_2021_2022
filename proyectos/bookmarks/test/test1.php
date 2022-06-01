<?php
require_once('..\app\Config\constantes.php');
require_once('..\vendor\autoload.php');
use App\Models\Usuario;
use App\Models\Bookmark;

$bm = Bookmark::getInstancia();
$user = Usuario::getInstancia();
$blockedUsers = array();
$user->setBloqueado(1);
$blockedUsers = $user->getBlockedUsers();
//var_dump($blockedUsers);
foreach ($blockedUsers as $key => $value) {
    echo $value['nombre'] . '</br>';
    // ["user"]=> string(5) "orbev" 
	// ["psw"]=> string(5) "orbev" 
	// ["email"]=> string(16) "vir@virginia.com" 
	// ["perfil"]=> string(4) "user" [
}






?>