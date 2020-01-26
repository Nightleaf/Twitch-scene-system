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
<title>Background Module [<?php echo $game; ?> (Theme: <?php echo $theme; ?>)]</title>
<link rel="stylesheet" type="text/css" href="../css/animate.css">      
<link rel="stylesheet" type="text/css" href="../css/modules/background-<?php echo $theme; ?>.css">  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="../js/modules/background-<?php echo $theme; ?>.js"></script>  
</head>
<body>
<div id="logo">
    <img src="../img/nightleaf-logo.png">
</div>

</body> 
<script>
$(document).ready(function() {
    start_scene();
});
</script>
</html>