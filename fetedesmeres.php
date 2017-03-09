<?php

function getPaquesTimestamp($Jourj=0, $annee=NULL) {
    /*     * ** Algorithme de Oudin, calcul de Pâque postérieure à 1583 ***
     * Transcription pour le langage PHP par david96 le 23/03/2010
     * *** Source : www.concepteursite.com/paques.php ***
     * Attributs de la fonction :
     * $Jourj : représente le jour de la semaine
     * (0=dimanche, 1=lundi...)
     * par défaut c'est le dimanche
     * $annee : représente l'année recherchée pour la date de Pâques
     * par défaut c'est l'année en cours.
     * */
    $annee = ($annee == NULL) ? date("Y") : $annee;

    $G = $annee % 19;
    $C = floor($annee / 100);
    $C_4 = floor($C / 4);
    $E = floor((8 * $C + 13) / 25);
    $H = (19 * $G + $C - $C_4 - $E + 15) % 30;

    if ($H == 29) {
        $H = 28;
    } elseif ($H == 28 && $G > 10) {
        $H = 27;
    }
    $K = floor($H / 28);
    $P = floor(29 / ($H + 1));
    $Q = floor((21 - $G) / 11);
    $I = ($K * $P * $Q - 1) * $K + $H;
    $B = floor($annee / 4) + $annee;
    $J1 = $B + $I + 2 + $C_4 - $C;
    $J2 = $J1 % 7; //jour de pâques (0=dimanche, 1=lundi....)
    $R = 28 + $I - $J2; // résultat final :)
    $mois = $R > 30 ? 4 : 3; // mois (1 = janvier, ... 3 = mars...)
    $Jour = $mois == 3 ? $R : $R - 31;

    return mktime(0, 0, 0, $mois, $Jour + $Jourj, $annee);
}

/**
 * Retourne le timestamp du dernier jour du mois;
 * le nom de ce jour est donné par la variable
 * dayName qui est une valeur de 0 (dimanche ) à 6 (samedi).
 * 
 */
function getLastDayOfMonth($dayName, $month, $year) {
    $lastDayOfMonthTime = mktime(1, 0, 0, $month, date("t", mktime(0, 0, 0, $month, 1, $year)), $year);
    $retTimestamp = $lastDayOfMonthTime;
    $dayIsCorrect = $dayName == date('w', $lastDayOfMonthTime);
    while(false===$dayIsCorrect){
        $retTimestamp -= 24*3600;
        $dayIsCorrect = (bool)($dayName == (int)date('w', $retTimestamp));
    }
    return $retTimestamp;    
}

/**
 * Retourne le timestamp du premier jour du mois;
 * le nom de ce jour est donné par la variable
 * dayName qui est une valeur de 0 (dimanche ) à 6 (samedi).
 * 
 */
function getFirstDayOfMonth($dayName, $month, $year) {
    $firstDayOfMonthTime = mktime(1, 0, 0, $month, 1, $year);
    $retTimestamp = $firstDayOfMonthTime;
    $dayIsCorrect = $dayName == date('w', $firstDayOfMonthTime);
    while(false===$dayIsCorrect){
        $retTimestamp += 24*3600;
        $dayIsCorrect = (bool)($dayName == (int)date('w', $retTimestamp));
    }
    return $retTimestamp;    
}

$i = date("Y");

    $paquesTime = getPaquesTimestamp(0, $i);
    $pentecoteTime = $paquesTime + 49 * 3600 * 24; // la pentecôte est située 49 jours après pâques.
    $datePentecote = date('Y-m-d', $pentecoteTime);
    
    $dernierDimancheMai = date('Y-m-d', getLastDayOfMonth(0, 5, $i));
    // si le dernier dimanche de mai coïncide avec la Pentecôte,
    // on prend le premier dimanche de juin.
    if($dernierDimancheMai==$datePentecote){
        $feteDesMeres = date('Y-m-d', getFirstDayOfMonth(0, 6, $i));
    }
    else{
        $feteDesMeres = $dernierDimancheMai;
    }


$i2 = date("Y")+1;

    $paquesTime = getPaquesTimestamp(0, $i2);
    $pentecoteTime = $paquesTime + 49 * 3600 * 24; // la pentecôte est située 49 jours après pâques.
    $datePentecote = date('Y-m-d', $pentecoteTime);
    
    $dernierDimancheMai = date('Y-m-d', getLastDayOfMonth(0, 5, $i2));
    // si le dernier dimanche de mai coïncide avec la Pentecôte,
    // on prend le premier dimanche de juin.
    if($dernierDimancheMai==$datePentecote){
        $feteDesMeres2 = date('Y-m-d', getFirstDayOfMonth(0, 6, $i2));
    }
    else{
        $feteDesMeres2 = $dernierDimancheMai;
    }

?>