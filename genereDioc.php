<?php
function passgen1($nbChar) {
    $chaine ="mnoTUzS5678kVvwxy9WXYZRNCDEFrslq41GtuaHIJKpOPQA23LcdefghiBMbj0";
    srand((double)microtime()*1000000);
    $pass = '';
    for($i=0; $i<$nbChar; $i++){
        $pass .= $chaine[rand()%strlen($chaine)];
    }
    return $pass;
}


function passgenTous($nbChar):array
{
    $array =[];
    $chaine = "mnoTUzS5678kVvwxy9WXYZRNCDEFrslq41GtuaHIJKpOPQA23LcdefghiBMbj0";
    for($seed = 0; $seed<1000000;$seed++) {
        srand($seed);
        $pass = '';
        for ($i = 0; $i < $nbChar; $i++) {
            $pass .= $chaine[rand() % strlen($chaine)];
        }
        $array[] = $pass;
    }
    return $array;
}

function passgen2($nbChar){
    return substr(str_shuffle(
        'abcdefghijklmnopqrstuvwxyzABCEFGHIJKLMNOPQRSTUVWXYZ0123456789'),1, $nbChar); }

echo passgen1(10);
echo"\n";
echo passgen2(10);

$tableau = passgenTous(10);

//var_dump($tableau);
$i=0;
while($i <count($tableau))
{
    echo "$i $tableau[$i]\n";
    $i++;
}