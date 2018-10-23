<form method="post" action="">
<input type="text" name="value">
<input type="submit">
</form>

<?php
include_once(__DIR__ . '/getManifest.php');

$auctionID = $_POST['value'];
$auctionArray = getManifestArray($auctionID);

