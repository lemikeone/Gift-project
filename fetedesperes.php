<?php

    /**
     * Retourne le timestamp du premier jour du mois;
     * le nom de ce jour est donné par la variable
     * dayName qui est une valeur de 0 (dimanche ) à 6 (samedi).
     * 
     */
     // int
     function getFirstDayOfMonth($dayName, $month, $year, $skipNTimes=0) {
        $firstDayOfMonthTime = mktime(1, 0, 0, $month, 1, $year);
        $retTimestamp = $firstDayOfMonthTime;
        $dayIsCorrect = $dayName == date('w', $firstDayOfMonthTime);
        if (true === $dayIsCorrect && $skipNTimes > 0) {
            $dayIsCorrect = false;
            $skipNTimes--;
        }
        while (false === $dayIsCorrect) {
            $retTimestamp += 24 * 3600;
            $dayIsCorrect = (bool) ($dayName == (int) date('w', $retTimestamp));
            if (true === $dayIsCorrect && $skipNTimes > 0) {
                $dayIsCorrect = false;
                $skipNTimes--;
            }
        }
        return $retTimestamp;
    }

    // date mysql
   function getFeteDesPeres($annee) {
        return date("Y-m-d", getFirstDayOfMonth(0, 06, $annee, 2));
    }


$i = date("Y");
$feteDesPeres = getFeteDesPeres($i);
    

$i2 = date("Y")+1;
$feteDesPeres2 = getFeteDesPeres($i2);

?>