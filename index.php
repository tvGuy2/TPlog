<?php
session_start();
include_once "vendor/autoload.php";

use App\Utilitaire\Singleton_Logger;
use App\Utilitaire\Vue;
use App\Vue\Vue_AfficherMessage;
use App\Vue\Vue_Structure_Entete;
use function App\Fonctions\CSRF_Renouveler;


//Page appelée pour les utilisateurs publics

//Charge le gestionnaire de vue
$Vue = new Vue();

if (isset($_SESSION["typeConnexionBack"])) {
    $typeConnexion = $_SESSION["typeConnexionBack"];
} else {
    $typeConnexion = "visiteur";
}

//utiliser en débuggage pour avoir le type de connexion
//$Vue->addToCorps(new Vue_AfficherMessage("<br>typeConnexion $typeConnexion<br>"));

//Identification du cas demandé (situation)
if (isset($_REQUEST["case"]))
    $case = $_REQUEST["case"];
else
    $case = "Cas_Par_Defaut";

//Identification de l'action demandée
if (isset($_REQUEST["action"]))
    $action = $_REQUEST["action"];
else
    $action = "Action_Par_Defaut";

switch ($typeConnexion) {
    case "visiteur" :
        include "Controleur/Controleur_visiteur.php";
        break;
    case "entreprise" :

        switch ($case) {
            default:
            case "Cas_Par_Defaut":
            case "Gerer_Entreprise" :
                include "Controleur/Controleur_Gerer_Entreprise.php";
                break;
        }
        break;
    case "entreprise_utilisateur" :
        switch ($case) {
            case "Cas_Par_Defaut":
            case "Gerer_catalogue":
            case "Catalogue_client":
                include "Controleur/Controleur_Catalogue_client.php";
                break;
            case "Gerer_CommandeClient":
                include "Controleur/Controleur_Gerer_CommandeClient.php";
                break;
            case "Gerer_Panier":
                include "Controleur/Controleur_Gerer_Panier.php";
                break;
            case "Gerer_MonCompte_Salarie":
                include "Controleur/Controleur_Gerer_MonCompte_Salarie.php";
                break;
        }
}


$Vue->afficher();