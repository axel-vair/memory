<?php

class Game extends Card // CLASSE QUI VA GERER LE JEU (DIFFICULTÉ, LE COUNT DE COUPS, LES CARTES RETOURNEES)
{
    public $id;
    public $id_game;
    public array $nb_de_paire;
    public $count;

    public function __construct()
    {
        $this->count = 0;
        $this->nb_de_paire = [3, 6, 9];
    }

    public function difficulty($nb_de_paire)
    {   // METHODE QUI VA GERER LA DIFFICULTÉ DU JEU

        if($_POST['easy'] = $this->nb_de_paire[0]){ 
            $a = $this->nb_de_paire[0];
        }elseif ($_POST['medium'] = $this->nb_de_paire[1]){
            $a = $this->nb_de_paire[1];
        }elseif ($_POST['hard'] = $this->nb_de_paire[2]){
            $a = $this->nb_de_paire[2];
        }

    }
    public function selectCard() // MÉTHODE POUR GÉNÉRER LE NOMBRE DE CARTES
    {
            for ($i = 1; $i <= 2; $i++) {
                for ($j = 1; $j <= $a; $j++) {
                    $list[] = $j;
                }
            }
            shuffle($list);
            echo "<pre>";
            print_r($list);
            echo "</pre>";
        }

        public function countTry()
        {

        }

        public
        function countCardReturned()
        {

        }


}