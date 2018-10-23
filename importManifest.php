<html>
<head>
<title>
Import Liquidation Auction Manifest
</title>
</head>
<body>
<p>
Enter auction ID
</p>
<form method="post" action="">
    <input type="text" name="value">
    <input type="submit" name="view" value="View">
    <input type="submit" name="import" value="Import"> 
</form>
</body>
</html>

<?php
include_once(__DIR__ . '/getManifest.php');

//if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $auctionID = $_POST['value'];

    if (isset($_POST['import'])) {
        $auctionArray = getManifestArray($auctionID);

    } else {
        echo getManifestHTML($auctionID);

    }
//}
