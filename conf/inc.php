<?php
#permet d'activé l'apercu d'erreurs dans le code
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); // tout type d'erreur

//on defini des constants de connexion à la BDD
define('ROOT_PATH',dirname(dirname(__FILE__)));
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASSWORD','');
define('DB_DATABASE','marie');
define('DB_PORT',3306); // le port n'est pas obligatoire lors d'une connexion à une BDD surtout si tu n'as pas change le port par defaut

# on créer un tableau : (il va contenir nos connexions PDO si il y en a plusieurs :)
$_PDO = array();

# on créer la premier connexion PDO 
$_PDO['DB_WRITE'] = new PDO(
	'mysql:host=' . DB_HOST . ';dbname=' . DB_DATABASE . ';charset=utf8',
	DB_USER,
	DB_PASSWORD
);
# on indique qu'il retourne les erreurs SQL si il y en a 
$_PDO['DB_WRITE']->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>