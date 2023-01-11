<?php
class Card // CLASSE QUI VA GERER LE MELANGE DES CARTES, L'AFFICHAGE, ET LES ETATS
{
    // ATTRIBUTS
    public int $idCard;
    public bool $states;
    public string $display;


    public function __construct($idCard)
    {   // CONSTRUCTEUR QUI VA RECUPERER L'ID DE LA CARTE
        $this->idCard = $idCard; // ON RECUPERE L'ID DE LA CARTE
        $this->states = false; // ON INITIALISE L'ETAT DE LA CARTE A FALSE
        $this->display = "B"; // ON AFFICHE LE BACK DE LA CARDE

    }
    public function getDisplay()
    {   // METHODE QUI VA AFFICHER LA CARTE
        if($this->states) { // SI L'ETAT DE LA CARTE EST TRUE
            return $this->display = "F"; // ON AFFICHE LE FRONT DE LA CARTE
        }
            return $this->display; // SINON ON AFFICHE LE BACK DE LA CARTE

    }

    public function getIdcard()
    {   // METHODE QUI VA RECUPERER L'ID DE LA CARTE
        return $this->idCard;
    }
}