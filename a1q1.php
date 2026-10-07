<?php
/** PHPDOC FOR QUESTION 1: Ants game
 * @author Neil Patrick Olaires 
 * @version 2026.00
 * @package COMP 10260 Assignment 1
 */




/** calculateOutcome() function 
 *      -> calculates the outcome of an ant game
 * 
 * @param [$antsInput] the string input of the ants 
 * @return string condition of the outcome
 * 
 */
function calculateOutcome($antsInput) {
    /** IMPORTANT RULES FOR THE GAME
     * 
     * red wins     [true,       0]     red overpowers left side if theres no black matches for a red 
     * black wins   [false, $x > 0]     black overpowers if redescaped is false, and counter is up
     * neither      [false,      0]     neither wins if unmatched is 0 and red doesnt escape 
     * M.A.A.D      [true,  $x > 0]     both angry if a red escaped and more than one unmatched
     * 
     * this version is left to right scanned
     * dependant on red reaching the left side as a boolean
     * 
     */

    $redEscaped = false;
    $blackUnmatched = 0;

    //scanning from left to right
    for ($i = 0; $i < strlen($antsInput); $i++) {

        if ($antsInput[$i] === "R" && $blackUnmatched == 0) { //if reads a red ant but theres not matches
            $redEscaped = true;
        }
        elseif($antsInput[$i] === "R" && $blackUnmatched > 0) { //there is a match, reduce counter
            $blackUnmatched--;
        }
        elseif ($antsInput[$i] === "B") {                       //add for each black ant
            $blackUnmatched++;
        }
    }

    //conditions
    if ($redEscaped && $blackUnmatched == 0) {//red wins
        return "Red Wins!";
    }
    elseif  (!$redEscaped && $blackUnmatched > 0) { //black wins
        return "Black Wins!";
    }
    elseif (!$redEscaped && $blackUnmatched == 0) {//neither 
        return "Neither";
    }
    elseif ($redEscaped && $blackUnmatched > 0) {//both
        return "M.A.A.D";
    }
}



///MAIN METHOD
$rawSubmit = $_GET["ants"]; //raw submit from the user
$sanitizedSubmit = strtoupper(filter_var($rawSubmit, FILTER_SANITIZE_SPECIAL_CHARS)); //filter it and capitalize

$correctFormat = true;

for ($i = 0; $i < strlen($sanitizedSubmit); $i++){
    if (!(strtoupper($sanitizedSubmit[$i]) === "B" || strtoupper($sanitizedSubmit[$i]) === "X" || strtoupper($sanitizedSubmit[$i]) === "R")) 
    {
        $correctFormat = false; //if its not bxr, make the gate into false
    }
}

if ($sanitizedSubmit === "") {
    echo "Cannot enter nothing.";
} elseif ($correctFormat) { 
    echo calculateOutcome($sanitizedSubmit);
}  else {
    echo "Wrong format, must only use characters 'B', 'X', 'R'.";
}


?>



<!-- TEST INPUTS

BBBBBBBBBBBB	Black Wins
RRRRRRRRRRRR	Red Wins
XXXXXXXXXXXX	Neither
BBBBBBRRRRRR	Neither
RRRRRRBBBBBB	M.A.D.
BRBRBRBRBRBR	Neither
RBRBRBRBRBRB	M.A.D.
XXXXBBBBRRRR	Neither
RRRXXXXBBBBB	M.A.D.
BBBBXXXXRRRR	Neither
BRRRXXXBBBRX	M.A.D.
BBBRRRXXXBRR	Red Wins
BBBBBBBBBBBR	Black Wins
BRRRRRRRRRRR	Red Wins
RRRRRBBBBBBB	M.A.D.
BBBBBBBRRRRR	Black Wins
BBBBBRRRRRRR	Red Wins
BBBBBBRRRRRR	Neither
BRBRBRBRBRBR	Neither
RBRBRBRBRBRB	M.A.D.
XXXBBBBRRRRX	Neither
XXRRRRBBBBXX	M.A.D.
BBXXBBXXRRRR	Neither
RRXXRRXXBBBB	M.A.D.
BBBRRRRRBBBB	M.A.D.
BBBBRRRBRRRR	Red Wins
BRRRBBBBBRRR	M.A.D.
BBBBXXXXXXRR	Black Wins
RRXXXXXXBBBB	M.A.D.
XXXXBRBRXXXX	Neither
XXXRBRBXXXXX	M.A.D.
BBRXXBRXXBRR	Red Wins

-->