<?php

class Monster
{
    private $vie;
    private $attack;

    public function __construct()
    {
        $this->vie = 100;
        $this->attack = 10;
        
    }


    //get=afficher/recuperer et set-donner la valeur

    /**
     * Get the value of vie
     * @return int
     */ 
    public function getVie()
    {
        return $this->vie;
    }

    /**
     * Set the value of vie
     *
     * @return  self
     */ 
    public function setVie($vie)
    {
        $this->vie = $vie;

        return $this;
    }

    /**
     * Get the value of attack
     */ 
    public function getAttack()
    {
        return $this->attack;
    }

    /**
     * Set the value of attack
     *
     * @return  self
     */ 
    public function setAttack($attack)
    {
        $this->attack = $attack;

        return $this;
    }
 

    /**
     * Get the value of nickname
     */ 
    public function getNickname()
    {
        return $this->nickname;
    }

    /**
     * Set the value of nickname
     *
     * @return  self
     */ 
    public function setNickname($nickname)
    {
        $this->nickname = $nickname;

        return $this;
    }

}

?>