<?php

require('../config.php');
require('../includes/OverlayUtil.php');


if (!isset($_GET['game'])) {
    die('No game set!');
}


$game = htmlspecialchars($_GET['game']);

$overlay = new OverlayUtil;
$theme = $overlay->GetThemeForGame($game);

$sqli = new mysqli($SQL_HOST, $SQL_USER, $SQL_PASS) or die('Unable to connect to database!');

// Pulls our channel data for things like what game the channel is set to.
$channel_query = "SELECT * FROM `botleaf`.`twitch_channel` WHERE `channel`='" . $TWITCH_CHANNEL . "' LIMIT 1;";
if ($result = $sqli->query($channel_query)) {
    while ($row = $result->fetch_assoc()) {
        $unprot = $row['unprot_game'];
    }
}

// CURL Calls for Twitch Box art.
$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL, 'https://api.twitch.tv/kraken/search/games?q=' . $unprot . '&type=suggest');
$resp = curl_exec($ch);
$json = json_decode($resp, true);
curl_close($ch);
$url = $json['games'][0]['box']['medium'];      
$box_art = "<img src='" . $url . "' style='-webkit-filter: drop-shadow(5px 5px 5px #222); filter: drop-shadow(5px 5px 5px #222);'>"; 
?>

<html>
<head>
<title>Boxart Module [<?php echo $game; ?> (Theme: <?php echo $theme; ?>)]</title>
<link rel="stylesheet" type="text/css" href="../css/animate.css">      
<link rel="stylesheet" type="text/css" href="../css/modules/boxart-<?php echo $theme; ?>.css">  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="../js/modules/boxart-<?php echo $theme; ?>.js"></script>  
</head>
<body>
<div id="box-art">
    <?php echo $box_art; ?>
</div>

</body> 
<script>
$(document).ready(function() {
    start_box_art();
});
</script>
</html>