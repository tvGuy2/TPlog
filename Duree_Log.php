<?php

$scandir = scandir("src/Utilitaire");

foreach($scandir as $fichier){
    $info = new SplFileInfo('.log');
    $extension = pathinfo($fichier->getFilename(), PATHINFO_EXTENSION);
    if ($info->getExtension() ==$extension){

        echo "$fichier  ";
    }

}

