<?php
require_once (dirname(__FILE__) . '/conf/inc.php');
require_once (dirname(__FILE__) . '/core/class.template.php');

if(isset($_GET['controller'])) {

    $_C = strtolower($_GET['controller']);

    //https://blog.smarchal.com/operateur-ternaire-php
    # condition ternaire : permet de faire un if et un else condensé
    $_C = (isset($_C) ? $_C : 'index');

    # on inclus le header par defaut
    require_once(ROOT_PATH . '/librairies/header.php');

    switch($_C) {
        case 'index':
        case 'contact':
        case 'cv':
        case 'formulaire':
        case 'portfolio':
        case 'who':
            include_once(ROOT_PATH . '/controllers/' . $_C . '.php');
        break;
        default:
            header('location:/index/');
        break;
    }
}
else{
    # on inclus le header par defaut
    require_once(ROOT_PATH . '/librairies/header.php');
    include_once(ROOT_PATH . '/controllers/index.php');
}
?>