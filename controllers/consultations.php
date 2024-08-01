<?php
$template = new template('consultations');

//--------------------------------------------------------------------------
//SECTION LOGIN 
if(isset($_POST['action'])) {

    $_REQ = "SELECT * FROM users WHERE user_login = ? AND user_password = ?";
    $_QUERY = $_PDO['DB_WRITE']->prepare($_REQ);

    $_DATA = array();
    $_DATA[] = $_POST['login'];
    $_DATA[] = crypt::encrypt($_POST['password'],TOKEN);
    $_QUERY->execute($_DATA);

    $_RESULT = $_QUERY->fetch(PDO::FETCH_ASSOC);

    if(!$_RESULT) { //login ou mot de passe incorrect
    }
    else{ //c'est ok !
        $_SESSION['user'] = $_RESULT;
    }
}

//--------------------------------------------------------------------------
//SECTION CONSULTATION
if(isset($_SESSION['user'])) {
    $_REQ = "SELECT * FROM consultations ORDER BY consultation_date_add DESC";
    $_QUERY = $_PDO['DB_WRITE']->prepare($_REQ);

    $_DATA = array();
    $_QUERY->execute($_DATA);

    $_RESULT = $_QUERY->fetchAll(PDO::FETCH_ASSOC);

}

# premier parametre : nom de ton fichier à charger
# second parametre : le tableau de parsing

if(!isset($_SESSION['user'])) {
    echo $template->display("index",$parser);
}
else{
    echo $template->display("consultation",$parser);
}
?>