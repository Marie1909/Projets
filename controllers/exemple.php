<?php
$template = new template('exemple');

$v = "<hr>";
$v .= "c'est un test de variable html";
$v .= "<br>";


$parser = array();

$parser['sgsniglvlshgogfnboiggmizg'] = "j'aime le chocolat";
$parser['variable_test'] = $v;

# premier parametre : nom de ton fichier à charger
# second parametre : le tableau de parsing
echo $template->display("index",$parser);

# actuellement il va chercher le template index dans le dossier exemple dans : 
# projets\public\default\templates\exemple\index.html
# si tu souhaites changer de dossier "public" , il faudra modifier la ligne 4 de la class template situé dans le dossier core
# si tu souhaites changer de dossier "default" , il faudra modifier la ligne 5 de la class template situé dans le dossier core
# si tu souhaites changer l'extension "html" , il faudra modifier la ligne 6 de la class template situé dans le dossier core

$parser = array();

$parser['dgfshdhd'] = "mouai";

# premier parametre : nom de ton fichier à charger
# second parametre : le tableau de parsing
echo $template->display("dossier/index",$parser);