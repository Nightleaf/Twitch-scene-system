<?php

require('../includes/OverlayUtil.php');

if (!isset($_GET['game'])) {
    die('No game set!');
}

$game = htmlspecialchars($_GET['game']);
$overlay = new OverlayUtil;
$theme = $overlay->GetThemeForGame($game);

?>

<html>
<head>
<title>Social Module [<?php echo $game; ?> (Theme: <? echo $theme; ?>)]</title>
<link rel="stylesheet" type="text/css" href="../css/animate.css">      
<link rel="stylesheet" type="text/css" href="../css/modules/social-<?php echo $theme; ?>.css">  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="../js/modules/social-<?php echo $theme; ?>.js"></script>  
</head>
<body>

    <!-- TWITTER -->
    <div id="twitter">
        <img src="../img/twitter.png"></img> Follow @Nightleaf475!      
    </div>
    
    <!-- YOUTUBE -->
    <div id="youtube">
        <img src="../img/youtube.png"></img> Subscribe to Nightleaf475!
    </div>

    <!-- TWITCH -->
    <div id="twitch">
        <img src="../img/twitch.png"></img> Hit the follow button!
    </div>

</body> 
<script>
$(document).ready(function() {
    start_feed();
});
</script>
</html>