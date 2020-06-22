<?php
/*
    Если мы перечислим все натуральные числа ниже 10, кратные 3 или 5, мы получим 3, 5, 6 и 9. Сумма этих кратных равна 23.
    Найти сумму всех кратных 3 или 5 ниже 100000.
*/
    function multipleThreeAndFive($length) {
        $array;
        for ($i = 1; $i < $length; $i++)
            if ($i % 3 == 0 || $i % 5 == 0)
                $array[] = $i;
        return $array;
    }
    function arrReverse($array) {
        for ($i = 0; $i < sizeof($array) / 2; $i++) { 
            $temp = $array[$i];
            $array[$i] = $array[sizeof($array) - $i - 1];
            $array[sizeof($array) - $i - 1] = $temp;
        }
        return $array;
    }
    function concatenation($array) {
        $string = "";
        foreach ($array as $value) {
            $string .= $value;
        }
        return $string . $string . $string;
    }
    function strInArray3($string) {
        $array;
        for ($i = 0; $i < strlen($string); $i+=3) {
            $temp = "";
            $temp .= $string[$i];
            if (($i + 1) != strlen($string))
                $temp .= $string[$i + 1];
            if (($i + 2) != strlen($string))
                $temp .= $string[$i + 2];
            $array[] = $temp;
        }
        return $array;
    }
    function bubblesort($array) {
        for ($i = 0; $i < sizeof($array) - 1; $i++)
            for ($j = 0; $j < sizeof($array) - $i - 1; $j++)
                if ($array[$j] < $array[$j + 1]) {
                    $temp = $array[$j];
                    $array[$j] = $array[$j + 1];
                    $array[$j + 1] = $temp;
                }
        return $array;
    }
    function quicksort($array) {
        if (count($array) == 0)
            return array();
 
        $pivot_element = $array[0];
        $left_element = $right_element = array();
 
        for ($i = 1; $i < count($array); $i++) {
            if ($array[$i] > $pivot_element)
                $left_element[] = $array[$i];
            else
                $right_element[] = $array[$i];
        }
 
        return array_merge(quicksort($left_element), array($pivot_element), quicksort($right_element));
    }
    function finalControl($string) {
        $alphabet = "";
        for ($i = 0; $i < strlen($string); $i++) {
            $temp = "";
            $temp .= $string[$i];
            if (($i + 1) != strlen($string))
                $temp .= $string[$i + 1];
            if ($temp <= 26) {
                $alphabet .= chr($temp + 97);
                $i++;
            } else
                $alphabet .= chr($temp[0] + 97);
        }
        return $alphabet;
    }
    
    $arr;
    $arr = multipleThreeAndFive (10);
    $arr = arrReverse ($arr);
    //multiply by 2
    for ($i = 0; $i < sizeof($arr); $i++)
        $arr[$i] *= 2;
    $string = concatenation ($arr);
    $arr = strInArray3 ($string);
    $arr = quicksort ($arr);
    //ArrLargerThan100
    for ($i = 0; $i < sizeof($arr); $i++)
        if ($arr[$i] > 100)
            $arr[$i] -= 99;
    //concatenation
    $string = "";
    foreach ($arr as $value) {
        $string .= $value;
    }
    $alphabet = finalControl ($string);
    //delete zero
    for ($i = 0; $i < sizeof($arr); $i++) {
        if ($arr[$i][0] == '0' && strlen($arr[$i]) == 2)
                $arr[$i] = $arr[$i][$j + 1];
    }
    print ("Rezultatul primit in urma executiei programului:\n");
    print_r ($alphabet);
    print ("\n");
?>