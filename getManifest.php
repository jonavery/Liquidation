<?php

/*** 
 * Retrieve a manifest as a PHP array when given
 * its auction ID.
 * ***/

require_once(__DIR__ . '/parseHTMLtoArray.php');

function getManifestArray(string $auctionID) {
    //	Use auction ID to format the manifest URL.
    $liqURL = "http://www.liquidation.com/aucimg/";
    $smallID = substr($auctionID, 0, 5);
    $manifestURL = $liqURL.$smallID."/m".$auctionID.".html";

    // Retrive the HTML as text and convert to Array.
    $html = file_get_contents($manifestURL);
    $array = htmlToArray($html);
    return $array;
}
