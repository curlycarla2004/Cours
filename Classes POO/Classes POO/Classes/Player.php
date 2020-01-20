<?php

//On crée notre classe Player
class Player
{
    //On defini nos variable privée
    private $nickname;
    private $vie;
    private $level;
    private $attaque;
    private $armure;

    //Constructeur
    public function __construct($nickname)
    {
        $this->vie = 100;
        $this->level = 1;
        $this->nickname = $nickname;
        $this->attaque = 10;
        $this->armure = 0;
    }

    //Augmente le niveau de 1
    function lvlUp(){
        $this->setLevel($this->getLevel()+1);
        $this->setAttaque($this->getAttaque() + 1);
        $this->setArmure($this->getArmure() + 1);
    }

    //GETTERS & SETTERS
    /**
     * @return string
     */
    public function getNickname()
    {
        return $this->nickname;
    }

    /**
     * @param string $nickname
     */
    public function setNickname($nickname)
    {
        $this->nickname = $nickname;
    }

    /**
     * @return int
     */
    public function getVie()
    {
        return $this->vie;
    }

    /**
     * @param int $vie
     */
    public function setVie($vie)
    {
        $this->vie = $vie;
    }

    /**
     * @return int
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @param int $level
     */
    public function setLevel($level)
    {
        $this->level = $level;
    }

    /**
     * @return int
     */
    public function getAttaque()
    {
        return $this->attaque;
    }

    /**
     * @param int $attaque
     */
    public function setAttaque($attaque)
    {
        $this->attaque = $attaque;
    }

    /**
     * @return int
     */
    public function getArmure()
    {
        return $this->armure;
    }

    /**
     * @param int $armure
     */
    public function setArmure($armure)
    {
        $this->armure = $armure;
    }

}