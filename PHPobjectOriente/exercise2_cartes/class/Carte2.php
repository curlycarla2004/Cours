<?php

class Carte
{
    private $enseigne;
    private $couleur;
    private $valeur;

    public function __construct($valeur, $enseigne)
    {
        $this->setEnseigne($enseigne); 
        if(in_array($enseigne, ['coeur', 'carreau'])){
            $this->couleur = 'rouge';
        }
        else 
        $this->couleur = 'noir';
        $this->valeur = $valeur;
    }
    

    /**
     * Get the value of enseigne
     */ 
    public function getEnseigne():string
    {
        return $this->enseigne;
    }

    /**
     * Set the value of enseigne
     *
     * @return  self
     */ 
    public function setEnseigne($valeur)
    {
        $enseignes = [
            'coeur' => '♥️',
            'pique' => '♠️',
            'carreau' => '♦️',
            'trefle' => '♣️',
        ];

        $this->enseigne = $enseignes[$valeur];
    }

    /**
     * Get the value of couleur
     */ 
    public function getCouleur():string
    {
        return $this->couleur;
    }

    /**
     * Set the value of couleur
     *
     * @return  self
     */ 
    public function setCouleur($couleur)
    {
        $this->couleur = $couleur;

        return $this;
    }

    /**
     * Get the value of valeur
     */ 
    public function getValeur()
    {
        return $this->valeur;
    }

    /**
     * Set the value of valeur
     *
     * @return  self
     */ 
    public function setValeur($valeur)
    {
        $this->valeur = $valeur;

        return $this;
    }

    public function afficher(){
        echo $this->getValeur() . '|<span style="color:red;">' . $this->getEnseigne() . '</span><br>';
    }
}