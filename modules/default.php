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
<title>Module - Default [<?php echo $game; ?> (Theme: <?php echo $theme; ?>)]</title>
<link rel="stylesheet" type="text/css" href="./css/animate.css">   
<link rel="stylesheet" type="text/css" href="./css/modules/default-<?php echo $theme; ?>.css">     
</head>
<body>
<h3>This is a default module!  Theme: <?php echo $theme; ?></h3>
</body>
</html>