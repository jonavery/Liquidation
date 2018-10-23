<?php

/*** 
 * Retrieve a manifest as a PHP array when given
 * its auction ID.
 * ***/

require_once(__DIR__ . '/parseHTMLtoArray.php');

function getManifestArray(string $auctionID) {
    // Convert manifest HTML into Array.
    $html = getManifestHTML($auctionID);
    $array = htmlToArray($html);

    return $array;
}

function getManifestURL(string $auctionID) {
    //	Use auction ID to format the manifest URL.
    $liqURL = "http://www.liquidation.com/aucimg/";
    $smallID = substr($auctionID, 0, 5);
    $manifestURL = $liqURL.$smallID."/m".$auctionID.".html";

    return $manifestURL;
}

function getManifestHTML(string $auctionID) {
    // Retrieve manifest HTML code.
    $manifestURL = getManifestURL($auctionID);
    $html = file_get_contents($manifestURL);

    return $html;
}
