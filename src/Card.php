<?php
class Card // Classe qui va permettre de générer les cartes du jeu
{
    // Les cartes possèdent un id, une face, un dos, et un état.
    private ?int $idCard; // L'id va permettre récupérer une carte en particulier
    private ?string $face; // La carte possède une face qui va être affichée si la carte est cliquée et que son état initial aura changé. Cette face sera un lien vers l'image.
    private ?string $dos; // La carte possède un dos qui va être affiché dans son état initial.
    private ?bool $states; // La carte possède un booléen qui va permettre de flip la carte selon son état false/true


    public function __construct()
    {   // On initialise les propriétés de la classe en null

        $this->idCard = null;
        $this->face = null;
        $this->dos = null;
        $this->states = null;

    }

    // Nos setters
    /**
     * @param int|null $idCard
     * @return Card
     */
    public function setIdCard(?int $idCard): Card
    {
        $this->idCard = $idCard;
        return $this;
    }

    /**
     * @param string|null $face
     * @return Card
     */
    public function setFace(?string $face): Card
    {
        $this->face = $face;
        return $this;
    }

    /**
     * @param string|null $dos
     * @return Card
     */
    public function setDos(?string $dos): Card
    {
        $this->dos = $dos;
        return $this;
    }

    /**
     * @param bool|null $states
     * @return Card
     */
    public function setStates(?bool $states): Card
    {
        $this->states = $states;
        return $this;
    }

    /**
     * @return int|null
     */

    // Nos getters
    public function getIdCard(): ?int
    {
        return $this->idCard;
    }

    /**
     * @return string|null
     */
    public function getFace(): ?string
    {
        return $this->face;
    }

    /**
     * @return string|null
     */
    public function getDos(): ?string
    {
        return $this->dos;
    }

    /**
     * @return bool|null
     */
    public function getStates(): ?bool
    {
        return $this->states;
    }


}