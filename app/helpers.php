<?php

function extractFormula($formula) {
    $calculations = [];
    
    // Define patterns to match calculations within braces (e.g., "(4 * $protein)")
    $pattern = '/\((\d+)\s*([+\-*\/])\s*\$(protein|carbohydrate|fat)\)/';

    // Perform the regular expression match
    preg_match_all($pattern, $formula, $matches, PREG_SET_ORDER);

    // Extract and store the calculations for each nutrient variable
    foreach ($matches as $match) {
        $multiplier = intval($match[1]); // Extract the multiplier (e.g., 4)
        $operator = $match[2]; // Extract the operator (+, -, *, /)
        $variable = $match[3]; // Extract the variable name (e.g., protein)
        $calculations[$variable] = ['operator' => $operator, 'multiplier' => $multiplier];
    }

    return $calculations;
}