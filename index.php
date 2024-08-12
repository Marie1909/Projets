<?php
require_once (dirname(__FILE__) . '/conf/inc.php');
require_once (ROOT_PATH . '/lang/fr.php');
require_once (ROOT_PATH . '/core/class.template.php');
require_once (ROOT_PATH . '/core/class.crypt.php');

<<<<<<< Updated upstream
=======
#var_dump($_SERVER);
>>>>>>> Stashed changes
# on inclus le header par defaut
$template = new template('');
$parser = array();
$parser = $_LANG;

if(isset($_GET['controller'])) {

    $_C = strtolower($_GET['controller']);

    //https://blog.smarchal.com/operateur-ternaire-php
    # condition ternaire : permet de faire un if et un else condensé
    $_C = (isset($_C) ? $_C : 'index');

	$parser['title'] = $_LANG['title_'.$_C];
	$parser['current_year'] = date('Y');

	$parser['_HEADER'] = $template->display("header",$parser);
	$parser['_TOPMENU'] = $template->display("topMenu",$parser);
	$parser['_FOOTER'] = $template->display("footer",$parser);
	
	
	$_PATH_CONTROLLER = ROOT_PATH . '/controllers/';
 
    $files = scandir($_PATH_CONTROLLER);
 
    foreach($files as $file){
        if($file != '.' and $file != '..') {
            $page = strtolower(strtr($file,array('.php' => '')));
            if($_C == $page) {
                include_once(ROOT_PATH . '/controllers/' . $file);
            }
        }
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