<?php
$template = new template('index');

# premier parametre : nom de ton fichier à charger
# second parametre : le tableau de parsing
echo $template->display("index",$parser);
?>