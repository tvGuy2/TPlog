<?php

use App\Vue\Vue_RGPD;
use App\Vue\Vue_Structure_BasDePage;
use App\Vue\Vue_Structure_Entete;

$Vue->setEntete(new Vue_Structure_Entete());
switch ($action) {

    case "AccepterRGPD":
        break;
    case "RefuserRGPD":
        break;

    case "AfficherRGPD":
    default:
        $Vue->addToCorps(composant: new Vue_RGPD());
        break;
}
$Vue->setBasDePage(new Vue_Structure_BasDePage());