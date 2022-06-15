<?php
require('../view/require/header_view.php');
require('../view/require/login_view.php');
$css = file_get_contents('../view/css/style.css');
echo '<style>'. $css .'</style>';

?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta name='author' content='Virginia Ordoño Bernier'>
    <title>Template</title>
</head>

<body>
    <main>
        Hola esto es un main
    </main>
</body>

</html>