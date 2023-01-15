<?php

include "src/User.php";
include "src/Card.php";
include "src/Game.php";
include "src/Score.php";
include "includes/header.php";

$board = new Game();
//$board->cardReturned();
$cards = $board->board();
$_SESSION['cards'] = !isset($_SESSION['cards']) ? $cards : $_SESSION['cards']; // Si session card n'est pas isset alors = $cards, sinon = $_SESSION

$numberOfCardsTurned = 0;
foreach($_SESSION['cards'] as $key => $card) { // boucle pour l'état : si get id == l'idée de la carte cliquée alors on passe à true
    $id = $_GET['id'] ?? null;

    if($_GET['id'] == $card->getIdCard()) { // si get id et la l'id de la carte correspondent
        if($numberOfCardsTurned < 2) { // si carte returned est inférieur à 2
            $card->setStates(true); // alors on passe l'état de la carte à true
            $_SESSION['compare'][] = $card; //on stocke la carte dans une session compare
            $numberOfCardsTurned++; // on incrémente le compteur de carte
        }else{
            echo "Seules deux cartes peuvent être retournées simultanément"; // sinon on envoie un message (qui ne s'affichera jamais)
        }

        if(isset($_SESSION['compare']) && count($_SESSION['compare']) > 1){ // si compare est isset et que son count est supérieur à 1
            if($_SESSION['compare'][0]->getFace() != $_SESSION['compare'][1]->getFace()){ // si l'index 0 de compare est différent de l'index 1
                $_SESSION['compare'][0]->setStates(false); //on repasse les états à false pour afficher le back
                $_SESSION['compare'][1]->setStates(false);
            }
            unset($_SESSION['compare']); // on vide la tableau
            $numberOfCardsTurned = 0;
        }
    }

}


?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jeu Mémory</title>
</head>
<body>

<form method="POST">
    <input type="submit" name="facile" value="easy">
    <input type="submit" name="facile" value="medium">
    <input type="submit" name="facile" value="hard">
</form>


<form method="GET">

    <?php foreach ($_SESSION['cards'] as $key => $card) : ?>
        <?php if ($card->getStates()) : ?> <!-- si l'état est à true alors on affiche la face -->
            <a href="game.php?id=<?php echo $card->getIdCard() ?>"><img class="card" src="images/<?= $card->getFace(); ?>"></a>
        <?php else : ?>
            <a href="game.php?id=<?php echo $card->getIdCard() ?>"><img class="card" src="images/<?= $card->getDos(); ?>"></a>
        <?php endif; ?>
    <?php endforeach; ?>



</form>
</body>
</html>


