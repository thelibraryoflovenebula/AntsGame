<?php
/** PHPDOC QUESTION 2B: Erdos Woods 
 * @author Neil Patrick Olaires 
 * @version 2026.00
 * @package COMP 10260 Assignment 1
 */

/** findFactors function (STOLEN FROM QUESTION 2A )
 *      -> finds the factors of a given number, returns an array
 * 
 * @param [$n] int number
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
$rawSubmit1 = $_POST["start"];
$rawSubmit2 = $_POST["end"];
$sanitizedSubmit1 = filter_var($rawSubmit1, FILTER_SANITIZE_SPECIAL_CHARS);
$sanitizedSubmit2 = filter_var($rawSubmit2, FILTER_SANITIZE_SPECIAL_CHARS);

//FIRST INTEGER VALIDATION
$integerSubmit1 = 0;    //START
$integerValidation1 = true;
if (filter_var($sanitizedSubmit1, FILTER_VALIDATE_INT) !== false) {
    $integerSubmit1 = $sanitizedSubmit1;
} else {
    $integerValidation1 = false; 
}

//SECOND INTEGER VALIDATION
$integerSubmit2 = 0;    //END
$integerValidation2 = true;
if (filter_var($sanitizedSubmit2, FILTER_VALIDATE_INT) !== false) {
    $integerSubmit2 = $sanitizedSubmit2;
} else {
    $integerValidation2 = false; 
}

if ($integerValidation1 && $integerValidation2) { //if both are integers
    if ($integerSubmit1 < 1 || $integerSubmit2 < 1) { //if any of them are negative or zero
        echo "Wrong input, no numbers cannot be negative or zero .";
    } else {
        if ($integerSubmit1 > $integerSubmit2) { //if start is mismatched
            echo "Start number cannot be greater than end number.";
        } else {
            if ($integerSubmit2 > 100) {
                echo "End number cannot be greazter than 100.";
            } else { 


                //ACTUAL CODE
                    $startFactors = findFactors($integerSubmit1);
                    $endFactors = findFactors($integerSubmit2);

                    //factors check
                    $fullFactorsCheck = array_merge($startFactors, $endFactors);
                    sort($fullFactorsCheck);
                    array_splice($fullFactorsCheck, 0, 2); //removes first two "1"s



                    //initialize the range set between the endpoints
                    $rangeSet = [];
                    for ($i = $integerSubmit1 + 1; $i < $integerSubmit2; $i++)
                    {
                        $rangeSet[] = $i;
                    }

                    //initialize array of erdos numbers
                    $erdosOutput = [];
                    foreach ($rangeSet as $x) {
                        $notErdos = false;

                        $pickFactors = findFactors($x);
                        array_splice($pickFactors, 0, 1); //removes the first number

                        foreach($fullFactorsCheck as $y) {
                            foreach($pickFactors as $z) {
                                if ($z === $y) {
                                    $notErdos = true;
                                }
                            }
                            
                        }
                        
                        if (!$notErdos) { //conditions that make it erdos
                            $erdosOutput[] = $x;
                        }
                    }

                    //into orderedlist 

                    $unorderedList = '<ul>';
                    foreach ($erdosOutput as $x) {
                        $unorderedList .= "<li>" . $x . "</li>";
                    }
                    $unorderedList .= "</ul>";

                echo $unorderedList;
            




            }

        }
        
        
    }


} else {
    echo "Wrong input, both must be integer, no decimals, no characters, no spaces.";
}




?>


<!-- TESTING CODE



            $orderedList = '<h1> first set </h1> <br> <ol type="i">';
            foreach ($startFactors as $x) {
                $orderedList .= "<li>" . $x . "</li>";
            }
            $orderedList .= "</ol>";

            $orderedList .= '<h1> second set </h1> <br> <ol type="i">';
            foreach ($endFactors as $x) {
                $orderedList .= "<li>" . $x . "</li>";
            }
            $orderedList .= "</ol>";


            echo $orderedList;


-->