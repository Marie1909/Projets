<?php
require_once (dirname(__FILE__) . '/conf/inc.php');
require_once (ROOT_PATH . '/lang/fr.php');
require_once (ROOT_PATH . '/core/class.template.php');

var_dump($_SERVER);
# on inclus le header par defaut
$template = new template('');
$parser = array();

if(isset($_GET['controller'])) {

    $_C = strtolower($_GET['controller']);

    //https://blog.smarchal.com/operateur-ternaire-php
    # condition ternaire : permet de faire un if et un else condensé
    $_C = (isset($_C) ? $_C : 'index');

	$parser['title'] = $_LANG['title_'.$_C];

	$parser['_HEADER'] = $template->display("header",$parser);
	$parser['_TOPMENU'] = $template->display("topMenu",$parser);
	$parser['_FOOTER'] = $template->display("footer",$parser);
	
	
    switch($_C) {
        case 'index':
        case 'contact':
        case 'cv':
        case 'formulaire':
        case 'portfolio':
        case 'who':
        case 'exemple':
            include_once(ROOT_PATH . '/controllers/' . $_C . '.php');
        break;
        default:
            header('location:/index/');
        break;
    }
}
else{
	
	$parser['title'] = $_LANG['title_index'];

	$parser['_HEADER'] = $template->display("header",$parser);
	$parser['_TOPMENU'] = $template->display("topMenu",$parser);
	$parser['_FOOTER'] = $template->display("footer",$parser);
    # on inclus le header par defaut
    include_once(ROOT_PATH . '/controllers/index.php');
}
?>