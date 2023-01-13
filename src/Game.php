<?php

class Game extends Card // CLASSE QUI VA GERER LE JEU (DIFFICULTÉ, LE COUNT DE COUPS, LES CARTES RETOURNEES)
{
    public $id;
    public $id_game;
    public $nb_de_paire;
    public $count;

    public function __construct()
    {
    }

    public function difficulty()
    {   // METHODE QUI VA GERER LA DIFFICULTÉ DU JEU

    }
    public function board() // MÉTHODE POUR GÉNÉRER LE NOMBRE DE CARTES
        {
            $nbOfPair = 3;

            $cards = [];
            $count = 1;
            for($i = 0; $i < $nbOfPair * 2; $i++){
                $card = new Card();
                $card
                    ->setidCard($count++)
                    ->setStates(false)
                    ->setFace("img" . $i % $nbOfPair +1 . ".jpg")
                    ->setDos("dos.jpg");
               // shuffle($cards);
                $cards[] = $card;



            }
            return $cards;
        }

        public function countTry()
        {

        }

        public function cardReturned()
        {
            if (isset($_GET['id'])) {

                $_SESSION['cardflip'][] = $_GET['id'];
                if (count($_SESSION['cardflip']) > 2) {
                    $_SESSION['cardflip'] = [];
                }
            }

        }

}