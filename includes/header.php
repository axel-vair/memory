<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="style/memory.css" />
    <title></title>
</head>
</html>
<?php


session_start();
    if(isset($_POST['deconnexion'])){
        $deconnect = new User();
        $deconnect->disconnect();
    }

    if($_SESSION['login']){
        echo "<!DOCTYPE html>
<html lang='fr'>
<header>
    <nav>
        <ul>
            <li><a href='index.php'>Accueil</a></li>
            <li><a href='profil.php'>Profil</a></li>
            <li>
            <form method='post'><input type='submit' value='deconnexion' name='deconnexion'></form></li>
        </ul>
    </nav>
</header>
</html>";

    } else{
    echo "<!DOCTYPE html>
<html lang='fr'>
<header>
    <nav>
        <ul>
            <li><a href='index.php'>Accueil</a></li>
            <li><a href='connexion.php'>Connexion</a></li>
            <li><a href='inscription.php'>Inscription</a></li>
        </ul>
    </nav>
</header>
</html>";
    }

?>