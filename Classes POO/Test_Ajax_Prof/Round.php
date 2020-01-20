<?php


class Round
{
    //On définie nos variable privée (Accessible uniquemetn via les accesseurs)
    private $attacker;
    private $defender;

    //Ler constructeur (définie quelel variable est égale à quoi)
    public function __construct(Player $player1, Player $player2)
    {
        $this->attacker = $player1;
        $this->defender = $player2;
    }

    public function attaquer()
    {
        $laVieDuDefender = $this->defender->getVie();
        $lattaqueDeLattacker = $this->attacker->getAttaque();

        //On verifie que le joueur attaqué à encore assez de vie sinon il meurt (logique)
        if ($laVieDuDefender > $lattaqueDeLattacker) {

            //On retire la vie de l'attaquer qui correspond au point d'attaque de l'attaquant
            $this->defender->setVie($laVieDuDefender - $lattaqueDeLattacker);

            //On augmente le niveau de chaque joueur de 1
            $this->attacker->lvlUp();
            $this->defender->lvlUp();

            //On affiche le resultat du round
            echo 'Le joueur <b style="color:red">' . $this->attacker->getNickname() . '</b> est <b style="color:red">LVL' . $this->attacker->getLevel() . '</b> et il à <b style="color:red">' . $this->attacker->getVie() . '</b> de vie <br>Le joueur <b style="color:red">' . $this->defender->getNickname() . '</b> est <b style="color:red">LVL' . $this->defender->getLevel() . '</b> et il à <b style="color:red">' . $this->defender->getVie() . '</b> de vie';
        } else {
            echo $this->attacker->getNickname().' remporte la partie !<br>';
            echo $this->defender->getNickname().' est MORT !';
            die;
        }
    }
}