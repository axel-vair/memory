<?php

include "src/User.php";
include "src/Card.php";
include "src/Game.php";
include "src/Score.php";
include "includes/header.php";

$board = new Game();
$board->cardReturned();
$cards = $board->board();
$_SESSION['cards'] = !isset($_SESSION['cards']) ? $cards : $_SESSION['cards']; // Si session card n'est pas isset alors = $cards, sinon = $_SESSION


foreach($_SESSION['cards'] as $key => $card) { // boucle pour l'état : si get id == l'idée de la carte cliquée alors on passe à true
    if($_GET['id'] == $card->getIdCard()){
        $card->setStates(true);
        $_SESSION['compare'][] = $card;
        echo "<pre>";
        var_dump('compare',$_SESSION['compare']);
        echo "</pre>";
    }
    if(count($_SESSION['compare']) > 1){
        unset($_SESSION['compare']);
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
        <?php if ($card->getStates()) : ?> <!-- si l'état est a true alors on affiche la face -->
            <a href="game.php?id=<?php echo $card->getIdCard() ?>"><img class="card" src="images/<?= $card->getFace(); ?>"></a>
        <?php else : ?>
            <a href="game.php?id=<?php echo $card->getIdCard() ?>"><img class="card" src="images/<?= $card->getDos(); ?>"></a>
        <?php endif; ?>
    <?php endforeach; ?>



</form>
</body>
</html>


