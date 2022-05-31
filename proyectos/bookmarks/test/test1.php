<?php
require_once('..\app\Config\constantes.php');
require_once('..\vendor\autoload.php');
use App\Models\Usuario;
use App\Models\Bookmark;

//Obtener usuario por id
// echo "<h3>Obtiene usuario por id</h3>";
// $user = Usuario::getInstancia();
// $user->setId(1);
// $result = $user->getById();
// foreach ($result as $value) {
//     var_dump($value['nombre']);
// }

//Obtener usuario por login
// echo "<h3>Obtiene usuario por login</h3>";
// $user = Usuario::getInstancia();
// $user->setUser("orbevi");
// $user->setPsw("orbevi");
// $result = $user->getByLogin();
// foreach ($result as $value) {
//     var_dump($value['nombre']);
// }

//Obtiene bookmarks de usuario
echo "<h3>Obtiene bookmarks de usuario</h3>";
$user = Usuario::getInstancia();

$user->setUser("orbevi");
$user->setPsw("orbevi");
$result = $user->getByLogin();
foreach ($result as $key => $value) {
    $id = $value['id'];
    $name = $value['nombre'];
}

$bm = Bookmark::getInstancia();
$bm->setIdusuario($id);
$result = $bm->getByUserId();

foreach ($result as $key => $value) {
    $url = $value['bm_ulr'];
    $descripcion = $value['descripcion'];
}

echo('<br>Nombre: '. $name);
echo('<br>Url: '. $url);
echo('<br>Descripción: '. $descripcion);




?>