<?php

include "includes/header.php";
include "src/Card.php";
include "src/User.php";
include "src/Game.php";
include "src/Score.php";

$difficult = new Game;
$difficult->difficulty($nb_de_paire);
$display = new Card(1);

$cards = new Game;
$cards->selectCard();


if(isset($_POST['memory'])){
    $flippedCard = $_POST['memory'];
    if($flippedCard){
        $display->states = true;
    }
    if($display->states === true){
        $display->getDisplay();
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
    <form id="memory" method="POST">
        <button form="memory" type="submit"  name="memory" value="<?=$display->getIdcard() ;?>"> <?php echo $display->display; ?></button>
    </form>
</body>
</html>
