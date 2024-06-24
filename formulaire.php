<?php
#permet d'activé l'apercu d'erreurs dans le code
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); // tout type d'erreur

//on defini des constants de connexion à la BDD
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

# donc la actuellement on est connecter à la BDD marie sur mon PC.
# ton connecteur c'est $_PDO['DB_WRITE'] , c'est lui qui va te permettre de faire le pont entre ton serveur Apache et Mysql (ou MariaDB)
# c'est cette variable $_PDO['DB_WRITE'] qui va te permettre de construire tes requetes. 

# var_dump($_POST); , je sais pas si tu connais var_dump, mais il permet de voir le contenu des tableau rapidement.
# lorsque la personne va saisir ses informations et envoyer les données c'est sous forme de POST ( c'est toi qui l'a défini dans ton <form>
# il y a possibilité de faire aussi en GET , c'est à dire que les infos saisies passent par l'URL (beaucoup moin propre).

# sur ton bouton "envoyer" j'ai défini un name : <input id="bouton" type="submit" value="Envoyer" name="save">
# il va me permettre de vérifier si le bouton a été cliqué , qu'elle existe, si le bouton n'est pas cliquer la variable du formulaire
# ne peut pas exister CQFD

// bouton cliqué (puisque isset verifie si la variable existe)
if(isset($_POST['save'])) {
	
	// bon on va faire basique mais en gros en temps normal , il faut faire la verification si l'adresse mail est bonne 
	// comme ceci : 
	/*if (!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
    // invalid emailaddress
	}
	*/
	
	// par contre on va verifier quand même l'existance des variables et des valeurs envoyés
	// la c'est une condition avec && (AND) donc il faut que toutes les conditions soient rempli pour passer dans le IF sinon ....
	if(isset($_POST['fname']) && 
	isset($_POST['subject']) &&
	isset($_POST['mail']) &&
	isset($_POST['content'])) {
		
		// la on écrit la requete 
		$_REQ  = 'INSERT INTO consultations (consultation_fname ,consultation_subject ,consultation_content ,consultation_mail ,consultation_ip)' .PHP_EOL;
		$_REQ .= ' VALUES '.PHP_EOL;
		$_REQ .= '(? ,? ,? ,? ,? )'.PHP_EOL;
		
		// donc la on a contruit la requete, il y a 5 ? , cela veut dire qu'il attend 5 valeurs dans la requete.
		// maintenant on va préparer la requete : 
		$_QUERY = $_PDO['DB_WRITE']->prepare($_REQ);
		
		//$_QUERY contient la requete préparer 
		
		//on va préparer le tableau de données (5 données)
		$_DATA = array();
		$_DATA[] = $_POST['fname'];
		$_DATA[] = $_POST['subject'];
		$_DATA[] = $_POST['content'];
		$_DATA[] = $_POST['mail'];
		$_DATA[] = $_SERVER['REMOTE_ADDR']; //la c'est une super variable (GLOBAL) elle contient pas mal d'infos dont l'addresse IP du visiteur.
		
		
		// on execute la requete, si c'est ok bah on va refaire venir la personne sur le formulaire
		if($_QUERY->execute($_DATA)) {
			header('location:/contact.php');
		}
		else { // la ca veut dire que ton enregistrement c'est mal effectué
			
		}
	}
	else {
		// souci : il y a des variables manquante !
		// peut etre indiquer une erreur , je sais pas ^^
	}
	
}
?>




