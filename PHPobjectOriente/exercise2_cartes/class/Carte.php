<?php

class Carte
{
    private $_enseigne; //_means when things are private its facultatif
    private $_couleur;
    private $_valeur;

    public function __construct($valeur = '', $enseigne = '')
    {

        $this->setValeur($valeur);
        $this->setEnseigne($enseigne);
        $this->setCouleur();
        // $this->setEnseigne($enseigne); 
        // if(in_array($enseigne, ['coeur', 'carreau'])){
        //     $this->_couleur = 'rouge';
        // }
        // else 
        // $this->_couleur = 'noire';
        // $this->_valeur = $valeur;
    }

    /**
     * Get the value of _enseigne
     */ 
    public function getEnseigne():string
    {
        return $this->_enseigne;
    }

    /**
     * Set the value of _enseigne
     *
     * @return  self
     */ 
    public function setEnseigne($valeur)
    {
        $enseignes= [
            'coeur' => '♥️',
            'pique' => '♠️',
            'carreau' => '♦️',
            'trefle' => '♣️',
        ];
        
        if(!empty($valeur)){
            $this->_enseigne = $enseignes[$valeur];
        }
        else{
            $random = array_rand($enseignes);
            $this->_enseigne = $enseignes[$random];
        }
        // $this->_enseigne = $enseignes[$valeur];
    }

    /**
     * Get the value of _couleur
     */ 
    public function getCouleur():string
    {
        return $this->_couleur;
    }

    /**
     * Set the value of _couleur
     *
     * @return  self
     */ 
    public function setCouleur()
    {
        if(in_array($this->getEnseigne(), ['♥️', '♦️'])){
            $this->_couleur = 'red';

        }else{
            $this->_couleur = 'black';
        }
        // $this->_couleur = $couleur;

        // return $this;
    }

    /**
     * Get the value of _valeur
     */ 
    public function getValeur():string
    {
        return $this->_valeur;
    }

    /**
     * Set the value of _valeur
     *
     * @return  self
     */ 
    public function setValeur($valeur)
    {

        if(!empty($valeur)){
            $this->_valeur = $valeur;
        }
        else{
            $this->_valeur = rand(1, 10);
        }
        // $this->_valeur = $valeur;

        // return $this;
    }


    public function afficher(){
        echo $this->getValeur() . ' | <span style="color:' .$this->getCouleur() . '">'.$this->getEnseigne() . '</span><br>';
    }
}
   