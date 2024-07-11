<?php
$template = new template('who');

# premier parametre : nom de ton fichier à charger
# second parametre : le tableau de parsing
echo $template->display("index",$parser);
?>