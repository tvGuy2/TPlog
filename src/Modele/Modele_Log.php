<?php

namespace App\Modele;

use App\Utilitaire\Singleton_ConnexionPDO;
use App\Utilitaire\Singleton_ConnexionPDO_Log;
use PDO;

class Modele_Log
{
   static function Realiser_Ajouter($idUtilisateur,$idTypeAction,$idObjet){
       $connexionPDO = Singleton_ConnexionPDO_Log::getInstance();

       $requetePreparee = $connexionPDO->prepare(
           'insert into `realiser` (idUtilisateur,idTypeAction,date,idObjet)  
        values (:idUtilisateur, :idTypeAction, :date, :idObjet) ');
       $requetePreparee->bindParam('idUtilisateur', $idUtilisateur);
       $requetePreparee->bindParam('idTypeAction', $idTypeAction);
       $date = date("Y-m-d H:i:s");
       $requetePreparee->bindParam('date', $date);
       $requetePreparee->bindParam('idObjet', $idObjet);

       $reponse = $requetePreparee->execute();
   }
}