<?php

/*** 
 * Retrieve HTML code for a manifest when given
 * an auction ID.
 * ***/

function getManifestHTML(string $auctionID) {
    //	Use auction ID to format the manifest URL.
    $liqURL = "http://www.liquidation.com/aucimg/";
    $smallID = substr($auctionID, 0, 5);
    $manifestURL = $liqURL.$smallID."/m".$auctionID.".html";

    // Retrive and return the HTML as text.
    $html = file_get_contents($manifestURL);
    return string $html;
}
