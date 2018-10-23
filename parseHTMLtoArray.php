<?php

/*** 
 * Parse HTML table into a PHP array given an HTML string.
 * Source: https://www.codeproject.com/Tips/1074174/Simple-Way-to-Convert-HTML-Table-Data-into-PHP-Arr
 * ***/

function htmlToArray(string $html) {
    // Store table headers and details.
    $DOM = new DOMDocument();
    $DOM->loadHTML($html);

    $rows = $DOM->getElementsByTagName('th');
    $cols = $DOM->getElementsByTagName('td');
    $labels = [];
    foreach($rows as $row) {
        $labels[] = trim($row->textContent);
    }

    // Store table information.
    $tableElements = [];
    $i = 0;
    $j = 0;
    foreach($cols as $col) {
        $tableElements[$j][] = trim($col->textContent);
        $i++;
        $j = $i % count($labels) == 0 ? $j + 1 : $j;
    }

    // Format and return table information as array.
    $tableArray = [];
    for ($i = 0; $i < count($tableElements); $i++) {
        for ($j = 0; $j < count($labels); $j++) {
            $tableArray[$i][$labels[$j]] = $tableElements[$i][$j];
        }
    }
    return $tableArray;
}
