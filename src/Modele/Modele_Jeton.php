<?php

namespace App\Modele;

use App\Utilitaire\Singleton_ConnexionPDO;
use PDO;

class Modele_Jeton
{
    /***
     * @param $valeur
     * @param $idUtilisateur
     * @param $codeAction (1 pour renouveller MDP, )
     * @return L'ID du  jeton créé ou false (si pbm!)
     */
    static function  Jeton_Creation($valeur, $idUtilisateur, $codeAction)
    {
        $connexionPDO = Singleton_ConnexionPDO::getInstance();
        /***/
    }

    static function Jeton_Rechercher_ParValeur($valeur)
    {
        $connexionPDO = Singleton_ConnexionPDO::getInstance();
        /***/
    }

    static function Jeton_Delete_parID($idJeton)
    {
        $connexionPDO = Singleton_ConnexionPDO::getInstance();
        /***/
    }
}