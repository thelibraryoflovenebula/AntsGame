<?php
/** PHPDOC FOR QUESTION 2A: Factors
 * @author Neil Patrick Olaires 
 * @version 2026.00
 * @package COMP 10260 Assignment 1
 */

/** findFactors function
 *      -> finds the factors of a given number, returns an array
 * 
 * @param [$n] number
 * @return array of factors of a given number
 */
function findFactors($n) {
    $factorsArray = [];

    for ($i = 1; $i <= $n; $i++) {
        $try = $n / $i;
        if ($try == floor($try)) 
        {
            $factorsArray[] = $i;                      
        }
    }

    return $factorsArray; //return as array
}   


/// MAIN METHOD
$rawSubmit = $_POST["n"];
$sanitizedSubmit = filter_var($rawSubmit, FILTER_SANITIZE_SPECIAL_CHARS);
$integerSubmit = 0;
$integerValidation = true;

//integer validation (dont want decimals or strings or spaces)
if (filter_var($sanitizedSubmit, FILTER_VALIDATE_INT) !== false) {
    $integerSubmit = $sanitizedSubmit;
} else {
    $integerValidation = false; 
}




if ($integerValidation) {
    if ($integerSubmit < 1) { //if negative or zero
        echo "Input cannot be negative or zero";
    } else {
        $factorsOfN = findFactors($integerSubmit);

        $orderedList = '<ol type="i">';
        foreach ($factorsOfN as $x) {
            $orderedList .= "<li>" . $x . "</li>";
        }
        $orderedList .= "</ol>";

        echo $orderedList;
    }

} else {
    echo "Wrong input, must be integer, no decimals, no characters, no spaces.";
}


?>
