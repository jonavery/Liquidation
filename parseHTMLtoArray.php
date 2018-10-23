<?php

/*** 
 * Parse HTML table into a PHP array given an HTML string.
 * 
 * NOTE: Only works on HTML tables on Liquidation.com
 *       Tables on other sites likely have <th> tags for
 *       their headers, which would break this function.
 * ***/

function htmlToArray(string $html) {
    // Clean up html and store as a dom.
    $dom = new DOMDocument();
    @$dom->loadHTML($html);

    // Grab first table from dom and store its rows and columns by tag name.
    $rows = $dom->getElementsByTagName('table')->item(1)->getElementsByTagName('tr');
    $headers = $rows->item(0)->getElementsByTagName('td');

    $resultArray = [];
    $keys = [];

    foreach($headers as $header) {
        $keys[] = strtolower($header->nodeValue);
    }

    foreach($rows as $i => $row) {
        if ($i<1) {continue;}
        $item = [];
        foreach($keys as $j=>$key) {
            $cells = $row->getElementsByTagName('td');
            $item[$key] = $cells->item($j)->nodeValue;
        }
        $resultArray[] = $item;
    }
    array_pop($resultArray);
    return $resultArray;
}
