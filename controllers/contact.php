<?php
$template = new template('contact');

// bon on va verifier si l'utiliseur à déja fait une demande histoire que tu sois pas SPAM
$_REQ = "SELECT * FROM consultations WHERE consultation_ip = ?";
$_QUERY = $_PDO['DB_WRITE']->prepare($_REQ);

//$_QUERY contient la requete préparer 

//on va préparer le tableau de données (5 données)
$_DATA = array();
$_DATA[] = $_SERVER['REMOTE_ADDR'];
$_QUERY->execute($_DATA);

// la on récupere le résultat de ta requete , si il n'y a pas de résultat, fetch te retourne false ou NULL
$_RESULT = $_QUERY->fetch(PDO::FETCH_ASSOC);

// si il n'y a pas de résultat alors on affiche le formulaire
// bien sur on pourrai aller plus loin, en disant que si tu l'as consulté, dans ce cas, il a à nouveau accés au formulaire.
// ou alors avec un délai de réponse, et dans le cas contraire si pas de réponse au bout de 1 semaine, bah le formulaire est à nouveau accessible.

if(!$_RESULT) {

	if(isset($_SESSION['ERROR'])) {
		$parser['class'] = 'warning';
		$parser['content'] = $_SESSION['ERROR'];
		$parser['_ALERT'] = $template->display("message",$parser);
		unset($_SESSION['ERROR']);
		session_destroy();
	}
	
	$parser['_FORMULAIRE'] = $template->display("formulaire",$parser);
}
else{
	$parser['class'] = 'success';
	$parser['content'] = 'Votre demande est en cours de traitement';
	$parser['_FORMULAIRE'] = $template->display("message",$parser);
}

# premier parametre : nom de ton fichier à charger
# second parametre : le tableau de parsing
echo $template->display("index",$parser);
?>