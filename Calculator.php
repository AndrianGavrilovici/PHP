<?php
/*
    Powered by Andrian Gavrilovici (C)

*/
    function numberVerification($number1, $number2){
        $strNum1 = "$number1";
        $strNum2 = "$number2";
        for ($i=0; $i < strlen($strNum1); $i++) {
            if ($i == 0 && $strNum1[$i] == '-') $i++;
            if (($strNum1[$i] < '0' && $strNum1[$i] != '.')||($strNum1[$i] > '9' && $strNum1[$i] != '.'))
                return true;
        }
        for ($i=0; $i < strlen($strNum2); $i++) {
            if ($i == 0 && $strNum2[$i] == '-') $i++;
            if (($strNum2[$i] < '0' && $strNum2[$i] != '.')||($strNum2[$i] > '9' && $strNum2[$i] != '.'))
                return true;
        }
        return false;
    }
    function operationVerification($operation) {
        if ($operation != '+' && $operation != '-' && $operation != '*' && $operation != '/')
            return true;
        return false;
    }
    //main();
    function main(){
        do{
            $number1 = readline("Number1: ");
            $number2 = readline("Number2: ");
            if (numberVerification($number1, $number2)){
                print("\"Number1 = ".$number1."\" or \"Number2 = ".$number2."\" is not a number\n");
                print("Please enter again \"Number1\" and \"Number2\"\n");
            }
        } while(numberVerification($number1, $number2));

        do {
            print("Choose operation +, -, *, /" . "\n");
            $operation = readline("Operation: ");
            if (operationVerification($operation)) {
                print("\"Operation = ".$operation."\" is not operation!\n");
            }
        } while (operationVerification($operation));

        switch ($operation) {
            case '+':
                $result = $number1 + $number2;
                break;
            case '-':
                $result = $number1 - $number2;
                break;
            case '*':
                $result = $number1 * $number2;
                break;
            case '/':
                if ($number2 == 0) {
                    print("Divisor cannot be zero!\n");
                    return;
                }
                else
                    $result = $number1 / $number2;
                break;
        }
        if ($number2 < 0)
            print($number1 . $operation . "(" . $number2 . ")=" . $result . "\n");
        else
            print($number1 . $operation . $number2 . "=" . $result . "\n");
    }
    main();
?>
